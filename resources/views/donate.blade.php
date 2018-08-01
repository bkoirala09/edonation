@extends('master')

@section('content')


    <style type="text/css">
        .fundraiserform{
            text-align: center;
            margin-top: 80px;
            font-family: sans-serif;
            font-size: 20px;

        }
    </style>

    <body>



<div class="container">
        <h2>Donation Form </h2>



            <form action="{{ url('/donate')}}" method="post">
                @csrf




                <div class="form-group row">
                    <label for="event_title" class="col-sm-2 col-form-label">Event Title</label>
                    <div class="col-sm-10">
                        <input name="event_title" type="text"  class="form-control-plaintext" id="staticEmail" value="{{app('request')->input('event_title')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input  name="username" type="text"  class="form-control-plaintext" id="staticUser" value="{{app('request')->input('user')}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputAmount" class="col-sm-2 col-form-label">Amount</label>
                    <div class="col-sm-10">
                        <input name="inputAmount" type="number" class="form-control" id="amt" placeholder="inputAmount">
                    </div>
                </div>

                <input type="hidden" id="eid" name="event_id" value="{{app('request')->input('event_id')}}">


                <button class="btn btn-lg btn-outline-success" type="submit">submit</button>

            </form>



    </div>




</body>

    @endsection