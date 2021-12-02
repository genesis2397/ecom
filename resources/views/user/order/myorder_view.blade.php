@extends('user.user_layout')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="body-content">
    <div class="container">
        <div class="row">
            @include('user.order.include_sidebar.sidebar_user')
            <div class="col-md-1">
            </div>
            <div class="col-md-6" style="position: relative; right:60px; top: 40px;">
                <h3><b>My Orders</b></h3>
                <div id ="tbl_order_ajax">
                    @include('user.order.tbl_order_ajax')
                </div>
            </div>
        </div>
    </div>
<br>
<br>
<br>
<br>
<br>

<script type="text/javascript">
  $(document).ready( function(){
        $(document).on('click', '.pagination a', function(event){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            getData(page);
        });
  });


  function getData(page){
                $.ajax({
                    url: "{{ route('tbl_orderAjax') }}" + "?page=" + page,
                    success:function(data){
                    $('#tbl_order_ajax').html(data);

                    }
                });
            }
</script>

@endsection
