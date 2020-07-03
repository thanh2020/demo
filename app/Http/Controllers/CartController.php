<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Customer;
use App\Order;
use App\OrderDetail;
use Cart;

class CartController extends Controller
{
    public function getAddCart(Request $request, $id)
    {
    	// Cart::add('293ad', 'Product 1', 1, 9.99);
    	$product = Product::where('product_name',$id);
    	$product = Product::find($id);
    	$data['id'] = $product->id;
    	$data['name'] = $product->name;
    	$data['qty'] = 1; // so luong = 1
    	$data['price'] = $product->price;
        $data['weight'] = $product->price;
    	$data['options']['image'] = $product->image;
        Cart::add($data);
        return back();
    }
    public function getShowCart()
    {
        $data = Cart::content();

        return view('shop.cart',['data' => $data]);
    }
    public function delete_cart($rowId)
    {
        Cart::update($rowId, 0);
        return back();
    }
    public function update_cart(Request $request)
    {
        $rowId = $request->rowId;
        $qty = $request->qty;
        Cart::update($rowId, $qty);
        return back();
    }
    public function checkout()
    {
        $data = Cart::content();
        return view('shop.checkout',['data' => $data]);
    }
    public function postCheckout(Request $request)
    {

        $cart = Cart::content();
        $total = Cart::priceTotal();


        $validatedData = $request->validate([
            'fullname' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        $order = new Order();
        $order->fullname = $request->input('fullname');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->address = $request->input('address');
        $order->note = $request->input('note');
        $order->total = $total;
        $order->order_status_id = 1; // 1 = mới
        // Lưu vào bảng chỉ tiết đơn đặt hàng

        if ($order->save()) {
            // Tạo mã đơn hàng gửi tới khách hàng
            $order->code = 'DH-'.$order->id.'-'.date('d').date('m').date('Y');
            $order->save();
            foreach ($cart as $product) {
                $_detail = new OrderDetail();
                $_detail->order_id = $order->id;
                $_detail->name = $product->name;
                $_detail->image = $product->options->image;
                $_detail->user_id = '';
                $_detail->product_id = $product->id;
                $_detail->qty = $product->qty;
                $_detail->price = $product->price;
                $_detail->save();
            }
            

            // $customer = new Customer;
            // $customer->name = $request->name;
            // $customer->email = $request->email;
            // $customer->phone = $request->phone;
            // $customer->address = $request->address;
            // $customer->content = $request->content;
            // $customer->save();
            Cart::destroy();

            return redirect('')->with('msg', 'Cảm ơn bạn đã đặt hàng.');
        }
    }
}
