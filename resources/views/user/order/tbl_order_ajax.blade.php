
<table class="table table-striped">
    <thead style="background-color: #1899fc">
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
    <tbody id="imp">
        @foreach ($order as $orders)
        <tr>
          <th scope="row" class="align_thead_order">{{ $orders->id }}</th>
          <td class="align_thead_order">{{ $orders->name }}</td>
          <td class="align_thead_order">{{ $orders->payment_method }}</td>
          <td class="align_thead_order">{{ $orders->currency }}</td>
          <td class="align_thead_order">{{ money($orders->amount,'PHP',true) }}</td>
          <td class="align_thead_order"><span class="text-danger"><strong>{{ $orders->invoice_no }}</strong></span></td>
          <td><span class="label label-pill label-warning tbl orders">{{ $orders->status }}  <i class="fa fa-clock-o"></i></span></td>
          <td>
              <a href="{{ route('view.orderitem',$orders->id) }}" type="submit" class="btn btn-primary">View Order  <i class="fa fa-eye"></i></a>
              <a target="_blank" href="{{ route('get.invoice',$orders->id) }}" type="submit" class="btn btn-danger" style="width: 117px; position:relative; top:5px;">   Invoice <i class="fa fa-file-pdf-o"></i></a>
          </td>
        </tr>
        @endforeach
    </tbody>
</table>

    <div class="d-flex justify-content-center" style="position: relative; top: 10px;">
        {!! $order->links() !!}
    </div>

    <div style="position: relative; top: -53px; left: 790px;">
        <p><b>Showing Results</b></p>
        <p>{!! $order->firstItem() !!} to {!! $order->lastItem() !!} out of {!! $order->total() !!}</p>
    </div>


