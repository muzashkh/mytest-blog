@extends('layouts.app')

@section('title', 'Login page')

@section('content')

<h1>Login Details</h1>

<form action="{{ route('admin.loginpost') }}" method="POST">
	
	@csrf

	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username" id="username" required class="form-control">
		@if($errors->has('username'))
			<label>{{ $errors->first('username') }}</label>
		@endif
	</div>

	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" id="password" required class="form-control">
		@if($errors->has('password'))
			<label>{{ $errors->first('password') }}</label>
		@endif
	</div>

	<div class="checkbox">
	  <label><input type="checkbox" name="remember" id="remember"> Remember Me</label>
	  @if($errors->has('remember'))
			<label>{{ $errors->first('remember') }}</label>
		@endif
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary form-control">Login</button>
	</div>

</form>

	<div class="form-group col-md-12 text-center">
            <a class="btn btn-success form-control" href="{{ route('admin.register') }}" style="color: #fff;">Register</a>
    </div>

@endsection