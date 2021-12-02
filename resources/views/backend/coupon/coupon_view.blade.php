@extends('admin.admin_dashboard')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@php
    $minDate = Carbon\Carbon::parse(now())->format('Y-m-d');
@endphp

<div class="container-full">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-8">

              <div class="box">
                 <div class="box-header with-border">
                   <h3 class="box-title">All Products</h3>
                 </div>
                 <!-- /.box-header -->
                 <div class="box-body">
                     <div class="table-responsive">
                       <table id="example1" class="table table-bordered table-striped">
                         <thead>
                             <tr class="text-center">
                                 <th>Coupon Code</th>
                                 <th>Discount Value</th>
                                 <th>Description</th>
                                 <th>Expiry Date</th>
                                 <th>Status</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>

                             @foreach ($coupons as $coupon)
                             <tr>
                               <td class="text-center">{{ $coupon->coupon_code }}</td>
                               <td class="text-center">{{ $coupon->discount_value }}</td>
                               <td class="text-center">{{ $coupon->description }}</td>
                               <td class="text-center">{{ $coupon->expiry_date }}</td>
                               <td class="text-center">
                                @if ($coupon->status == 1)
                                    <a title="Coupon Status" id="status"><span class="badge badge-pill badge-success">Active</span></a>
                                @else
                                    <a title="Coupon Status" id="status"><span class="badge badge-pill badge-dark">Inactive</span></a>
                                @endif
                               </td>
                               <td class="text-center" width="25%">
                                   <a href="{{ route('edit.coupon',$coupon->id) }}" class="btn btn-info" title="Edit Category" id="edit"><i class="fa fa-pencil"></i></a>
                                   <a href="" class="btn btn-danger" title="Delete Category" id="delete"><i class="fa fa-trash"></i></a>
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
                <div class="box box-default">
                  <div class="box-header with-border">
                    <h4 class="box-title">Add Coupon</h4>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                      <!-- Nav tabs -->
                      <form action="{{ route('store.coupon') }}" method="post" id="form_input">
                          {{ csrf_field() }}
                      <ul class="nav nav-tabs customtab2" role="tablist">
                          <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home7" role="tab"><span class="hidden-sm-up"><i class="ion-home"></i></span> <span class="hidden-xs-down">Coupon Details</span></a> </li>
                          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile7" role="tab"><span class="hidden-sm-up"><i class="ion-person"></i></span> <span class="hidden-xs-down">Optionals</span></a> </li>
                      </ul>
                      <!-- Tab panes -->
                      <div class="tab-content">
                          <div class="tab-pane active" id="home7" role="tabpanel">

                                <div class="box-body" style="position: relative; right: 18px;">
                                    <div class="form-group">
                                        <label for="" class="info-title">Coupon Code <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="coupon_code">
                                    </div>
                                    <div class="form-group">
                                       <label for="" class="info-title">Coupon Type <span class="text-danger">*</span></label>
                                       <input type="text" class="form-control" name="discount_type">
                                   </div>
                                   <div class="form-group">
                                       <label for="" class="info-title">Coupon Value <span class="text-danger">*</span></label>
                                       <input type="text" class="form-control" name="discount_value">
                                   </div>
                                   <div class="form-group">
                                    <label for="" class="info-title">Expiry Date <span class="text-danger">*</span></label>
                                    <input type="date" data-date-format='yy-mm-dd' class="form-control" name="expiry_date" min="{{ $minDate }}" required>
                                   </div>
                                   <div class="form-group">
                                    <label for="" class="info-title">Coupon Description <span class="text-danger"></span></label>
                                    <textarea name="description" class="form-control" placeholder="Enter Description here. (Optional)"></textarea>
                                   </div>
                               </div>

                          </div>
                          <div class="tab-pane" id="profile7" role="tabpanel">
                                <div class="box-body" style="position: relative; right: 18px;">
                                    <div class="form-group">
                                        <label for="" class="info-title">Coupon Max. Usage per User <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="max_usage">
                                    </div>
                                    <div class="form-group">
                                    <label for="" class="info-title">Min. Amount <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="min_amount">
                                </div>
                                <div class="form-group">
                                    <label for="" class="info-title">For Specific Product <span class="text-danger"></span></label>
                                    <div class="controls">
                                        <select name="product_id[]" class="js-example-responsive" multiple="multiple">
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->product_name_en }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                </div>
                          </div>
                      </div>
                      <div class="form-group">
                        <input type="submit" class="btn btn-primary">
                    </div>
                    </form>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
          </div>
    </section>
    <!-- /.content -->

  </div>

<script type="text/javascript">

$(window).ready(function() {
        $("#form_input").on("keypress", function (event) {
            var keyPressed = event.keyCode || event.which;
            if (keyPressed === 13 && ($(event.target)[0]!=$("textarea")[0])) {
                event.preventDefault();
            }
        });
        });

$('document').ready( function(){
    $('.js-example-responsive').select2({
        placeholder: 'You can choose a product',
        tags: true,
        width: '112%',
        createTag: function (params) {
        // Don't offset to create a tag if there is no @ symbol
            if (params.term.indexOf('@') === -1)
            {
        // Return null to disable tag creation
                return null;
            }

            return {

                    }
        }
    });
});


</script>


@endsection
