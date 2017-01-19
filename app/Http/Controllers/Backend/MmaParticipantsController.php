<?php

namespace App\Http\Controllers\Backend;

use App\MmaEvent;
use App\MmaParticipant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class MmaParticipantsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $participants = MmaParticipant::wherePaid(1)->paginate(10);

        return view('backend.mma_participants.index', ['participants' => $participants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $events = MmaEvent::all();

        return view('backend.mma_participants.create', ['events' => $events]);
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
        ]);

        $participant = Input::all();
        $participant['paid'] = 1;
        $participant['terms_conditions'] = 'on';

        if($participant = MmaParticipant::create($participant)){
            $request->session()->flash('success', 'Participant was created.');
        }
        else{
            $request->session()->flash('error', 'Something went wrong.');
        }
        
        return redirect(route('mma-participants.index'));
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $participant = MmaParticipant::find($id)->delete();

        $request->session()->flash('success', 'Successfully deleted participant!');
        return redirect(route('mma-participants.index'));
    }

}
