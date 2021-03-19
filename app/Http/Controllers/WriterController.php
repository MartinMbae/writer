<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Source;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WriterController extends Controller
{


    public function dashboard(){

        $available_count = Order::where("status", '0')->count();
        return view('writer/dashboard', compact('available_count'));
    }

    public function available()
    {

        $orders = Order::where("status", '0')->get();
        foreach ($orders as $order) {
            $name = Source::where('id', $order->source_id)->first()->name;
            $order->source_name = $name;
        }

        return view("writer.available_orders", compact('orders'));
    }

    public function single_order($order_id)
    {
        $order = Order::find($order_id);

        $name = Source::where('id', $order->source_id)->first()->name;
        $order->source_name = $name;
        $attachments= array_filter(Storage::disk('public')->files(),
            function ($item)use ($order) {return Str::startsWith($item, $order->random_id);}
        );
        return view("writer/single_order", compact('order','attachments'));
    }

}
