<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use App\MmaParticipant;
use App\MmaEvent;
use App\Mail\ContactFormEmail;
use App\ContactForm;
use Carbon\Carbon;

class MmaController extends Controller
{
    public function index()
    {
       return redirect(route('mma_about'));
    }

    public function showComingSoon(){
        return view('mma.coming_soon');
    }

    public function showRegister()
    {
        $events = MmaEvent::where('event_start', '>', Carbon::now())->get();
        return view('mma.register', ['events' => $events]); 
    }

    public function registerSubmit(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'gender' => 'required',
            'mma_event_id' => 'required',
            'age_group' => 'required',
            'date_of_birth' => 'required',
            'level' => 'required',
            'weight_category' => 'required',
            'years_training' => 'required',
            'club_name' => 'required|max:255',
            'instructor_name' => 'required|max:255',
            'email' => 'required|email|unique:mma_participants,email',
            'phone_number' => 'required|numeric|min:6',
            'terms_conditions' => 'required'
        ]);
        $email = $request->get('email');
        $participant = Input::all();
        $participant['paid'] = 0;
        $participant['email'] = '';

        if($participant = MmaParticipant::create($participant)){
            $id = $participant->id;
            $amount = $this->getFeeAmount($participant);
            return view('mma.payment', ['participant' => $participant, 'email' => $email, 'id' => $id, 'amount' => $amount]);
        }
        else{
            $request->session()->flash('error', 'Something went wrong on the registration process. Please try again.');
            return redirect(route('mma_register'));
        }
    }

    public function showEvents()
    {
        $upcomingEvents = MmaEvent::where('event_start', '>', Carbon::now())->get();
        $pastEvents = MmaEvent::where('event_start', '<', Carbon::now())->get();
        return view('mma.events', [
            'upcomingEvents' => $upcomingEvents,
            'pastEvents' => $pastEvents]); 
    }

    public function showCompetitorList()
    {
        return view('mma.competitor_list'); 
    }

    public function showRules()
    {
        return view('mma.rules'); 
    }

    public function showAbout()
    {
        return view('mma.about');
    }

    public function getFeeAmount(MmaParticipant $participant)
    {
        return $participant->mma_event->getFee($participant->age_group);
    }

    public function paymentSubmit(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $token = $request->get('stripeToken');
        $email = $request->get('email');
        $participantId = $request->get('id');
        $participant = MmaParticipant::find($participantId);
        $amount = $participant->mma_event->getFee($participant->age_group);
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
            MmaParticipant::where('id', $participantId)->update(['paid' => 1, 'email' => $email]);
            $request->session()->flash('status', 'You have successfully registered for the event.');
            return redirect(route('mma_events'));
        } catch(\Stripe\Error\Card $e) {
            $request->session()->flash('error', 'We could not charge your card for some reason.');
            return redirect(route('mma_register'));
        }
    }

    public function showLocation()
    {
        return view('mma.location');
    }

    public function showContact()
    {
        return view('mma.contact');
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
        return redirect(route('mma_contact'));
    }

    public function showTermsConditions()
    {
        return view('mma.terms_conditions');
    }

    public function showGallery()
    {
        return view('mma.gallery');
    }
}
