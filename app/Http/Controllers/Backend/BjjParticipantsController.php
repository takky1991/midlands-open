<?php

namespace App\Http\Controllers\Backend;

use App\BjjEvent;
use App\BjjParticipant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class BjjParticipantsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $participants = BjjParticipant::wherePaid(1)->paginate(10);

        return view('backend.bjj_participants.index', ['participants' => $participants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $events = BjjEvent::all();

        return view('backend.bjj_participants.create', ['events' => $events]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
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
        ]);

        $participant = Input::all();
        $participant['paid'] = 1;
        $participant['terms_conditions'] = 'on';

        if($participant = BjjParticipant::create($participant)){
            $request->session()->flash('success', 'Participant was created.');
        }
        else{
            $request->session()->flash('error', 'Something went wrong.');
        }

        return redirect(route('bjj-participants.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, Request $request)
    {
        if($participant = BjjParticipant::find($id)){
            $events = BjjEvent::all();
            return view('backend.bjj_participants.edit', ['participant' => $participant, 'events' => $events]);
        }else{
            $request->session()->flash('error', 'No participant found with ID of ' . $id);
            return redirect(route('bjj-participants.index'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
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
            'email' => 'required|email|unique:bjj_participants,email,' . $id,
            'phone_number' => 'required|numeric|min:6',
        ]);

        $participant = BjjParticipant::find($id);
        $participant->first_name = Input::get('first_name');
        $participant->last_name = Input::get('last_name');
        $participant->gender = Input::get('gender');
        $participant->bjj_event_id = Input::get('bjj_event_id');
        $participant->age_group = Input::get('age_group');
        $participant->date_of_birth = Input::get('date_of_birth');
        $participant->belt = Input::get('belt');
        $participant->weight_category = Input::get('weight_category');
        $participant->years_training = Input::get('years_training');
        $participant->club_name = Input::get('club_name');
        $participant->instructor_name = Input::get('instructor_name');
        $participant->email = Input::get('email');
        $participant->phone_number = Input::get('phone_number');

        $participant->save();

        $request->session()->flash('success', 'Participant was successfully updated.');

        return (redirect(route('bjj-participants.index')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $participant = BjjParticipant::find($id)->delete();

        $request->session()->flash('success', 'Successfully deleted participant!');
        return redirect(route('bjj-participants.index'));
    }

}
