@extends('user.user_layout')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="body-content">
    <div class="container">
        <div class="row">
             @include('user.order.include_sidebar.sidebar_user')
            <div class="col-md-1">
            </div>
            <div class="col-md-4" style="position: relative; right:60px; top: 40px; width: 37.4999985%">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3>Shipping Details</h3></div>
                        <div class="panel-body">
                                <table class="table table-striped" style="table-layout: fixed">
                                    <tbody>
                                      <tr>
                                        <td width="52%">Shipping Name :</td>
                                        <td style="word-break: break-word;"><b>{{ $order->name }}</b></td>
                                      </tr>
                                      <tr>
                                        <td>Shipping Phone :</td>
                                        <td style="word-break: break-word;"><b>{{ $order->phone }}</b></td>
                                      </tr>
                                      <tr>
                                        <td>Shipping Email :</td>
                                        <td style="word-break: break-word;"><b>{{ $order->email }}</b></td>
                                      </tr>
                                      <tr>
                                        <td>Shipping Division :</td>
                                        <td style="word-break: break-word;"><b>{{ $order->division->division_name }}</b></td>
                                      </tr>
                                      <tr>
                                        <td>Shipping District :</td>
                                        <td style="word-break: break-word;"><b>{{ $order->district->district_name }}</b></td>
                                      </tr>
                                      <tr>
                                        <td>Shipping State :</td>
                                        <td style="word-break: break-word;"><b>{{ $order->state->state_name  }}</b></td>
                                      </tr>
                                      <tr>
                                        <td>Post Code :</td>
                                        <td style="word-break: break-word;"><b>{{ $order->post_code  }}</b></td>
                                      </tr>
                                      <tr>
                                        <td>Order Date :</td>
                                        <td style="word-break: break-word;"><b>{{ $order->order_date  }}</b></td>
                                      </tr>
                                    </tbody>
                                  </table>
                        </div>
                  </div>
            </div>
            <div class="col-md-5" style="position: relative; right:60px; top: 40px; width: 37.4999985%">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3><b>Order Details</b><span class="label label-danger" style="font-size: small; position: relative; left: 55px; bottom: 5px;">Invoice: {{ $order->invoice_no }}</span></h3></div>
                    <div class="panel-body">
                        <table class="table table-striped" style="table-layout: fixed">
                            <tbody>
                              <tr>
                                <td width="52%">Name :</td>
                                <td style="word-break: break-word;"><b>{{ $order->name }}</b></td>
                              </tr>
                              <tr>
                                <td>Phone :</td>
                                <td style="word-break: break-word;"><b>{{ $order->phone }}</b></td>
                              </tr>
                              <tr>
                                <td>Payment Type :</td>
                                <td style="word-break: break-word;"><b>{{ $order->payment_method }}</b></td>
                              </tr>
                              <tr>
                                <td>Tranx ID :</td>
                                <td style="word-break: break-word;"><b>{{ $order->transaction_id }}</b></td>
                              </tr>
                              <tr>
                                <td>Invoice :</td>
                                <td style="word-break: break-word;"><b>{{ $order->invoice_no }}</b></td>
                              </tr>
                              <tr>
                                <td>Order Total :</td>
                                <td style="word-break: break-word;"><b>{{ money($order->amount, 'PHP', true)  }}</b></td>
                              </tr>
                              <tr>
                                <td>Order Status:</td>
                                <td style="word-break: break-word;"><b>{{ $order->status  }}</b></td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-9" style="position: relative; right:60px; top: 40px;">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3><b>Ordered Items</b></h3></div>
                    <div class="panel-body">
                        <table class="table">
                            <tbody>

                              <tr style="background: #e2e2e2;">
                                <td>
                                  <label for=""> Image</label>
                                </td>

                                <td>
                                  <label for=""> Product Name </label>
                                </td>

                                <td>
                                  <label for=""> Product Code</label>
                                </td>


                                <td>
                                  <label for=""> Color </label>
                                </td>

                                 <td>
                                  <label for=""> Size </label>
                                </td>

                                 <td>
                                  <label for=""> Quantity </label>
                                </td>

                                <td width="20%">
                                  <label for=""> Price </label>
                                </td>

                              </tr>


                              @foreach($orderItem as $item)
                       <tr>
                                <td>
                                  <label for=""><img src="{{ asset($item->product->product_thambnail) }}" height="50px;" width="50px;"> </label>
                                </td>

                                <td>
                                  <label for=""> {{ $item->product->product_name_en }}</label>
                                </td>


                                 <td>
                                  <label for=""> {{ $item->product->product_code }}</label>
                                </td>

                                <td>
                                  <label for=""> {{ $item->color }}</label>
                                </td>

                                <td>
                                  <label for=""> {{ $item->size }}</label>
                                </td>

                                 <td>
                                  <label for=""> {{ $item->qty }}</label>
                                </td>

                          <td>
                                  <label for="" style="word-break: break-word;">{{ money($item->price,'PHP',true) }} ({{ money($item->price * $item->qty,'PHP',true)}}) </label>
                                </td>

                              </tr>
                              @endforeach





                            </tbody>

                          </table>
                    </div>
              </div>
            </div>
        </div>
    </div>
<br>
<br>
<br>
<br>
<br>

@endsection
