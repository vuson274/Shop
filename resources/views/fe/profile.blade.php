<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('/web/css/bootstrap.min.css')}}">--}}
</head>
<body>

<div class="d-flex justify-content-center align-items-center vh-100">

    <form class="shadow w-450 p-3"
          action="php/edit.php"
          method="post"
          enctype="multipart/form-data">

        <h4 class="display-4  fs-1">Profile</h4><br>
        <!-- error -->
        {{--<?php if(isset($_GET['error'])){ ?>--}}
        {{--<div class="alert alert-danger" role="alert">--}}
        {{--    <?php echo $_GET['error']; ?>--}}
        {{--</div>--}}
        {{--<?php } ?>--}}

        {{--        <!-- success -->--}}
        {{--<?php if(isset($_GET['success'])){ ?>--}}
        {{--<div class="alert alert-success" role="alert">--}}
        {{--    <?php echo $_GET['success']; ?>--}}
        {{--</div>--}}
        {{--<?php } ?>--}}
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text"
                   class="form-control"
                   name="fname"
                   value="">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text"
                   class="form-control"
                   name="uname"
                   value="">
        </div>

        <div class="mb-3">
            <label class="form-label">Profile Picture</label>
            <input type="file"
                   class="form-control"
                   name="pp">
            <img src=""
                 class="rounded-circle"
                 style="width: 70px">
            <input type="text"
                   hidden="hidden"
                   name="old_pp"
                   value="" >
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="home.php" class="link-secondary">Home</a>
    </form>
</div>
</body>
</html>