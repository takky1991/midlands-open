<?php

namespace App\Http\Controllers\Backend;

use App\MmaEvent;
use App\MmaEventResult;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class MmaResultsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $results = MmaEventResult::orderBy('mma_event_id', 'ASC')->orderBy('title', 'ASC')->orderBy('place', 'ASC')->paginate(10);

        return view('backend.mma_results.index', ['results' => $results]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $events = MmaEvent::all();

        return view('backend.mma_results.create', ['events' => $events]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'mma_event_id' => 'required',
            'title' => 'required|max:10',
            'place' => 'required',
            'name_and_surname' => 'required',
            'club_name' => 'required'
        ]);
       
        MmaEventResult::create(Input::all());
        
        $request->session()->flash('success', 'Result was created.');

        return redirect(route('mma-results.index'));
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
        if($result = MmaEventResult::find($id)){
            $events = MmaEvent::all();
            return view('backend.mma_results.edit', ['result' => $result, 'events' => $events]);
        }else{
            $request->session()->flash('error', 'No result found with ID of ' . $id);
            return redirect(route('mma-results.index'));
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
            'mma_event_id' => 'required',
            'title' => 'required|max:10',
            'place' => 'required',
            'name_and_surname' => 'required',
            'club_name' => 'required'
        ]);

        MmaEventResult::find($id)->update(Input::all());

        $request->session()->flash('success', 'Result was successfully updated.');

        return (redirect(route('mma-results.index')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $result = MmaEventResult::find($id)->delete();

        $request->session()->flash('success', 'Successfully deleted result!');
        return redirect(route('mma-results.index'));
    }
}
