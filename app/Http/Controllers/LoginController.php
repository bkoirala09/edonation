<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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

    public function login(Request $request)
    {
        try {
            // print_r($request->method());die();
            if ($request->method() == 'POST') {


                $username = $request->input('uname');
                $password = $request->input('psw');

                $user =DB::table('users')->where('username','=',$username)->get();

                $match=Hash::check($password, $user[0]->password );

                if (count($user)==1 && Hash::check($password, $user[0]->password )){
                    if($user[0]->user_type=='admin'){

                        //$request->session()->put('user_id', $user[0]->id);
                        Session::put('user_id', $user[0]->id);

                        echo 'you are an admin';
                        return redirect('/admin');

                    }

                    $views= DB::table('events')->where('verify','=',1)->get();
                    //$request->session()->put('user_id', $user[0]->id);
                    Session::put('user_id', $user[0]->id);
                    $r_events=$this->get_recommended_events();
                    //print_r($r_events);





                    return view('profile',['viewsdata'=>$views,'username'=>$username,'events'=>$r_events]);


                }
                else {
                    echo '<p style="color:red;" >Login Failed. Enter correct password!</p>';


                    return view('login');
                }
            } else {
                return view('login');
            }

        } catch (Exception $e) {
            throw $e;
        }


    }

    public function get_feature($user_id){

        $donations = DB::table('donate')->where('user_id', '=', $user_id)->get();
        $event_count = DB::table('events')->max('id');
        $features = array_fill(0, $event_count, 0);

        foreach($donations as $donation) {
            $event_id = $donation->event_id;
            $rating = $donation->rating;
            $features[$event_id-1] = $rating;
        }

        return $features;
    }


    public function get_cosine_similarity($feature1, $feature2){

        $array_len = sizeof($feature1);
        $AB = 0;
        $ASQ = 0;
        $BSQ = 0;

        for($idx=0; $idx < $array_len; $idx++){
            $AB = $AB + $feature1[$idx]*$feature2[$idx];
            $ASQ = $ASQ + $feature1[$idx]*$feature1[$idx];
            $BSQ = $BSQ + $feature2[$idx]*$feature2[$idx];
        }

        if ($ASQ * $BSQ != 0){
            $cosine = ($AB)/(sqrt($ASQ) * sqrt($BSQ));
            return $cosine;
        }

        return 0;
    }


    public function get_diff_events($current_user_id, $other_user_id){
        $donation_diff = DB::table('donate')->where([
            ['user_id', '=', $other_user_id],
            ['user_id', '<>', $current_user_id]
        ])->get();

        $diff_events_id = array();
        foreach($donation_diff as $diff){
            array_push($diff_events_id, $diff->event_id);
        }
        $events = DB::table('events')->whereIn('id', $diff_events_id)->get();
        return $events;
    }


    public function get_recommended_events(){

        $current_user_id = Session::get('user_id');
        $current_user_feature = $this->get_feature($current_user_id);
        $other_users = DB::table('users')->where('id', '!=', $current_user_id)->get();

        $all_cosine_array = array();
        $existing_events = array();
        foreach($other_users as $user){
            $user_feature = $this->get_feature($user->id);
            $cosine_value = $this->get_cosine_similarity($current_user_feature, $user_feature);
            $all_cosine_array += [($user->id)=>($cosine_value)];

        }

        arsort($all_cosine_array);

        $recommended_events = array();
        foreach($all_cosine_array as $other_user_id=>$cosine_value){
           $diffs = $this->get_diff_events($current_user_id, $other_user_id);

           $recommended = array();
           foreach ($diffs as $diff){

               if (!in_array($diff->id,$existing_events)){
                   $recommended+= ['events_title'=>$diff->events_title];
                   $recommended+= ['description'=>$diff->description];
                   $recommended+= ['event_id'=>$diff->id];
                   array_push($existing_events,$diff->id);
               }
           }
           if(sizeof($recommended)>0) {
               array_push($recommended_events, $recommended);
           }

        }

        if (sizeof($recommended_events)<=6){
           return $recommended_events;

        }
        return array_slice($recommended_events, 0, 6);
    }
}
