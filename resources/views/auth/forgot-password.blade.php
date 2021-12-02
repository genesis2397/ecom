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
				<!-- Sign-in -->
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Forgot Password</h4>
	<p class="">Forgot your password? No problem.</p>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
		<div class="form-group">
            {{-- <x-jet-validation-errors class="text-danger" /> --}}
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input type="email" id="email" class="form-control unicase-form-control text-input" name="email">
		</div> <br><br><br><br><br><br>

	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
	</form>
</div>
<!-- Sign-in -->

<!-- create a new account -->
<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
        @include('user.body.brands')
    </div>
</div>
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
<!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->

@endsection
