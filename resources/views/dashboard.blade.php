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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
