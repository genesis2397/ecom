@extends('admin.admin_dashboard')
@section('content')

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
                  <h3 class="box-title">Edit Category</h3>
                </div>
                <!-- /.box-header -->
                <form action="{{ route('update.category', $category->id) }}" method="post">
                    @csrf
                <div class="box-body">
                     <div class="form-group">
                         <label for="" class="info-title">Category Name En <span class="text-danger">*</span></label>
                         <input type="text" class="form-control" name="category_name_en" value="{{ $category->category_name_en }}">
                         @error('category_name_en')
                             <span class="text-danger">
                            {{ $message }}
                             </span>
                         @enderror
                     </div>
                     <div class="form-group">
                        <label for="" class="info-title">Category Name Hin <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="category_name_hin" value="{{ $category->category_name_hin }}">
                        @error('category_name_hin')
                        <span class="text-danger">
                             {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="info-title">Category Icon <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="category_icon" value="{{ $category->category_icon }}">
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

