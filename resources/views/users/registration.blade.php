@extends('main')

@section('content')

<div class="row justify-content-center">
	<div class="col-md-4">
		<div class="card">
		<div class="card-header">Registration</div>
		<div class="card-body">
			<form action="" method="POST">
				@csrf
				<div class="form-group mb-3">
					<input type="text" name="lastname" class="form-control" placeholder="Prenom" />
					@if($errors->has('lastname'))
						<span class="text-danger">{{ $errors->first('lastname') }}</span>
					@endif
				</div>
				<div class="form-group mb-3">
					<input type="text" name="firstname" class="form-control" placeholder="Nom" />
					@if($errors->has('firstname'))
						<span class="text-danger">{{ $errors->first('firstname') }}</span>
					@endif
				</div>
				<div class="form-group mb-3">
					<input type="text" name="email" class="form-control" placeholder="Email Address" />
					@if($errors->has('email'))
						<span class="text-danger">{{ $errors->first('email') }}</span>
					@endif
				</div>
				<div class="form-group mb-3">
					<input type="password" name="password" class="form-control" placeholder="Password" />
					@if($errors->has('password'))
						<span class="text-danger">{{ $errors->first('password') }}</span>
					@endif
				</div>
				<div class="form-group mb-3">
					<input type="password" name="confrme password" class="form-control" placeholder="confirme password" />
					@if($errors->has('password'))
						<span class="text-danger">{{ $errors->first('password') }}</span>
					@endif
				</div>
				<div class="d-grid mx-auto">
					<button type="submit" class="btn btn-dark btn-block">Register</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection('content')