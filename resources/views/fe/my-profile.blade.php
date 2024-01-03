<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="shadow" style="width: 40%; text-align: center; padding: 20px;">
            <h4 class="display-4  fs-1">Profile</h4><br>
            <h4 class="display-4  fs-3">{{\Illuminate\Support\Facades\Auth::user()->name}}</h4><hr>
            <h4 class="display-4  fs-3">{{\Illuminate\Support\Facades\Auth::user()->email}}</h4><hr>
            <h4 class="display-4  fs-3">{{\Illuminate\Support\Facades\Auth::user()->phone}}</h4><hr>
            <a href="{{route('edit-profile')}}" class="btn btn-warning">Edit</a>
            <a href="{{route('home')}}" class="btn btn-success">Home</a>
        </div>
    </div>
</body>
</html>