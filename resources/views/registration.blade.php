@extends('master')

@section('content')
    <body bgcolor="white">


{{--<form action="{{ url('/registration') }}" style="border:1px solid #ccc" method="post">--}}
    {{--@csrf--}}

    {{--<div class="container">--}}
    {{--<h1>Registration Form</h1>--}}
    {{--<p>Please fill in this form to create an account.</p>--}}
    {{--<hr>--}}

    {{--<label for="Full name"><b>Full Name</b></label>--}}
    {{--<input type="text" placeholder="Enter full name" name="fullname" required><br>--}}
     {{--<label for="Address"><b>Address</b></label>--}}
        {{--<label for="state"><b>state</b></label>--}}
        {{--<input type="text" placeholder="Enter your state" name="state" required>--}}
        {{--<label for="city"><b>city</b></label>--}}
        {{--<input type="text" placeholder="Enter your city" name="city" required>--}}
        {{--<label for="street"><b>street</b></label>--}}
        {{--<input type="text" placeholder="Enter your street" name="street" required><br>--}}


        {{--<label for="Contact no"><b>contact no</b></label>--}}
    {{--<input type="text" placeholder="Enter your contact no" name="contact_no" required><br>--}}

     {{--<label for="username"><b>Username</b></label>--}}
    {{--<input type="text" placeholder="Enter Username" name="username" required><br>--}}

    {{--<label for="psw"><b>Password</b></label>--}}
    {{--<input type="password" placeholder="Enter Password" name="password" required>--}}





    {{--<p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>--}}

    {{--<div class="clearfix">--}}
      {{--<button type="button" class="cancelbtn">Cancel</button>--}}
      {{--<button type="submit" class="signupbtn">Sign Up</button>--}}
    {{--</div>--}}
  {{--</div>--}}
{{--</form>--}}

<div class="container">
<form action="{{ url('/registration') }}"  method="post">
    @csrf




    <br><div class="form-group ">
        <label for="fullname" >Full Name</label>

            <input name="fullname" type="text"  class="form-control" id="nameid" pattern="[a-zA-Z\s]+" required>


    </div>

    <div class="form-group ">
        <label for="city" >City</label>

            <input name="city" type="text"  class="form-control" id="cityid" pattern="[a-zA-Z\s]+" required>

    </div>

    <div class="form-group ">
        <label for="state" >State</label>

            <input name="state" type="text"  class="form-control" id="stateid" pattern="[a-zA-Z\s]+"  required>

    </div>

    <div class="form-group ">
        <label for="street" >Street</label>

            <input name="street" type="text"  class="form-control" id="streetid" pattern="[a-zA-Z0-9\s]+" required>

    </div>

    <div class="form-group ">
        <label for="Contact no" >Contact no</label>

            <input name="contact_no" type="text"  class="form-control" id="contactid"  pattern="[0-9]{10}" required>

    </div>

    <div class="form-group ">
        <label for="username" >UserName</label>

            <input name="username" type="text"  class="form-control" id="userid" pattern="[a-zA-Z0-9\s]+" required>

    </div>

    <div class="form-group ">
        <label for="psw" >Password</label>

            <input name="password" type="password"  class="form-control" id="pid"  required >

    </div>

    <div class="form-group ">
        <label for="psw" > Confirm Password</label>

        <input name="password" type="password"  class="form-control" id="conformpassword"  required >

    </div>





    <button class="btn btn-lg btn-outline-success" type="submit">submit</button>

</form>


</div>

<script type="text/javascript">
    var password = document.getElementById("password")
        , conformpassword = document.getElementById("conformpassword");

    function validatePassword(){
        if(pid.value != conformpassword.value) {
            conformpassword.setCustomValidity("Passwords Don't Match");
        } else {
            conformpassword.setCustomValidity('');
        }
    }
    pid.onchange = validatePassword;
    conformpassword.onkeyup = validatePassword;

</script>







    </body>




@endsection