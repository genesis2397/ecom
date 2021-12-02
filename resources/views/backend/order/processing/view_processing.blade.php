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
                   <h3 class="box-title">Processing Orders</h3>
                 </div>
                 <!-- /.box-header -->
                 <div class="box-body">
                     <div class="table-responsive">
                       <table id="example1" class="table table-bordered table-striped">
                         <thead>
                            <tr>
                                <th scope="col" class="align_thead_order">#</th>
                                <th scope="col" class="align_thead_order">Name</th>
                                <th scope="col" class="align_thead_order">Payment Method</th>
                                <th scope="col" class="align_thead_order">Currency</th>
                                <th scope="col" class="align_thead_order">Amount</th>
                                <th scope="col" class="align_thead_order">Invoice No.</th>
                                <th scope="col" class="align_thead_order">Status</th>
                                <th scope="col" class="align_thead_order">Action</th>
                            </tr>
                         </thead>
                         <tbody>
                            @foreach ($order as $orders)
                                <tr>
                                    <td>{{ $orders->id }}</td>
                                    <td>{{ $orders->name }}</td>
                                    <td>{{ $orders->payment_method }}</td>
                                    <td>{{ $orders->currency }}</td>
                                    <td>{{ money($orders->amount,'PHP',true) }}</td>
                                    <td>{{ $orders->invoice_no }}</td>
                                    <td><span class="label label-success" style="border-radius: 15px;">On-Process <i class="fa fa-spinner"></i></span></td>
                                    <td>
                                        <a class="btn btn-primary" title="View Confirmed Order" href="{{ route('details.processed',$orders->id) }}"><i class="fa fa-eye"></i></a>
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
