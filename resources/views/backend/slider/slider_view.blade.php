@extends('admin.admin_dashboard')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
      <!-- Content Header (Page header) -->

      <!-- Main content -->
      <section class="content">
        <div class="row">
            <div class="col-8">

             <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">All Sliders</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>Slider Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                            <tr>
                              <td class="text-center"><img src="{{ asset($slider->slider_img) }}" style="width:80px; height:50px;"></td>
                              <td class="text-center">{{ $slider->title }}</td>
                              <td class="text-center">{{ $slider->description }}</td>
                              @if ($slider->status == 1)
                                    <td class="text-center"><span class="badge badge-pill badge-success">Active</span></>
                              @else
                                    <td class="text-center"><span class="badge badge-pill badge-dark">Inactive</span></td>
                              @endif
                              <td class="text-center">
                                  <a href="{{ route('edit.slider',$slider->id) }}" class="btn btn-info" title="Edit Category"><i class="fa fa-pencil"></i></a>
                                  <a href="{{ route('delete.slider',$slider->id) }}" class="btn btn-danger" title="Delete Category" id="delete"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-4">
              <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Add Slider</h3>
                  </div>
                  <!-- /.box-header -->
                  <form action="{{ route('store.slider') }}" method="post" enctype="multipart/form-data">
                      @csrf
                  <div class="box-body">
                       <div class="form-group">
                           <label for="" class="info-title">Slider Title <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" name="title">
                           @error('title')
                               <span class="text-danger">
                              {{ $message }}
                               </span>
                           @enderror
                       </div>
                       <div class="form-group">
                          <label for="" class="info-title">Description <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="description">
                          @error('description')
                          <span class="text-danger">
                               {{ $message }}
                          </span>
                      @enderror
                      </div>
                      <div class="form-group">
                          <label for="" class="info-title">Slider Image <span class="text-danger">*</span></label>
                          <input type="file" name="slider_img" class="form-control" onChange="slider(this)">
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
                                <img src="" id="sliderSRC">
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
	function slider(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#sliderSRC').attr('src',e.target.result).width(140).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>

@endsection
