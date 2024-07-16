<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AdminController extends Controller
{
      
    public function dashboard(){
        $soDonHang = Order::count();
        $soSanPham = Product::count();
        $soKhachHang = User::where('role','user')->count();
        $doanhThu = Order::where('status','success')->sum('total_money');
        $dsDH = Order::where('created_at', 'DESC')->limit(4)->get();

         return view('page.dashboard',compact(['soDonHang','soSanPham',
         'soKhachHang','doanhThu']));

      }
      public function order(){
            $orders = Order::orderBy('id', 'desc')->get();
         return view('orders.order', compact('orders'));

      }
      public function order_detail($id) {
        $order= Order::findOrFail($id);
        return view('orders.detail', compact('Order'));
    }
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }
    public function track(Order $order)
    {
        return view('orders.track', compact('order'));
    }

}
