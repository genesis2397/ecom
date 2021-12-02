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
                <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <h4><label for="" class="info-title">Name: <span class="text-danger">*</span></label></h4>
                        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                    </div>
                    <div class="form-group">
                        <h4><label for="" class="info-title">Phone: <span class="text-danger">*</span></label></h4>
                        <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}" placeholder="{{ (empty(Auth::user()->phone)) ? 'N/A' : Auth::user()->phone }}">
                    </div>
                    <div class="form-group">
                        <h4><label for="" class="info-title">Email: <span class="text-danger">*</span></label></h4>
                        <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                    </div>
                    <div class="form-group">
                        <h4><label for="" class="info-title">Profile Photo: <span class="text-danger">*</span></label></h4>
                        <input type="file" class="form-control" name="image">
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
