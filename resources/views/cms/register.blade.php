@extends('layouts.app')

@section('title', 'Register page')

@section('content')

<h1>Register User</h1>

<form action="{{ route('admin.registerpost') }}" method="POST">
	
	@csrf

	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username" id="username" required class="form-control">
		@if($errors->has('username'))
			<label>{{ $errors->first('username') }}</label>
		@endif
	</div>	

	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" id="email" required class="form-control">
		@if($errors->has('email'))
			<label>{{ $errors->first('email') }}</label>
		@endif
	</div>

	<div class="form-group">
		<label>First Name</label>
		<input type="text" name="first_name" id="first_name" required class="form-control">
		@if($errors->has('first_name'))
			<label>{{ $errors->first('first_name') }}</label>
		@endif
	</div>

	<div class="form-group">
		<label>Last Name</label>
		<input type="text" name="last_name" id="last_name" required class="form-control">
		@if($errors->has('last_name'))
			<label>{{ $errors->first('last_name') }}</label>
		@endif
	</div>

	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" id="password" required class="form-control">
		@if($errors->has('password'))
			<label>{{ $errors->first('password') }}</label>
		@endif
	</div>

	<div class="form-group">
		<label> Confirm Password</label>
		<input type="password" name="password_confirmation" id="password_confirmation" required class="form-control">
		@if($errors->has('password_confirmation'))
			<label>{{ $errors->first('password_confirmation') }}</label>
		@endif
	</div>

	<div class="checkbox">
	  <label><input type="checkbox" name="is_admin" id="is_admin"> Admin</label>
	  @if($errors->has('is_admin'))
			<label>{{ $errors->first('is_admin') }}</label>
		@endif
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-success form-control">Register</button>
	</div>

</form>

	<div class="form-group col-md-12 text-center">
            <a class="btn btn-primary form-control" href="{{ route('admin.login') }}" style="color: #fff;">Login</a>
    </div>

@endsection