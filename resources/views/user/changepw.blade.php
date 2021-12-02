@extends('user.user_layout')

@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            @include('user.order.include_sidebar.sidebar_user')
            <div class="col-md-1">
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Hi...</span><strong>{{ Auth::user()->name }}
                    </strong> Welcome to Easy Online Shop</h3>
                </div><br><br>
                <form action="{{ route('profile.updatepw') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <h4><label for="" class="info-title">Current Password: <span class="text-danger">*</span></label></h4>
                        <input type="password" class="form-control" name="current_password">
                        @error('current_password')
                            <span class="text-danger"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <h4><label for="" class="info-title">New Password: <span class="text-danger">*</span></label></h4>
                        <input type="password" class="form-control" name="password">
                        @error('password')
                            <span class="text-danger"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <h4><label for="" class="info-title">Confirm Password: <span class="text-danger">*</span></label></h4>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
@endsection
