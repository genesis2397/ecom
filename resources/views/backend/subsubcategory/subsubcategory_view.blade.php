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
                     <h3 class="box-title">Sub->SubCategories</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                               <tr class="text-center">
                                   <th>Category Name</th>
                                   <th>SubCategory Name</th>
                                   <th>Sub-SubCategory English</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($subsubcategory as $subsubcat)
                               <tr>
                                 <td class="text-center">{{ $subsubcat->category->category_name_en }}</td>
                                 <td class="text-center">{{ $subsubcat->subcategory->subcategory_name_en }}</td>
                                 <td class="text-center">{{ $subsubcat->subsubcategory_name_en }}</td>
                                 <td class="text-center" width="20%">
                                     <a href="{{ route('edit.subsubcategory', $subsubcat->id) }}" class="btn btn-info" title="Edit Category"><i class="fa fa-pencil"></i></a>
                                     <a href="{{ route('delete.subsubcategory', $subsubcat->id) }}" class="btn btn-danger" title="Delete Category" id="delete"><i class="fa fa-trash"></i></a>
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
                      <h3 class="box-title">Add Sub->SubCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <form action="{{ route('store.subsubcategory') }}" method="post">
                        @csrf
                    <div class="box-body">
                         <div class="form-group">
                            <label for="" class="info-title">Category Select <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="category_id" style="width: 100%;">
                                <option selected disabled value="">- Select Category -</option>
                                @foreach ($category as $cat)
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
                            <label for="" class="info-title">SubCategory Select <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="subcategory_id" style="width: 100%;">
                                <option selected disabled value="">- Select SubCategory -</option>

                              </select>
                             @error('subcategory_id')
                                 <span class="text-danger">
                                {{ $message }}
                                 </span>
                             @enderror
                         </div>
                         <div class="form-group">
                            <label for="" class="info-title">Sub-SubCategory Name En <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="subsubcategory_name_en">
                            @error('subsubcategory_name_en')
                            <span class="text-danger">
                                 {{ $message }}
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="info-title">Sub-SubCategory Name Hin <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="subsubcategory_name_hin">
                            @error('subsubcategory_name_hin')
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

<script type="text/javascript">
    $(document).ready(function() {
      $('select[name="category_id"]').on('change', function(){
          var category_id = $(this).val();
          if(category_id) {
              $.ajax({
                  url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });
  });
</script>

@endsection



