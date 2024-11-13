<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="login-container" style="margin-top: 20px;">
<h2>Login</h2>
<hr>
    <form action="{{route('login-user')}}" method="post">
    @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
        @csrf
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" name="email" placeholder="Enter Email">
        <span class="text-danger">@error('email') {{$message}} @enderror</span>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Enter Password" >
        <span class="text-danger">@error('password') {{$message}} @enderror</span>
    </div>
        <button type="submit">Login</button>
    </form>
    <a href="register" class="button-class">Not a user? Register Here</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"></script>
</body>
</html>