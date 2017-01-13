<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\BjjParticipant;
use App\BjjEvent;
use App\ContactForm;
use Carbon\Carbon;
use App\Mail\ContactFormEmail;
use Illuminate\Support\Facades\Mail;

class BjjController extends Controller
{

    public function index()
    {
        return redirect(route('bjj_about'));
    }

    public function showRegister()
    {
        $events = BjjEvent::where('event_start', '>', Carbon::now())->get();
        return view('bjj.register', ['events' => $events]); 
    }

    public function registerSubmit(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'gender' => 'required',
            'bjj_event_id' => 'required',
            'age_group' => 'required',
            'date_of_birth' => 'required',
            'belt' => 'required',
            'weight_category' => 'required',
            'years_training' => 'required',
            'club_name' => 'required|max:255',
            'instructor_name' => 'required|max:255',
            'email' => 'required|email|unique:bjj_participants,email',
            'phone_number' => 'required|numeric|min:6',
            'terms_conditions' => 'required'
        ]);
        $email = $request->get('email');
        $participant = Input::all();
        $participant['paid'] = 0;
        $participant['email'] = '';

        if($participant = BjjParticipant::create($participant)){
            $id = $participant->id;
            $amount = $this->getFeeAmount($participant);
            return view('bjj.payment', ['participant' => $participant, 'email' => $email, 'id' => $id, 'amount' => $amount]);
        }
        else{
            $request->session()->flash('error', 'Something went wrong on the registration process. Please try again.');
            return redirect(route('bjj_register'));
        }
    }

    public function showEvents()
    {
        $upcomingEvents = BjjEvent::where('event_start', '>', Carbon::now())->get();
        $pastEvents = BjjEvent::where('event_start', '<', Carbon::now())->get();
        return view('bjj.events', [
            'upcomingEvents' => $upcomingEvents,
            'pastEvents' => $pastEvents]); 
    }

    public function showCompetitorList()
    {
        return view('bjj.competitor_list'); 
    }

    public function showRules()
    {
        return view('bjj.rules'); 
    }

    public function showAbout()
    {
        return view('bjj.about');
    }

    public function getFeeAmount(BjjParticipant $participant)
    {
        return $participant->bjj_event->getFee($participant->age_group);
    }

    public function paymentSubmit(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $token = $request->get('stripeToken');
        $email = $request->get('email');
        $participantId = $request->get('id');
        $participant = BjjParticipant::find($participantId);
        $amount = $participant->bjj_event->getFee($participant->age_group);
        try {
            $customer = \Stripe\Customer::create(array(
                "source" => $token,
                "email" => $email,
                "description" => "Event participant")
            );
            $charge = \Stripe\Charge::create(array(
                "amount" => $amount, // Amount in cents
                "currency" => "eur",
                "customer" => $customer->id
                ));
            BjjParticipant::where('id', $participantId)->update(['paid' => 1, 'email' => $email]);
            $request->session()->flash('status', 'You have successfully registered for the event.');
            return redirect(route('bjj_events'));
        } catch(\Stripe\Error\Card $e) {
            $request->session()->flash('error', 'We could not charge your card for some reason.');
            return redirect(route('bjj_register'));
        }
    }

    public function showLocation(){
        return view('bjj.location');
    }

    public function showContact(){
        return view('bjj.contact');
    }

    public function sendContactFormEmail(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message'=> 'required'
        ]);
        $contact_form = ContactForm::create(Input::all());
        Mail::to('info@midlandsopen.com')->send(new ContactFormEmail($contact_form));
        $request->session()->flash('status', 'Your message was sent. We will contact you back as soon as posible.');
        return redirect(route('bjj_contact'));
    }

    public function showTermsConditions()
    {
        return view('bjj.terms_conditions');
    }

    public function showGallery()
    {
        return view('bjj.gallery');
    }
}
