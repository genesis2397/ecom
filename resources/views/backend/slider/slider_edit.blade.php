@extends('admin.admin_dashboard')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
      <!-- Content Header (Page header) -->

      <!-- Main content -->
      <section class="content">
        <div class="row">
            <!-- /.col -->
            <div class="col-4">
              <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Edit Slider</h3>
                  </div>
                  <!-- /.box-header -->
                  <form action="{{ route('update.slider',$slider->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                    <input type="hidden" name="old_img" value="{{ $slider->slider_img }}">
                  <div class="box-body">
                       <div class="form-group">
                           <label for="" class="info-title">Slider Title <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" name="title" value="{{ $slider->title }}">
                           @error('title')
                               <span class="text-danger">
                              {{ $message }}
                               </span>
                           @enderror
                       </div>
                       <div class="form-group">
                          <label for="" class="info-title">Description <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="description" value="{{ $slider->description }}">
                          @error('description')
                          <span class="text-danger">
                               {{ $message }}
                          </span>
                      @enderror
                      </div>
                      <div class="form-group">
                          <label for="" class="info-title">Slider Image <span class="text-danger">*</span></label>
                          <input type="file" name="slider_img" class="form-control" onChange="sliderEdit(this)" value="{{ $slider->slider_img }}">
                          @error('slider_img')
                          <span class="text-danger">
                               {{ $message }}
                          </span>
                      @enderror
                      </div>
                      <div class="form-group">
                          <div class="row">
                              <div class="col-md-6">
                                <input type="submit" class="btn btn-primary">
                              </div>
                              <div class="col-md-6">
                                <img src="" id="sliderEditSRC">
                              </div>
                          </div>
                      </div>
                  </div>
                  </form>
                  <!-- /.box-body -->
                </div>
            </div>
          </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->

    </div>
</div>
<!-- /.content-wrapper -->


<script type="text/javascript">
	function sliderEdit(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#sliderEditSRC').attr('src',e.target.result).width(140).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>

@endsection
