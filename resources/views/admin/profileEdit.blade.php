@extends('admin.admin_dashboard')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
    <!-- Main content -->
    <section class="content">

<div class="box">
    <div class="box-header with-border">
      <h4 class="box-title">Profile Edit</h4>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col">
            <form novalidate="" action="{{ route('admin.profileSave') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <h5>Name <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="name" class="form-control" required="" data-validation-required-message="This field is required" value="{{ $adminData->name }}"> <div class="help-block"></div></div>
                    </div>
                    <div class="form-group">
                        <h5>File<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="file" id="image" name="file" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                    </div>
                    <div class="text-xs-right">
                        <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <h5>Email <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="email" value="{{ $adminData->email }}" name="email" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                    </div>
                    <div class="form-group">
                        <img id="showImage" style="width:100px; height:100px;" src="{{ (!empty($adminData->profile_photo_path)) ? url('upload/admin_images/'.$adminData->profile_photo_path) : url('upload/no_image.jpg') }}" alt="">
                    </div>
                </div>
            </form>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.box-body -->
  </div>
    </section>
</div>

  <script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
  </script>

@endsection()
