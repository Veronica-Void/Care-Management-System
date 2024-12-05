<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0 text-center">Register</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('register-user') }}" method="post">
                            @if(Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            @if(Session::has('fail'))
                                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                            @endif
                            @csrf
                            <div class="mb-2">
                                <label for="roles" class="form-label">Role</label>
                                <select name="roles" id="roles" class="form-select" onchange="this.form.submit()">
                                    <option value="supervisor" {{ old('roles') == 'supervisor' ? 'selected' : '' }}>Supervisor</option>
                                    <option value="doctor" {{ old('roles') == 'doctor' ? 'selected' : '' }}>Doctor</option>
                                    <option value="caregiver" {{ old('roles') == 'caregiver' ? 'selected' : '' }}>Caregiver</option>
                                    <option value="patient" {{ old('roles') == 'patient' ? 'selected' : '' }}>Patient</option>
                                    <option value="family_member" {{ old('roles') == 'family_member' ? 'selected' : '' }}>Family Member</option>
                                </select>
                            </div>
                            <div class="mb-">
                                <label for="f_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="f_name" id="f_name" value="{{ old('f_name') }}" placeholder="Enter your first name">
                                <span class="text-danger">@error('f_name') {{ $message }} @enderror</span>
                            </div>
                            <div class="mb-3">
                                <label for="l_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="l_name" id="l_name" value="{{ old('l_name') }}" placeholder="Enter your last name">
                                <span class="text-danger">@error('l_name') {{ $message }} @enderror</span>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Enter your email">
                                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Enter your phone number">
                                <span class="text-danger">@error('phone') {{ $message }} @enderror</span>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Create a password">
                                <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                            </div>
                            <div class="mb-3">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" name="dob" id="dob" value="{{ old('dob') }}">
                                <span class="text-danger">@error('dob') {{ $message }} @enderror</span>
                            </div>
                            @if($showPatientFields)
                                <div class="mb-3">
                                    <label for="family_code" class="form-label">Family Code</label>
                                    <input type="text" class="form-control" name="family_code" id="family_code" value="{{ old('family_code') }}" placeholder="Enter your family code">
                                    <span class="text-danger">@error('family_code') {{ $message }} @enderror</span>
                                </div>
                                <div class="mb-3">
                                    <label for="emergency_contact" class="form-label">Emergency Contact</label>
                                    <input type="text" class="form-control" name="emergency_contact" id="emergency_contact" value="{{ old('emergency_contact') }}" placeholder="Enter emergency contact">
                                    <span class="text-danger">@error('emergency_contact') {{ $message }} @enderror</span>
                                </div>
                                <div class="mb-3">
                                    <label for="relation_to_emergency_contact" class="form-label">Relation to Emergency Contact</label>
                                    <input type="text" class="form-control" name="relation_to_emergency_contact" id="relation_to_emergency_contact" value="{{ old('relation_to_emergency_contact') }}" placeholder="Enter relation">
                                    <span class="text-danger">@error('relation_to_emergency_contact') {{ $message }} @enderror</span>
                                </div>
                            @endif
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <a href="login" class="text-decoration-none">Already a user? Login Here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
