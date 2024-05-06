<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

use App\Models\Orders;

class OrderController extends Controller
{
    public function Index()
    {
        $orders = Orders::where('status', 'Pending')->get();
        foreach ($orders as $order) {
            $product = Product::find($order->product_id);
            $order->product = $product;
        }
        return view('admin.pendingorders', compact('orders'));
    }

    public function ConfirmOrder($id)
    {
        Orders::where('id', $id)->update(['status' => 'Confirmed']);
        return redirect()->route('pendingorders')->with('message', 'Order Confirmed Successfully..!');
    }
    public function RejectOrder($id)
    {
        Orders::where('id', $id)->update(['status' => 'Rejected']);
        return redirect()->route('pendingorders')->with('message', 'Order Rejected Successfully..!');
    }

    public function CompletedOrders()
    {
        $orders = Orders::where('status', 'Confirmed')->get();
        return view('admin.confirmedorders', compact('orders'));
    }

    public function RejectedOrders()
    {
        $orders = Orders::where('status', 'Rejected')->get();
        return view('admin.rejectedorders', compact('orders'));
    }


}
