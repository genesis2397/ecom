@extends('admin.admin_dashboard')
@section('content')


<div class="container-full">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-12">

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
                                 <th>Product Photo</th>
                                 <th>Product Name</th>
                                 <th>Quantity</th>
                                 <th>Selling Price</th>
                                 <th>Discount</th>
                                 <th>Product Status</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>

                             @foreach ($products as $product)
                             <tr>
                               <td class="text-center"><img src= "{{ asset($product->product_thambnail) }}" style="width:70px; height:70px;"alt=""></td>
                               <td class="text-center">{{ $product->product_name_en }}</td>
                               <td class="text-center">{{ $product->product_qty }}</td>

                               <td class="text-center">{{ money($product->selling_price,'PHP',true) }}</td>
                               @if ($product->getRawOriginal('discount_price')==0||$product->getRawOriginal('discount_price')==null)
                                    <td class="text-center"><span class="badge badge-danger">No Discount</span></td>
                               @else
                                    @php
                                        $amt = $product->selling_price - $product->getRawOriginal('discount_price');
                                        $discount = ($amt/$product->selling_price)*100;
                                    @endphp
                                    <td class="text-center">{{ round($discount, 2) }}%</td>
                               @endif
                               @if ($product->status == 1)
                                    <td class="text-center"><span class="badge badge-pill badge-success">Active</span></td>
                               @else
                                    <td class="text-center"><span class="badge badge-pill badge-dark">Inactive</span></td>
                               @endif
                               <td class="text-center" width="25%">
                                <a href="" class="btn btn-primary" title="View Peoduct"><i class="fa fa-eye"></i></a>
                                   <a href="{{ route('edit.product',$product->id) }}" class="btn btn-info" title="Edit Category" id="edit"><i class="fa fa-pencil"></i></a>
                                   <a href="{{ route('delete.product',$product->id) }}" class="btn btn-danger" title="Delete Category" id="delete"><i class="fa fa-trash"></i></a>
                                   @if ($product->status == 1)
                                        <a href="{{ route('status.productActive',$product->id) }}" class="btn btn-success" title="Product Status" id="status"><i class="fa fa-arrow-up"></i></a>
                                   @else
                                        <a href="{{ route('status.productInactive',$product->id) }}" class="btn btn-dark" title="Product Status" id="status"><i class="fa fa-arrow-down"></i></a>
                                   @endif
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
          </div>
    </section>
    <!-- /.content -->

  </div>

@endsection
