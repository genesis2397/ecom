@extends('user.user_layout')


@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
        <div class="row">
            <div class="col-md-6 col-sm-6 sign-in">
                <h4 class="">Reset Password</h4>
                <p class="">Forgot your password? No problem.</p>
                <x-jet-validation-errors class="mb-4" />
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="form-group">
                        <label for="email" class="info-title">Email <span>*</span></label>
                        <input id="email" class="form-control unicase-form-control text-input" type="email" name="email" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="password" class="info-title">Password <span>*</span></label>
                        <input id="password" class="form-control unicase-form-control text-input" type="password" name="password" required autocomplete="new-password">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="info-title">Confirm Password <span>*</span></label>
                        <input id="password_confirmation" class="form-control unicase-form-control text-input" type="password" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Reset Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
        </div>
        @include('user.body.brands')
    </div>
</div>

@endsection
