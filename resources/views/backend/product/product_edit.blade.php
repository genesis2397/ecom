@extends('admin.admin_dashboard')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
     <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Edit Product </h4>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">
                <form method="post" action="{{ route('update.product',$product->id) }}">
                    @csrf
                  <div class="row">
<div class="col-12">
    <div class="row"> <!-- start 1st row  -->
        <div class="col-md-4">
            <div class="form-group">
<h5>Category Select <span class="text-danger">*</span></h5>
<div class="controls" id="cat">
   <select name="category_id" class="form-control" required>
       <option value="" disabled="">Select Category</option>
       @foreach($category as $categories)
<option value="{{ $categories->id }}" {{ $categories->id==$product->category_id ? 'selected':'' }}>{{ $categories->category_name_en }}</option>
       @endforeach
   </select>
   @error('category_id')
<span class="text-danger">{{ $message }}</span>
@enderror
</div>
    </div>

       </div>
         <!-- end col md 4 -->
        <!-- end col md 4 -->
        <div class="col-md-4">

            <div class="form-group">
                  <h5>Product Code <span class="text-danger">*</span></h5>
                  <div class="controls">
                      <input type="text" name="product_code" class="form-control" required value="{{ $product->product_code }}">
           @error('product_code')
           <span class="text-danger">{{ $message }}</span>
           @enderror
                 </div>
              </div>

                  </div> <!-- end col md 4 -->

        <div class="col-md-4">
        <div class="form-group">
        <h5>Brand Select <span class="text-danger">*</span></h5>
        <div class="controls">
            <select name="brand_id" class="form-control" required >
                <option value="" disabled="">Select Brand</option>
                @foreach($brand as $brands)
        <option value="{{ $brands->id }}"{{ $brands->id==$product->brand_id ? 'selected':'' }}>{{ $brands->brand_name_en }}</option>
                @endforeach
            </select>
            @error('brand_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>
            </div>

                           </div>

    </div> <!-- end 1st row  -->



<div class="row"> <!-- start 2nd row  -->
    <div class="col-md-4">
        <div class="form-group">
<h5>SubCategory Select <span class="text-danger">*</span></h5>
<div class="controls">
<select name="subcategory_id" class="form-control"  required>
   <option value="" disabled="">Select SubCategory</option>
   @foreach ($subcategory as $subcategories)
        <option value="{{ $subcategories->id }}" {{ $subcategories->id==$product->subcategory_id ? 'selected':'' }}>{{ $subcategories->subcategory_name_en }}</option>
   @endforeach
</select>
@error('subcategory_id')
<span class="text-danger">{{ $message }}</span>
@enderror
</div>
</div>

   </div> <!-- end col md 4 -->
   <div class="col-md-4">

    <div class="form-group">
<h5>Product Quantity <span class="text-danger">*</span></h5>
<div class="controls">
   <input type="text" name="product_qty" class="form-control" required value="{{ $product->getRawOriginal('product_qty') }}">
@error('product_qty')
<span class="text-danger">{{ $message }}</span>
@enderror
</div>
</div>

</div>
<div class="col-md-4">

    <div class="form-group">
<h5>Product Name En <span class="text-danger">*</span></h5>
<div class="controls">
   <input type="text" name="product_name_en" class="form-control" required value="{{ $product->product_name_en }}">
@error('product_name_en')
<span class="text-danger">{{ $message }}</span>
@enderror
</div>
</div>

</div>

 <!-- end col md 4 -->


 <!-- end col md 4 -->

    </div> <!-- end 2nd row  -->



<div class="row"> <!-- start 3RD row  -->
    <div class="col-md-4">

        <div class="form-group">
       <h5>SubSubCategory Select <span class="text-danger">*</span></h5>
       <div class="controls">
           <select name="subsubcategory_id" class="form-control"  required>
               <option value="" selected="" disabled="">Select SubSubCategory</option>
               @foreach ($subsubcategory as $subsubcategories)
                    <option value="{{ $subsubcategories->id }}" {{ $subsubcategories->id==$product->subsubcategory_id ? 'selected':'' }}>{{ $subsubcategories->subsubcategory_name_en }}</option>
               @endforeach
           </select>
           @error('subsubcategory_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>
            </div>

               </div> <!-- end col md 4 -->
               <div class="col-md-4">

                <div class="form-group">
            <h5>Product Selling Price <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="selling_price" class="form-control" required value="{{ $product->getRawOriginal('selling_price') }}">
     @error('selling_price')
     <span class="text-danger">{{ $message }}</span>
     @enderror
           </div>
        </div>

            </div>
            <div class="col-md-4">


                <div class="form-group">
           <h5>Product Name Hin <span class="text-danger">*</span></h5>
           <div class="controls">
               <input type="text" name="product_name_hin" class="form-control" required value="{{ $product->product_name_hin }}">
    @error('product_name_hin')
    <span class="text-danger">{{ $message }}</span>
    @enderror
             </div>
       </div>

           </div>
 <!-- end col md 4 -->
 <!-- end col md 4 -->

    </div> <!-- end 3RD row  -->






<div class="row"> <!-- start 4th row  -->
        <div class="col-md-4">

    <div class="form-group">
        <h5>Product Tags Hin <span class="text-danger">*</span></h5>
        <div class="controls">
 <input type="text" name="product_tags_hin" class="form-control" value="{{ $product->product_tags_hin }}" data-role="tagsinput" required>
 @error('product_tags_hin')
 <span class="text-danger">{{ $message }}</span>
 @enderror
          </div>
    </div>

        </div> <!-- end col md 4 -->

        <div class="col-md-4">

             <div class="form-group">
        <h5>Product Size En <span class="text-danger">*</span></h5>
        <div class="controls">
 <input type="text" name="product_size_en" class="form-control" value="{{ $product->product_size_en }}" data-role="tagsinput">
 @error('product_size_en')
 <span class="text-danger">{{ $message }}</span>
 @enderror
          </div>
    </div>

        </div> <!-- end col md 4 -->


        <div class="col-md-4">

             <div class="form-group">
        <h5>Product Size Hin <span class="text-danger">*</span></h5>
        <div class="controls">
 <input type="text" name="product_size_hin" class="form-control" value="{{ $product->product_size_hin }}" data-role="tagsinput">
 @error('product_size_hin')
 <span class="text-danger">{{ $message }}</span>
 @enderror
          </div>
    </div>

        </div> <!-- end col md 4 -->

    </div> <!-- end 4th row  -->



<div class="row"> <!-- start 5th row  -->
        <div class="col-md-4">

    <div class="form-group">
        <h5>Product Color En <span class="text-danger">*</span></h5>
        <div class="controls">
 <input type="text" name="product_color_en" class="form-control" value="{{ $product->product_color_en }}" data-role="tagsinput" required>
 @error('product_color_en')
 <span class="text-danger">{{ $message }}</span>
 @enderror
          </div>
    </div>

        </div> <!-- end col md 4 -->

        <div class="col-md-4">

             <div class="form-group">
        <h5>Product Color Hin <span class="text-danger">*</span></h5>
        <div class="controls">
 <input type="text" name="product_color_hin" class="form-control" value="{{ $product->product_color_hin }}" data-role="tagsinput" required>
 @error('product_color_hin')
 <span class="text-danger">{{ $message }}</span>
 @enderror
          </div>
    </div>

        </div> <!-- end col md 4 -->


        <div class="col-md-4">

            <div class="form-group">
       <h5>Product Tags En <span class="text-danger">*</span></h5>
       <div class="controls">
<input type="text" name="product_tags_en" class="form-control" value="{{ $product->product_tags_en }}" data-role="tagsinput" required>
@error('product_tags_en')
<span class="text-danger">{{ $message }}</span>
@enderror
         </div>
   </div>

       </div><!-- end col md 4 -->

    </div> <!-- end 5th row  -->




<div class="row"> <!-- start 6th row  -->
        <div class="col-md-4">

    <div class="form-group">
        <h5>Product Discount Price <span class="text-danger">*</span></h5>
        <div class="controls">
 <input type="text" name="discount_price" class="form-control" required value="{{ $product->getRawOriginal('discount_price') }}">
 @error('discount_price')
 <span class="text-danger">{{ $message }}</span>
 @enderror
          </div>
    </div>

        </div> <!-- end col md 4 -->

        <div class="col-md-4">




        </div> <!-- end col md 4 -->


        <div class="col-md-4">




        </div> <!-- end col md 4 -->

    </div> <!-- end 6th row  -->





<div class="row"> <!-- start 7th row  -->
        <div class="col-md-6">

    <div class="form-group">
        <h5>Short Description English <span class="text-danger">*</span></h5>
        <div class="controls">
<textarea name="short_descp_en" id="textarea" class="form-control" required placeholder="Textarea text">{{ $product->short_descp_en }}</textarea>
          </div>
    </div>

        </div> <!-- end col md 6 -->

        <div class="col-md-6">

     <div class="form-group">
        <h5>Short Description Hindi <span class="text-danger">*</span></h5>
        <div class="controls">
<textarea name="short_descp_hin" id="textarea" class="form-control" required placeholder="Textarea text">{{ $product->short_descp_hin }}</textarea>
          </div>
    </div>


        </div> <!-- end col md 6 -->

    </div> <!-- end 7th row  -->




<div class="row"> <!-- start 8th row  -->
        <div class="col-md-6">

    <div class="form-group">
        <h5>Long Description English <span class="text-danger">*</span></h5>
        <div class="controls">
<textarea id="editor1" name="long_descp_en" rows="10" cols="80">
    {!! $product->long_descp_en !!}
</textarea>
          </div>
    </div>

        </div> <!-- end col md 6 -->

        <div class="col-md-6">

     <div class="form-group">
        <h5>Long Description Hindi <span class="text-danger">*</span></h5>
        <div class="controls">
<textarea id="editor2" name="long_descp_hin" rows="10" cols="80" >
    {!! $product->long_descp_hin !!}
                    </textarea>
          </div>
    </div>


        </div> <!-- end col md 6 -->

    </div> <!-- end 8th row  -->


 <hr>



<div class="row">

<div class="col-md-6">
        <div class="form-group">

    <div class="controls">
        <fieldset>
            <input type="checkbox" id="checkbox_2" name="hot_deals" value="1" {{ $product->hot_deals==1 ? 'checked' : ''}}>
            <label for="checkbox_2">Hot Deals</label>
        </fieldset>
        <fieldset>
            <input type="checkbox" id="checkbox_3" name="featured" value="1" {{ $product->featured==1 ? 'checked' : ''}}>
            <label for="checkbox_3">Featured</label>
        </fieldset>
    </div>
</div>
</div>



<div class="col-md-6">
<div class="form-group">

    <div class="controls">
        <fieldset>
            <input type="checkbox" id="checkbox_4" name="special_offer" value="1" {{ $product->special_offer==1 ? 'checked' : ''}}>
            <label for="checkbox_4">Special Offer</label>
        </fieldset>
        <fieldset>
            <input type="checkbox" id="checkbox_5" name="special_deals" value="1" {{ $product->special_deals    ==1 ? 'checked' : ''}}>
            <label for="checkbox_5">Special Deals</label>
        </fieldset>
    </div>
        </div>
    </div>
                    </div>

                    <div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product">
                    </div>
                </form>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->

    <section class="content">
        <div class="container">
        <h4 class>Product Images </h4><br>
           <form action="{{ route('edit.photos') }}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="row">
                @foreach ($multiImg as $multi)

                    <div class="col-md-3">
                    <div class="box">
                    <div class="box-body">
                    <img src="{{ asset($multi->photo_name) }}" class="card-img-top" alt="">
                        </div>
                        <div class="box-body">
                            <a href="" class="btn btn-rounded btn-danger" title="Edit Photo"><i class="fa fa-trash"></i></a>
                        </div>
                    <div class="box-footer">
                        <input type="file" name="multi_img[{{ $multi->id }}]">
                    </div>
                    </div>
                </div>
                @endforeach
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
           </form>
        </div>
    </section>
    <section class="content">
        <div class="container">
        <h4 class>Thumbnail Image </h4><br>
           <form action="{{ route('edit.thumbnail') }}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="row">
                  <input type="hidden" name="old_thumbnail" value="{{ $product->product_thambnail }}">
                  <input type="hidden" name="prod_id" value="{{ $product->id }}">
                    <div class="col-md-3">
                    <div class="box">
                    <div class="box-body">
                    <img src="{{ asset($product->product_thambnail) }}" class="card-img-top" alt="">
                        </div>
                        <div class="box-body">
                            <a href="" class="btn btn-rounded btn-danger" title="Edit Photo"><i class="fa fa-trash"></i></a>
                        </div>
                    <div class="box-footer">
                        <input type="file" name="thumbnail_img">
                    </div>
                    </div>
                </div>

                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
           </form>
        </div>
    </section>
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
                     $('select[name="subcategory_id"]').html('<option value="" selected disabled> Select SubCategory </option>');
                     $('select[name="subsubcategory_id"]').html('<option value="" selected disabled> Select SubSubCategory </option>');
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                        });
                        if (data.length == 0)
                        {
                            $('select[name="subcategory_id"]').html('<option value="" disabled selected> (No available SubCategory) </option>');
                            $('select[name="subsubcategory_id"]').html('<option value="" disabled selected> (No available SubSubCategory) </option>');
                        }
                  }
              });
          } else {
              alert('danger');
          }
      });
      $('select[name="subcategory_id"]').on('change', function(){
          var subcategory_id = $(this).val();
          if(subcategory_id) {
              $.ajax({
                  url: "{{  url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="subsubcategory_id"]').empty();
                     $('select[name="subsubcategory_id"]').html('<option value="" selected disabled> Select SubSubCategory </option>');
                        $.each(data, function(key, value){
                            $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                        });
                        if (data.length == 0)
                        {
                            $('select[name="subsubcategory_id"]').html('<option value="" disabled selected> (No available SubSubCategory) </option>');
                        }
                  },
              });
          } else {
              alert('danger');
          }
      });

  });
  </script>

{{-- //to prevent loading when pressing the enter button --}}
<script type="text/javascript">

    $(document).ready(function() {

      $(window).keydown(function(event){

          if((event.keyCode == 13)) {

              event.preventDefault();

              return false;

          }

      });

    });

</script>

<script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>


<script>

  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data

          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });

      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });

  </script>

@endsection