<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Events;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Events::all(); // scope resolution le class ko object nabanai static object lai call garcha
//        return view('events.index')->with(['datas' => $results]);
//        return view('events.index', ['datas' => $results]);
        return view('events.index', compact('results'));
//        print_r($results);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fundraiserform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $events = new Events;
            $events->events_title = $request->input('events_title'); // request ko parameter and form ko name same hunu parcha
            $events->description = $request->input('description');
            $events->user_id =  Session::get('user_id');
            // yo pachi login gareko user ko id rakhne ho
            $events->save();

           // return redirect ()->route('fundraiserform.index');
            return view('/profile');
        }
        catch (Exception $e){
            throw $e;
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function  deleteevent(Request $request){
        if ($request->method() == 'GET') {
            $id = $request->input('event_id');
            $events=DB::table('events')->where('id','=',intVal($id))->delete();
            return redirect('/admin');
        }


    }
    public function approveevent(Request $request){
        if ($request->method() == 'GET') {
            $id = $request->input('event_id');
            $events = DB::table('events')->where('id', '=', intVal($id))->update(['verify' => 1]);
            return redirect('/admin');

        }
    }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
