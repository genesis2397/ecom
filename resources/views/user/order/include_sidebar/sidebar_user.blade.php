<div class="col-md-2"><br>
    <img class="card-img-top" src="{{ (!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path) : url('upload/no_image.jpg') }}" alt="" style="border-radius: 50%" width="100%" height="100%">
    <br><br>
    <ul class="list-group list-group-flush">
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
        <a href="{{ route('profile.user') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
        <a href="{{ route('profile.changepw') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
        <a href="{{ route('view.order') }}" class="btn btn-primary btn-sm btn-block">My Orders</a>
        <a href="{{ route('profile.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
    </ul>
</div>
