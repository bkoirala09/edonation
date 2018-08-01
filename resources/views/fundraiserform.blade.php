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



<div class="fundraiserform">
    <h2>Fundraisers form </h2>
    {{--<form action="{{ url('/fundraiserform')}} " method="post">--}}
    {{--@csrf--}}
        {{--Events title:--}}
        {{--<select name="events_title">--}}
            {{--<option value="null">select any</option>--}}
            {{--<option value="natural_calamities">Natural Calamities</option>--}}
            {{--<option value="health">Health Cases</option>--}}
            {{--<option value="orphans">Orphans</option>--}}
            {{--<option value="education">Education</option>--}}
            {{--<option value="disablity">Disability</option>--}}
        {{--</select><br>--}}
        {{--Location:--}}
        {{--<input type="text"name="location" placeholder="enter your location"><br>--}}
        {{--khalti id:--}}
        {{--<input type="text"name="khaltiid" placeholder="enter your khalti id"><br>--}}
        {{--PayPal id:--}}
        {{--<input type="text"name="paypalid" placeholder="enter your paypal id"><br>--}}
        {{--Display Picture:--}}
        {{--<input type="file" name="dpic"><br>--}}
        {{--Description:--}}
        {{--<textarea name="description"></textarea><br>--}}
        {{--<button>submit</button>--}}

    {{--</form>--}}
    <div class="container">
    <form action="{{ url('/fundraiserform')}} " method="post">
        @csrf

        <div class="form-group row">
            <label for="location" >Event Title </label><br>
            <select name="events_title" required>
                <option value="null">select any</option>
                <option value="natural_calamities">Natural Calamities</option>
                <option value="health">Health Cases</option>
                <option value="orphans">Orphans</option>
                <option value="education">Education</option>
                <option value="disablity">Disability</option>
            </select><br>



        </div>

    <div class="form-group row">
        <label for="location" >Location</label>

        <input name="location" type="text"  class="form-control" id="locationid" >
    </div>

        <div class="form-group row">
            <label for="khaltiid" >Khalti ID</label>

            <input name="khaltiid" type="text"  class="form-control" id="khaltiid" >
        </div>

        <div class="form-group row">
            <label for="paypalid" >Paypal ID</label>

            <input name="paypalid" type="text"  class="form-control" id="paypalid" >
        </div>

        <div class="form-group row">
            <label for="description" >Description</label>

            <textarea name="description" type="text"  class="form-control" id="description" required></textarea>
        </div>
        <button class="btn btn-lg btn-outline-success" type="submit">submit</button>






    </form>
    </div>



</div>





@endsection
</body>
    </html>