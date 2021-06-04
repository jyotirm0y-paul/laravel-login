<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>

<div class="container">
  <div class="row" style="margin-top:45px">
    <div class="col-md-4 col-md-offset-4">
      <h4>Login | Custom Auth</h4><hr>
      <form action="{{route('auth.check')}}" method="post">
        @if (Session::get('fail'))
<div class="alert alert-danger">
    {{Session::get('fail')}}
</div>
        @endif
        <div class="form-group">
            @csrf
          <label>Email</label>
          <input type="text" class="form-control" name="email" placeholder="Enter your email address" value="{{old('email')}}">
          <span class="text-danger">
            @error('email'){{$message}}@enderror
          </span>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password" placeholder="Enter your password">
          <span class="text-danger">
            @error('password'){{$message}}@enderror
        </span>
        </div>
          <button type="submit" class="btn btn-block btn-primary">Sign In</button>
          <br>
          <a href="{{route('auth.register')}}">I don't have an account, create new</a>

      </form>
    </div>
  </div>
</div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
