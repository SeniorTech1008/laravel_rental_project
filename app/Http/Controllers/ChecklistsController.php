<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checklist;
use App\Models\Item;
use Carbon\Carbon;

class ChecklistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Checklist::get(); //get all checklist

        return view('checklists.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::get();

        return view('checklists.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checklist = ['name' => $request->name, 'start_date' => $request->start_date, 'end_date' => $request->end_date];

        $data = Checklist::create($checklist);//store checklist

        $data->items()->attach($request->item_id);//store checklist item to pivot

        return redirect()->route('checklist.index')->with('success', 'Item created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Item::get();
        $checklist = Checklist::find($id);

        return view('checklists.edit', compact('items', 'checklist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = Checklist::find($id);//find checklist by id
        $data->name = $request->name;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->save();

        $data->items()->sync($request->item_id);//update checklist item to pivot

        return redirect()->route('checklist.index')->with('success', 'Item updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
    
    /**
     *  [useAgainCheclistById description]
     *
     *  @method useAgainCheclistById
     *
     *  @param  Request $request [description]
     *  @param  [type] $id [description]
     *
     *  @return [type] [description]
     */
    
    public function useAgainCheclistById(Request $request, $id){

        $data = Checklist::with('items')->find($id);// get the checklist
        $start_date = Carbon::createFromFormat('Y-m-d', $data->start_date);
        $end_date = Carbon::createFromFormat('Y-m-d', $data->end_date);
        $diff = $end_date->diffInDays($start_date);//calculate the days between startdate and enddate
        foreach ($data->items as $item) {

            $items[] = $item->id;//add checklist items in an array
        }
        $checklist = Checklist::create(['name' => $data->name, 'start_date' => date('Y-m-d', strtotime($data['end_date']. ' + 1 days')), 'end_date' => date('Y-m-d', strtotime($data['end_date']. ' + ' . $diff . ' days'))]);
        $checklist->items()->attach($items);
        
        return redirect()->back()->with('success', 'Checklist added');
    } 
    
}
