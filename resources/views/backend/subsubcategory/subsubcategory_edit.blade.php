@extends('admin.admin_dashboard')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
           <div class="row">
               <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title">Edit Sub->SubCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <form action="{{ route('update.subsubcategory',$subsubcat->id) }}" method="post">
                        @csrf
                    <div class="box-body">
                          <div class="form-group">
                            <label for="" class="info-title">Select Category <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="category_id" style="width: 100%;">
                                <option disabled value="">- Select Category -</option>
                                @foreach ($cat as $categories)
                                    <option value="{{ $categories->id }}" {{ $categories->id==$subsubcat->category_id ? 'selected':'' }}>{{ $categories->category_name_en }}</option>
                                @endforeach
                              </select>
                             @error('category_id')
                                 <span class="text-danger">
                                {{ $message }}
                                 </span>
                             @enderror
                          </div>

                          <div class="form-group">
                            <label for="" class="info-title">Select SubCategory <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="subcategory_id" style="width: 100%;">
                                <option disabled value="">- Select Category -</option>
                                @foreach ($subcat as $subcategories)
                                    <option value="{{ $subcategories->id }}" {{ $subcategories->id==$subsubcat->subcategory_id ? 'selected':'' }}>{{ $subcategories->subcategory_name_en }}</option>
                                @endforeach
                              </select>
                             @error('subcategory_id')
                                 <span class="text-danger">
                                {{ $message }}
                                 </span>
                             @enderror
                          </div>
                          <div class="form-group">
                            <label for="" class="info-title">Sub-SubCategory Name En <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="subsubcategory_name_en" value="{{ $subsubcat->subsubcategory_name_en }}">
                            @error('subsubcategory_name_en')
                            <span class="text-danger">
                                 {{ $message }}
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="info-title">Sub-SubCategory Name Hin <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="subsubcategory_name_hin" value="{{ $subsubcat->subsubcategory_name_hin }}">
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
           </div>
      </section>
      <!-- /.content -->

    </div>
</div>

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
<!-- /.content-wrapper -->

@endsection



