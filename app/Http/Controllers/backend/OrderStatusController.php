<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;

class OrderStatusController extends Controller
{
    public function viewPending(){
        $order = Order::whereStatus('Pending')->latest()->get();
        return view('backend.order.pending.view_pending',compact('order'));
    }

    public function DetailsPending($id){
        $order = Order::whereId($id)->whereStatus('Pending')->first();
        return view('backend.order.pending.details_pending',compact('order'));
    }

    public function UpdatePending($id){
        $order = Order::whereId($id)->whereStatus('Pending')->update(['status' => 'Confirmed']);
        $notification = array(
            'message' => 'Order has been changed to Confirmed Status.',
            'alert-type' => 'success'
        );
        return redirect()->route('view.pending')->with($notification);
    }

    public function viewProcessing(){
        $order = Order::whereStatus('Processed')->latest()->get();
        return view('backend.order.processing.view_processing',compact('order'));
    }

    public function DetailsProcessing($id){
        $order = Order::whereId($id)->whereStatus('Processed')->first();
        return view('backend.order.processing.details_processing',compact('order'));
    }

    public function UpdateProcessed($id){
        $order = Order::whereId($id)->whereStatus('Processed')->update(['status' => 'Picked']);
        $notification = array(
            'message' => 'Order has been changed to Picked Status.',
            'alert-type' => 'success'
        );
        return redirect()->route('view.processing')->with($notification);
    }

    public function viewConfirmed(){
        $order = Order::whereStatus('Confirmed')->latest()->get();
        return view('backend.order.confirmed.view_confirmed',compact('order'));
    }

    public function DetailsConfirmed($id){
        $order = Order::whereId($id)->whereStatus('Confirmed')->first();
        return view('backend.order.confirmed.details_confirmed',compact('order'));
    }

    public function UpdateConfirmed($id){
        $order = Order::whereId($id)->whereStatus('Confirmed')->update(['status' => 'Processed']);
        $notification = array(
            'message' => 'Order has been changed to Processed Status.',
            'alert-type' => 'success'
        );
        return redirect()->route('view.confirmed')->with($notification);
    }

    public function viewPicked(){
        $order = Order::whereStatus('Picked')->latest()->get();
        return view('backend.order.picked.view_picked', compact('order'));
    }

    public function DetailsPicked($id){
        $order = Order::whereId($id)->whereStatus('Picked')->first();
        return view('backend.order.picked.details_picked',compact('order'));
    }

    public function UpdatePicked($id){
        $order = Order::whereId($id)->whereStatus('Picked')->update(['status' => 'Shipped']);
        $notification = array(
            'message' => 'Order has been changed to Shipped Status.',
            'alert-type' => 'success'
        );
        return redirect()->route('view.picked')->with($notification);
    }

    public function viewShipped(){
        $order = Order::whereStatus('Shipped')->latest()->get();
        return view('backend.order.shipped.view_shipped', compact('order'));
    }

    public function DetailsShipped($id){
        $order = Order::whereId($id)->whereStatus('Shipped')->first();
        return view('backend.order.shipped.details_shipped',compact('order'));
    }

    public function UpdateShipped($id){
        $order = Order::whereId($id)->whereStatus('Shipped')->update(['status' => 'Delivered']);
        $notification = array(
            'message' => 'Order has been changed to On-delivery Status.',
            'alert-type' => 'success'
        );
        return redirect()->route('view.shipped')->with($notification);
    }

    public function viewDelivered(){
        $order = Order::whereStatus('Delivered')->latest()->get();
        return view('backend.order.delivered.view_delivered', compact('order'));
    }

    public function DetailsDelivered($id){
        $order = Order::whereId($id)->whereStatus('Delivered')->first();
        return view('backend.order.delivered.details_delivered',compact('order'));
    }

    public function viewCanceled(){
        return view('backend.order.canceled.view_canceled');
    }
}
