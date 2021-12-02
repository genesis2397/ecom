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
                <h3 class="box-title">All Categories</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr class="text-center">
                              <th>Category Icon</th>
                              <th>Category En</th>
                              <th>Category Hin</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($categories as $cat)
                          <tr>
                            <td class="text-center"><span><i class="{{ $cat->category_icon }}"></i></span></td>
                            <td class="text-center">{{ $cat->category_name_en }}</td>
                            <td class="text-center">{{ $cat->category_name_hin }}</td>
                            <td class="text-center">
                                <a href="{{ route('edit.category', $cat->id) }}" class="btn btn-info" title="Edit Category"><i class="fa fa-pencil"></i></a>
                                <a href="{{ route('delete.category', $cat->id) }}" class="btn btn-danger" title="Delete Category" id="delete"><i class="fa fa-trash"></i></a>
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
                  <h3 class="box-title">Add Category</h3>
                </div>
                <!-- /.box-header -->
                <form action="{{ route('store.category') }}" method="post">
                    @csrf
                <div class="box-body">
                     <div class="form-group">
                         <label for="" class="info-title">Category Name En <span class="text-danger">*</span></label>
                         <input type="text" class="form-control" name="category_name_en">
                         @error('category_name_en')
                             <span class="text-danger">
                            {{ $message }}
                             </span>
                         @enderror
                     </div>
                     <div class="form-group">
                        <label for="" class="info-title">Category Name Hin <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="category_name_hin">
                        @error('category_name_hin')
                        <span class="text-danger">
                             {{ $message }}
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="info-title">Category Icon <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="category_icon">
                        @error('category_icon')
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
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->

    </div>
<!-- /.content-wrapper -->

@endsection

