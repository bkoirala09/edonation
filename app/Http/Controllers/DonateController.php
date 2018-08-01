<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Donate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class DonateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('donate');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $donate = new Donate();
        $donate->events_title = $request->input('events_title'); // request ko parameter and form ko name same hunu parcha
        $donate->name= $request->input('name');
        $donate->amount = $request->input('amount'); 
        $donate->save();
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
    public function handledonation(Request $request){
        if ($request->method() == 'POST') {
            $username = $request->input('username');
            $event_title = $request->input('event_title');
            $event_id = $request->input('event_id');
            $amount = $request->input('inputAmount');






            if($amount>5000 && $amount<=10000){
                $rating=2;
            }

            elseif ($amount>10000 && $amount<=15000){
                $rating=3;
            }
            elseif($amount>15000 && $amount<=20000){
                $rating=4;
            }
            elseif($amount>20000){
                $rating=5;
            }
            else{
                $rating=1;
            }


            $user =DB::table('users')->where('username','=',$username)->get();
            $events=DB::table('events')->where('id','=',$event_id)->get();

            $donate= new Donate;



            $donate->amount = $amount;
            $donate->user_id =$user[0]->id;
            $donate->event_id=$events[0]->id;
            $donate->rating=$rating;
            $donate->save();
            $alldonations=DB::table('donate')->where('event_id','=',$event_id)->sum('donate.amount');


            return view('donatemessage',['amount'=>$alldonations,'event_title'=>$event_title,'user_amount'=>$amount]);
        }
        else{
            return view('login');
        }
    }
}
