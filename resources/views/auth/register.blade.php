<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>

<div class="container">
  <div class="row" style="margin-top:45px">
    <div class="col-md-4 col-md-offset-4">
      <h4>Register | Custom Auth</h4><hr>
       <form action="{{route('auth.save')}}" method="post">

        @if (Session::get('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
        @endif

        @if (Session::get('fail'))
<div class="alert alert-danger">
    {{Session::get('fail')}}
</div>
        @endif

        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter your name" value="{{old('name')}}">
            <span class="text-danger">
                @error('name'){{$message}}@enderror
            </span>
          </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" class="form-control" name="email" placeholder="Enter your email address" value="{{old('email')}}">
        </div>
        <span class="text-danger">
            @error('email'){{$message}}@enderror
        </span>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password" placeholder="Enter your password">
        </div>
        <span class="text-danger">
            @error('password'){{$message}}@enderror
        </span>
          <button type="submit" class="btn btn-block btn-primary">Sign Up</button>
          <br>
          <a href="{{route('auth.login')}}">Already have an account, login now</a>

      </form>
    </div>
  </div>
</div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
