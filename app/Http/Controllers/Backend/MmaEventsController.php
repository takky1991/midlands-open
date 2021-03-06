<?php

namespace App\Http\Controllers\Backend;

use App\MmaEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class MmaEventsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $events = MmaEvent::paginate(10);

        return view('backend.mma_events.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.mma_events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:mma_events,title|max:255',
            'event_start' => 'required',
            'content' => 'required|max:100',
            'early_reg_fee' => 'required',
            'late_reg_fee' => 'required',
            'teen_early_reg_fee' => 'required',
            'teen_late_reg_fee' => 'required',
        ]);

        MmaEvent::create(Input::all());

        $request->session()->flash('success', 'Event was created.');

        return redirect(route('mma-events.index'));
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
        if($event = MmaEvent::find($id)){
            return view('backend.mma_events.edit', ['event' => $event]);
        }else{
            $request->session()->flash('error', 'No event found with ID of ' . $id);
            return redirect(route('mma-events.index'));
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
            'title' => 'required|max:255|unique:mma_events,title,' .$id,
            'event_start' => 'required',
            'content' => 'required|max:100',
            'early_reg_fee' => 'required',
            'late_reg_fee' => 'required',
            'teen_early_reg_fee' => 'required',
            'teen_late_reg_fee' => 'required',
        ]);

        $event = MmaEvent::find($id)->update(Input::all());
        $request->session()->flash('success', 'Event was successfully updated.');
        return redirect(route('mma-events.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $event = MmaEvent::find($id);
        
        $participants = $event->participants;
        foreach($participants as $participant){
            $participant->delete();
        }

        $results = $event->results;
        foreach($results as $result){
            $result->delete();
        }

        $event->delete();

        $request->session()->flash('success', 'Successfully deleted event!');
        return redirect(route('mma-events.index'));
    }

}
