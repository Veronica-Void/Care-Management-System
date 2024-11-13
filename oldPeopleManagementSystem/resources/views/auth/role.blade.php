<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH">
</head>
<body>
    <div class="role-container" style="margin-top: 20px;">
    <h2>Make new role</h2>
    <hr>
        <form action="{{route('admin-role')}}" method="post">
        @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
        @csrf
        <div class="form-group">
            <p end="">Role Access Level</p>
            @foreach ($roles as $role)
                <h3>{{ $role->role }}: {{ $role->access_lvl }}</h3>
            @endforeach
        </div>
        <div class="form-group">
            <p>New Role: <input name="role" type="text"></p>
        </div>
        <div class="form-group">
            <p>Access Level: <input name="access_num" type="number" min=0></p>
        </div>
            <button type="change_role">Ok</button>
            <button type="cancel">Cancel</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"></script>
</body>
</html>