<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Model\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view ('registration');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        dd('test');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
           // print_r($request->method());die();
            if($request->method()=='POST')
            {

                $user= new User;

                $user_id = '';

                $user->username = $request->input('username');
                $user->password = bcrypt($request->input('password'));
                $user->user_type = $request->input('user_type');
                $user->save();
                $match=Hash::check($request->input('password'), $user->password );


                if($user->save()){
                    $user_id = $user->id;
                }else{
                    echo "not saved";
                }

                $userdetails=new userdetails();
                $userdetails->fullname = $request->input('fullname');
                $userdetails->city = $request->input('city');
                $userdetails->state = $request->input('state');
                $userdetails->street = $request->input('street');
                $userdetails->contact_no = $request->input('contact_no');
                $userdetails->user_id = $user_id;
                $userdetails->save();

                return view ('login');

            }
            else{
                return view('registration');
            }

        }
        catch (Exception $e)
        {
            throw $e;
        }





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
