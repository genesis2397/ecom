@extends('admin.admin_dashboard')
@section('content')


  <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->


<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Order Details</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Order Details</li>

							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>



		<!-- Main content -->
		<section class="content">
		  <div class="row">


<div class="col-md-6 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>Shipping Details</strong> </h4>
				  </div>


<table class="table">
            <tr>
              <th> Shipping Name : </th>
               <th> {{ $order->name }} </th>
            </tr>

             <tr>
              <th> Shipping Phone : </th>
               <th> {{ $order->phone }} </th>
            </tr>

             <tr>
              <th> Shipping Email : </th>
               <th> {{ $order->email }} </th>
            </tr>

             <tr>
              <th> Division : </th>
               <th> {{ $order->division->division_name }} </th>
            </tr>

             <tr>
              <th> District : </th>
               <th> {{ $order->district->district_name }} </th>
            </tr>

             <tr>
              <th> State : </th>
               <th>{{ $order->state->state_name }} </th>
            </tr>

            <tr>
              <th> Post Code : </th>
               <th> {{ $order->post_code }} </th>
            </tr>

            <tr>
              <th> Order Date : </th>
               <th> {{ $order->order_date }} </th>
            </tr>

           </table>



				</div>
			  </div> <!--  // cod md -6 -->


<div class="col-md-6 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>Order Details</strong><span class="text-danger"> Invoice : {{ $order->invoice_no }}</span></h4>
				  </div>


<table class="table">
            <tr>
              <th>  Name : </th>
               <th> {{ $order->user->name }} </th>
            </tr>

             <tr>
              <th>  Phone : </th>
               <th> {{ $order->user->phone }} </th>
            </tr>

             <tr>
              <th> Payment Type : </th>
               <th> {{ $order->payment_method }} </th>
            </tr>

             <tr>
              <th> Tranx ID : </th>
               <th> {{ $order->transaction_id }} </th>
            </tr>

             <tr>
              <th> Invoice  : </th>
               <th class="text-danger"> {{ $order->invoice_no }} </th>
            </tr>

            @if ($order->pricetotal_amount == "0.00")
            <tr>
                <th> Order Subtotal : </th>
                 <th>{{ money($order->amount,'PHP',true) }} </th>
              </tr>
            </tr>
            <tr>
                <th> Discounted Amount : </th>
                 <th>N/A </th>
              </tr>
            <tr>
                <th> Order Grandtotal : </th>
                 <th>{{ money($order->amount,'PHP',true) }} </th>
              </tr>
            @else
            <tr>
                <th> Order Subtotal : </th>
                 <th>{{ money($order->pricetotal_amount,'PHP',true) }} </th>
              </tr>
            </tr>
            <tr>
                <th> Discounted Amount : </th>
                 <th>- {{ money($order->pricetotal_amount - $order->amount,'PHP',true) }} </th>
              </tr>
            <tr>
            <tr>
                <th> Order Grandtotal : </th>
                 <th>{{ money($order->amount,'PHP',true) }} </th>
              </tr>
            @endif


            <tr>
              <th> Order : </th>
               <th>
                <span class="badge badge-pill badge-warning" style="background: #a8c218;">{{ $order->status }} <i class="fa fa-clock-o"></i></span> </th>
            </tr>

            <tr>
                <th> Update Status : </th>
                 <th><a href="{{ route('update.pending',$order->id) }}" class="btn btn-success" id="confirmOrder">Confirm Order</a></th>
              </tr>



           </table>



				</div>
			  </div> <!--  // cod md -6 -->





<div class="col-md-12 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">

				  </div>



 <table class="table">
            <tbody>

              <tr>
                <td width="10%">
                  <label for=""> Image</label>
                </td>

                 <td width="20%">
                  <label for=""> Product Name </label>
                </td>

             <td width="10%">
                  <label for=""> Product Code</label>
                </td>


               <td width="10%">
                  <label for=""> Color </label>
                </td>

                <td width="10%">
                  <label for=""> Size </label>
                </td>

                  <td width="10%">
                  <label for=""> Quantity </label>
                </td>

               <td width="10%">
                  <label for=""> Price </label>
                </td>

              </tr>


              @foreach($order->orderItems as $item)
       <tr>
               <td width="10%">
                  <label for=""><img src="{{ asset($item->product->product_thambnail) }}" height="50px;" width="50px;"> </label>
                </td>

               <td width="20%">
                  <label for=""> {{ $item->product->product_name_en }}</label>
                </td>


                <td width="10%">
                  <label for=""> {{ $item->product->product_code }}</label>
                </td>

               <td width="10%">
                  <label for=""> {{ $item->color }}</label>
                </td>

               <td width="10%">
                  <label for=""> {{ $item->size }}</label>
                </td>

                <td width="10%">
                  <label for=""> {{ $item->qty }}</label>
                </td>

         <td width="10%">
                  <label for=""> {{ money($item->price,'PHP',true) }}  ({{ money($item->price * $item->qty,'PHP',true)}} ) </label>
                </td>

              </tr>
              @endforeach





            </tbody>

          </table>











				</div>
			  </div>  <!--  // cod md -12 -->
















		  </div>
		  <!-- /. end row -->
		</section>
		<!-- /.content -->

	  </div>




@endsection
