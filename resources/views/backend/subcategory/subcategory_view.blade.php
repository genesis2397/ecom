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
                     <h3 class="box-title">All Sub-Categories</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                               <tr class="text-center">
                                   <th>Category Name</th>
                                   <th>Sub-Category Name En</th>
                                   <th>Sub-Category Name Hin</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($subcategories as $subcat)
                               <tr>
                                 <td class="text-center">{{ $subcat->category->category_name_en }}</td>
                                 <td class="text-center">{{ $subcat->subcategory_name_en }}</td>
                                 <td class="text-center">{{ $subcat->subcategory_name_hin }}</td>
                                 <td class="text-center" width="20%">
                                     <a href="{{ route('edit.subcategory', $subcat->id) }}" class="btn btn-info" title="Edit Category"><i class="fa fa-pencil"></i></a>
                                     <a href="{{ route('delete.subcategory', $subcat->id) }}" class="btn btn-danger" title="Delete Category" id="delete"><i class="fa fa-trash"></i></a>
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
                      <h3 class="box-title">Add Sub-Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <form action="{{ route('store.subcategory', $subcat->id) }}" method="post">
                        @csrf
                    <div class="box-body">
                         <div class="form-group">
                            <select class="form-control select2" name="category_id" style="width: 100%;">
                                <option selected disabled value="">- Select Category -</option>
                                @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->category_name_en }}</option>
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
                            <input type="text" class="form-control" name="subcategory_name_en">
                            @error('subcategory_name_en')
                            <span class="text-danger">
                                 {{ $message }}
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="info-title">Sub-Category Name Hin <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="subcategory_name_hin">
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
        {{-- <div class="row">
            <div class="col-4">
                <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title">Add Sub-Sub-Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <form action="" method="post">
                        @csrf
                    <div class="box-body">
                         <div class="form-group">
                            <select class="form-control select2" name="category_id" style="width: 100%;">
                                <option selected disabled value="">    ----------- Select Sub-Category ----------</option>
                                @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" disabled style="background-color: darkblue">{{ $cat->category_name_en }}</option>
                                    @foreach ($cat->subcategories as $subcateg)
                                        <option value="">{{ $subcateg->subcategory_name_en }}</option>
                                    @endforeach
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
                            <input type="text" class="form-control" name="subcategory_name_en">
                            @error('subcategory_name_en')
                            <span class="text-danger">
                                 {{ $message }}
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="info-title">Sub-Category Name Hin <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="subcategory_name_hin">
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
        </div> --}}
      </section>
      <!-- /.content -->

    </div>
<!-- /.content-wrapper -->

@endsection

