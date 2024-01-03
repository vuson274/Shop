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

    <form class="shadow" style="width: 40%; padding: 20px;"
          action="{{route('doEdit.profile',['id'=>$data->id])}}"
          method="post">
        @csrf
        <h4 class="display-4  fs-1">Edit Profile</h4><br>
        @if(\Illuminate\Support\Facades\Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong>{{\Illuminate\Support\Facades\Session::get('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(\Illuminate\Support\Facades\Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>{{\Illuminate\Support\Facades\Session::get('error')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text"
                   class="form-control"
                   name="name"
                   value="{{$data->name}}">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email"
                   class="form-control"
                   name="email"
                   value="{{$data->email}}">
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="tel"
                   class="form-control"
                   name="phone"
                   value="{{$data->phone}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password"
                   class="form-control"
                   name="password"
                   value="">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{route('home')}}" class="btn btn-success">Home</a>
    </form>
</div>
</body>
</html>