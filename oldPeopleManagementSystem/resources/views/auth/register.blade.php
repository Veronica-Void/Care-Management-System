<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="register-container" style="margin-top: 20px;">
    <h1>Registration</h1>
    <hr>
    <form action="{{ route('register-user') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="roles">Role:</label>
            <select name="roles" id="roles" class="form-control" onchange="this.form.submit()">
                <option value="supervisor" {{ old('roles') == 'supervisor' ? 'selected' : '' }}>Supervisor</option>
                <option value="doctor" {{ old('roles') == 'doctor' ? 'selected' : '' }}>Doctor</option>
                <option value="caregiver" {{ old('roles') == 'caregiver' ? 'selected' : '' }}>Caregiver</option>
                <option value="patient" {{ old('roles') == 'patient' ? 'selected' : '' }}>Patient</option>
                <option value="family_member" {{ old('roles') == 'family_member' ? 'selected' : '' }}>Family Member</option>
            </select>
        </div>

        <!-- Always visible fields -->
        <div class="form-group">
            <label for="f_name">First Name:</label>
            <input type="text" class="form-control" placeholder="Enter First Name" name="f_name" id="f_name" value="{{ old('f_name') }}">
            <span class="text-danger">@error('f_name') {{ $message }} @enderror</span>
        </div>

        <div class="form-group">
            <label for="l_name">Last Name:</label>
            <input type="text" class="form-control" placeholder="Enter Last Name" name="l_name" id="l_name" value="{{ old('l_name') }}">
            <span class="text-danger">@error('l_name') {{ $message }} @enderror</span>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" placeholder="Enter Email" name="email" id="email" value="{{ old('email') }}">
            <span class="text-danger">@error('email') {{ $message }} @enderror</span>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone" id="phone" value="{{ old('phone') }}">
            <span class="text-danger">@error('phone') {{ $message }} @enderror</span>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" placeholder="Enter Password" name="password" id="password">
            <span class="text-danger">@error('password') {{ $message }} @enderror</span>
        </div>

        <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" class="form-control" name="dob" id="dob" value="{{ old('dob') }}">
            <span class="text-danger">@error('dob') {{ $message }} @enderror</span>
        </div>

        <!-- Display Patient-specific Fields if Role is 'Patient' -->
        @if($showPatientFields)
            <div class="form-group">
                <label for="family_code">Family Code:</label>
                <input type="text" class="form-control" name="family_code" id="family_code" value="{{ old('family_code') }}">
                <span class="text-danger">@error('family_code') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="emergency_contact">Emergency Contact:</label>
                <input type="text" class="form-control" name="emergency_contact" id="emergency_contact" value="{{ old('emergency_contact') }}">
                <span class="text-danger">@error('emergency_contact') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="relation_to_emergency_contact">Relation to Emergency Contact:</label>
                <input type="text" class="form-control" name="relation_to_emergency_contact" id="relation_to_emergency_contact" value="{{ old('relation_to_emergency_contact') }}">
                <span class="text-danger">@error('relation_to_emergency_contact') {{ $message }} @enderror</span>
            </div>
        @endif

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
    <a href="login" class="btn btn-link">Already a user? Login Here</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>