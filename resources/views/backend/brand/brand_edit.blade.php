@extends('admin.admin_dashboard')
@section('content')
  <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-4">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Brand</h3>
                </div>
                <!-- /.box-header -->
                <form action="{{ route('update.brand', $brand->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="current_image" value="{{ $brand->brand_image }}">
                <div class="box-body">
                     <div class="form-group">
                         <label for="" class="info-title">Brand Name En <span class="text-danger">*</span></label>
                         <input type="text" class="form-control" name="brand_name_en" value="{{ $brand->brand_name_en }}">
                         @error('brand_name_en')
                             <span class="text-danger">
                            {{ $message }}
                             </span>
                         @enderror
                     </div>
                     <div class="form-group">
                        <label for="" class="info-title">Brand Name Hin <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="brand_name_hin" value="{{ $brand->brand_name_hin }}">
                        @error('brand_name_hin')
                        <span class="text-danger">
                             {{ $message }}
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="info-title">Brand Image <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="brand_image">
                        @error('brand_image')
                        <span class="text-danger">
                             {{ $message }}
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </div>
                </form>
                <!-- /.box-body -->
              </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->

    </div>
<!-- /.content-wrapper -->

@endsection
