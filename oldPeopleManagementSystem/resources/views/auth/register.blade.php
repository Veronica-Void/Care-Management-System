<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH">
</head>
<body>
<div class="register-container" style="margin-top: 20px;">
    <h1>Registration</h1>
    <hr>
    <form action="{{ route('register-user') }}" method="post">
        @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
        @csrf
        <div class="form-group">
            <label for="roles">Role:</label>
            <select name="roles" id="roles" class="form-control">
                <option value="supervisor">Supervisor</option>
                <option value="doctor">Doctor</option>
                <option value="caregiver">Caregiver</option>
                <option value="patient">Patient</option>
                <option value="family_member">Family Member</option>
            </select>
        </div>
        <div class="form-group">
            <label for="f_name">First Name:</label>
            <input type="text" class="form-control" placeholder="Enter First Name" name="f_name" id="f_name" value="{{old('f_name')}}">
            <span class="text-danger">@error('f_name') {{$message}} @enderror</span>
        </div>
        <div class="form-group">
            <label for="l_name">Last Name:</label>
            <input type="text" class="form-control" placeholder="Enter Last Name" name="l_name" id="l_name" value="{{old('l_name')}}">
            <span class="text-danger">@error('l_name') {{$message}} @enderror</span>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" placeholder="Enter Email" name="email" id="email" >
            <span class="text-danger">@error('email') {{$message}} @enderror</span>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone" id="phone" value="{{old('phone')}}">
            <span class="text-danger">@error('phone') {{$message}} @enderror</span>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" placeholder="Enter Password" name="password" id="password" >
            <span class="text-danger">@error('password') {{$message}} @enderror</span>
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" class="form-control" name="dob" id="dob" value="{{old('dob')}}">
            <span class="text-danger">@error('dob') {{$message}} @enderror</span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
    <a href="login" class="btn btn-link">Already a user? Login Here</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"></script>
</body>
</html>
