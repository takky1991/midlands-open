<?php

namespace App\Http\Controllers\Backend;

use App\BjjEvent;
use App\BjjEventResult;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class BjjResultsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $results = BjjEventResult::orderBy('bjj_event_id', 'ASC')->orderBy('title', 'ASC')->orderBy('place', 'ASC')->paginate(10);

        return view('backend.bjj_results.index', ['results' => $results]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $events = BjjEvent::all();

        return view('backend.bjj_results.create', ['events' => $events]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'bjj_event_id' => 'required',
            'title' => 'required|max:10',
            'place' => 'required',
            'name_and_surname' => 'required',
            'club_name' => 'required'
        ]);
       
        BjjEventResult::create(Input::all());
        
        $request->session()->flash('success', 'Result was created.');

        return redirect(route('bjj-results.index'));
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
        if($result = BjjEventResult::find($id)){
            $events = BjjEvent::all();
            return view('backend.bjj_results.edit', ['result' => $result, 'events' => $events]);
        }else{
            $request->session()->flash('error', 'No result found with ID of ' . $id);
            return redirect(route('bjj-results.index'));
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
            'bjj_event_id' => 'required',
            'title' => 'required|max:10',
            'place' => 'required',
            'name_and_surname' => 'required',
            'club_name' => 'required'
        ]);

        BjjEventResult::find($id)->update(Input::all());

        $request->session()->flash('success', 'Result was successfully updated.');

        return (redirect(route('bjj-results.index')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $result = BjjEventResult::find($id)->delete();

        $request->session()->flash('success', 'Successfully deleted result!');
        return redirect(route('bjj-results.index'));
    }

}
