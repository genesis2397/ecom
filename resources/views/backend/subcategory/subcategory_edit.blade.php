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
                      <h3 class="box-title">Edit Sub-Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <form action="{{ route('update.subcategory',$subcat->id) }}" method="post">
                        @csrf
                    <div class="box-body">
                          <div class="form-group">
                            <select class="form-control select2" name="category_id" style="width: 100%;">
                                <option disabled value="">- Select Category -</option>
                                @foreach ($cat as $categories)
                                    <option value="{{ $categories->id }}" {{ $categories->id==$subcat->category_id ? 'selected':'' }}>{{ $categories->category_name_en }}</option>
                                @endforeach
                              </select>
                             @error('category_id')
                                 <span class="text-danger">
                                {{ $message }}
                                 </span>
                             @enderror
                          </div>
                         <div class="form-group">
                            <label for="" class="info-title">Sub-Category Name En <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="subcategory_name_en" value="{{ $subcat->subcategory_name_en }}">
                            @error('subcategory_name_en')
                            <span class="text-danger">
                                 {{ $message }}
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="info-title">Sub-Category Name Hin <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="subcategory_name_hin" value="{{ $subcat->subcategory_name_hin }}">
                            @error('subcategory_name_hin')
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

