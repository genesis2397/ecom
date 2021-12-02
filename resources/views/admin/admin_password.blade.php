@extends('admin.admin_dashboard')


@section('content')

<div class="container-full">
    <!-- Main content -->
    <section class="content">
<div class="box">
    <div class="box-header with-border">
      <h4 class="box-title">Admin Change Password</h4>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="col">
            <form novalidate="" action="{{ route('admin.updatepw') }}" method="post">
              @csrf
                    <div class="form-group">
                        <h5>Current Password <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="password" name="current_password" class="form-control" required="" data-validation-required-message="This field is required">
                            <div class="help-block">
                                @error('current_password')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                     </div>
                    </div>
                    <div class="form-group">
                        <h5>New Password <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="password" name="password" class="form-control" required="" data-validation-required-message="This field is required">
                            <div class="help-block">
                            </div>
                                @error('password')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                    </div>
                    <div class="form-group">
                        <h5>Confirm Password <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="password" name="password_confirmation" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                    </div>
                    <div class="text-xs-right">
                        <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                    </div>
            </form>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    <!-- /.box-body -->
  </div>
</section>
</div>

@endsection
