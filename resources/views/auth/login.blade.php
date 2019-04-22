@extends('layouts.app')

@section('content')
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);width: 450px;">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center" style="color: #19254C">Sign In</h5>
            <form class="form-signin" method="POST" action="{{ route('login') }}">
                @csrf
              <div class="form-label-group form-group">
                <input type="email" name="email" id="inputEmail" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email address" required autofocus>
                 <label for="inputEmail">Email address</label>
                 @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>

              <div class="form-label-group form-group">
                <input type="password" name="password" id="inputPassword" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" required>
                 <label for="inputPassword">Password</label>
                 @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" style="">Sign in</button>
                <br/>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

 
@endsection



