@extends('admin.admin_dashboard')
@section('content')
  <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-8">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">All Brands</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr class="text-center">
                              <th>Brand En</th>
                              <th>Brand Hin</th>
                              <th>Image</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($brands as $brand)
                          <tr>
                            <td class="text-center">{{ $brand->brand_name_en }}</td>
                            <td class="text-center">{{ $brand->brand_name_hin }}</td>
                            <td class="text-center"><img src="{{ asset($brand->brand_image) }}" style="width:70px; height:40px;" alt=""></td>
                            <td class="text-center">
                                <a href="{{ route('edit.brand', $brand->id) }}" class="btn btn-info" title="Edit Brand"><i class="fa fa-pencil"></i></a>
                                <a href="{{ route('delete.brand', $brand->id) }}" class="btn btn-danger" title="Delete Brand" id="delete"><i class="fa fa-trash"></i></a>
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
          <div class="col-4">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Brand</h3>
                </div>
                <!-- /.box-header -->
                <form action="{{ route('store.brand') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="box-body">
                     <div class="form-group">
                         <label for="" class="info-title">Brand Name En <span class="text-danger">*</span></label>
                         <input type="text" class="form-control" name="brand_name_en">
                         @error('brand_name_en')
                             <span class="text-danger">
                            {{ $message }}
                             </span>
                         @enderror
                     </div>
                     <div class="form-group">
                        <label for="" class="info-title">Brand Name Hin <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="brand_name_hin">
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
</div>
<!-- /.content-wrapper -->

@endsection
