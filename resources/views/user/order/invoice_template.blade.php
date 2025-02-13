<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Invoice</title>

<style type="text/css">
    * {
        font-family: DejaVu Sans, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 15px;
    }
    .authority {
        /*text-align: center;*/
        float: right
    }
    .authority h5 {
        margin-top: -10px;
        color: green;
        /*text-align: center;*/
        margin-left: 35px;
    }
    .thanks p {
        color: green;;
        font-size: 16px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }
</style>

</head>
<body>

  <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
          <!-- {{-- <img src="" alt="" width="150"/> --}} -->
          <h2 style="color: green; font-size: 26px;"><strong>EasyShop</strong></h2>
        </td>
        <td align="right">
            <pre class="font" >
               ThriftShop Head Office
               Email:support@thriftshop.com <br>
               Mob: 321032103210 <br>
               Cabuyao 4025,San Isidro:#203 <br>

            </pre>
        </td>
    </tr>

  </table>


  <table width="100%" style="background:white; padding:2px;""></table>

  <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
    <tr>
        <td>
          <p class="font" style="margin-left: 20px;">
           <strong>Name:</strong> {{ $order->name }} <br>
           <strong>Email:</strong> {{ $order->email }} <br>
           <strong>Phone:</strong> {{ $order->phone }} <br>

           <strong>Address:</strong> {{ $order->division->division_name }},{{ $order->district->district_name }}.{{ $order->state->state_name }} <br>
           <strong>Post Code:</strong> {{ $order->post_code }}
         </p>
        </td>
        <td>
          <p class="font">
            <h3><span style="color: green;">Invoice:</span> #{{ $order->invoice_no}}</h3>
            Order Date: {{ $order->order_date }} <br>
             Delivery Date: {{ $order->delivered_date }} <br>
            Payment Type : {{ $order->payment_method }} </span>
         </p>
        </td>
    </tr>
  </table>
  <br/>
<h3>Products</h3>


  <table width="100%">
    <thead style="background-color: green; color:#FFFFFF;">
      <tr class="font">
        <th>Image</th>
        <th>Product Name</th>
        <th>Size</th>
        <th>Color</th>
        <th>Code</th>
        <th>Quantity</th>
        <th>Unit Price </th>
        <th>Total </th>
      </tr>
    </thead>
    <tbody>


    @foreach($orderItem as $item)
    <tr class="font">
        <td align="center">
            <img src="{{ public_path($item->product->product_thambnail)  }}" height="60px;" width="60px;" alt="">
        </td>
        <td align="center"> {{ $item->product->product_name_en }}</td>
        <td align="center">

         @if($item->size == NULL)
                ----
         @else
                {{ $item->size }}
         @endif
        </td>
        <td align="center">{{ $item->color }}</td>
        <td align="center">{{ $item->product->product_code }}</td>
        <td align="center">{{ $item->qty }}</td>
        <td align="center">{{ money($item->price,'PHP',true) }}</td>
        <td align="center">{{ money($item->price * $item->qty,'PHP',true) }} </td>
      </tr>
    @endforeach

    </tbody>
  </table>
  <br>
  <table width="100%" style=" padding:0 10px 0 10px;">
    <tr>
        <td align="right" >
            @if ($order->pricetotal_amount !="0.00")
            <h2><span style="color: green;">Subtotal: </span>{{ money($order->pricetotal_amount,'PHP',true) }}</h2>
            <h2><span style="color: green; position: relative; right: 150px;">Discount: </span>{{ money($order->pricetotal_amount - $order->amount,'PHP',true) }}</h2>
            @else
            <h2><span style="color: green;">Subtotal: </span>{{ money($order->amount,'PHP',true) }}</h2>
            <h2><span style="color: green; position: relative; right: 150px;">Discount: </span>N/A</h2>
            @endif
            <h2><span style="color: green;">Total: </span>{{ money($order->amount,'PHP',true) }}</h2>
            {{-- <h2><span style="color: green;">Full Payment PAID</h2> --}}
        </td>
    </tr>
  </table>
  <div class="thanks mt-3">
    <p>Thanks For Buying Our Products..!!</p>
  </div>
  <div class="authority float-right mt-5">
      <p>-----------------------------------</p>
      <h5>Authority Signature:</h5>
    </div>
</body>
</html>
