<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Cat;
use App\Http\Requests\StoreBlogPost;
use App\Order;
use Hekmatinasser\Verta\Facades\Verta;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Validator;
use SoapClient;

class OrderController extends Controller
{
    public function data()
    {
        $cats = Cat::get();
        return view('front.order.data', compact('cats'));
    }

    public function payment(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'mobile' =>  'required|max:255',
            'address' =>  'required|string|max:800',
        ]);

//        $this->validate($request, [
//            'mobile' => 'required|email',
//        ])->sometimes('name', 'required|max:500', function($input) {
//            return $input->mobile >= 100;
//        });

        $factor_id = rand(10000, 99999);
        session()->put('name', $request['name']);
        session()->put('mobile', $request['mobile']);
        session()->put('address', $request['address']);
        session()->put('lat', $request['lat']);
        session()->put('lon', $request['lon']);
        session()->put('factor_id', $factor_id);

        $cats = Cat::get();
        return view('front.order.payment', compact('cats'));
    }

    public function finish(Request $request)
    {
        if ($request['payment'] == 'در محل') {

            if (is_string(session()->get('name'))) {
                $order = Order::create([
                    'name' => session()->get('name'),
                    'mobile' => session()->get('mobile'),
                    'lat' => session()->get('lat'),
                    'lon' => session()->get('lon'),
                    'address' => session()->get('address'),
                    'amount' => session()->get('amount'),
                    'payment' => $request['payment'],
                    'status' => 1,
                    'factor_id' => session()->get('factor_id'),
                    'month' => intval(Verta::instance(date("Y-m-d", time() + 12600))->format('n')),
                ]);

                $carts = Cart::where('cookie', $_COOKIE['cart'])->get();
                foreach ($carts as $cart) {
                    $order->order_pro()->create([
                        'food_id' => $cart->food->id,
                        'num' => $cart->num,
                    ]);
                }
                $cats = Cat::get();

                return view('front.order.finish', compact('carts', 'cats'));
            }
        } else {

            $MerchantID = 'a7db88a2-c655-11e8-9ab7-000c295eb8fc';
            $Amount = session()->get('amount');
            $Description = 'نام شرکت';
            $CallbackURL = url("online");
            $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

            $result = $client->PaymentRequest([
                'MerchantID' => $MerchantID,
                'Amount' => $Amount,
                'Description' => $Description,
                'CallbackURL' => $CallbackURL,
            ]);
            session()->put('authority', $result->Authority);
            //Redirect to URL You can do it also by creating a form
            if ($result->Status == 100) {
                header('Location: https://www.zarinpal.com/pg/StartPay/' . $result->Authority);
            } else {
                echo 'ERR: ' . $result->Status;
            }
        }
    }

    public function finish_online()
    {
        $order = Order::create([
            'name' => session()->get('name'),
            'mobile' => session()->get('mobile'),
            'lat' => session()->get('lat'),
            'lon' => session()->get('lon'),
            'address' => session()->get('address'),
            'amount' => session()->get('amount'),
            'status' => 1,
            'factor_id' => session()->get('factor_id'),
            'refid' => session()->get('refid'),
            'authority' => session()->get('authority'),
            'payment' => 'اینترنتی',
            'month' => intval(Verta::instance(date("Y-m-d", time() + 12600))->format('n')),
        ]);

        $carts = Cart::where('cookie', $_COOKIE['cart'])->get();
        foreach ($carts as $cart) {
            $order->order_pro()->create([
                'food_id' => $cart->product->id,
                'num' => $cart->num,
            ]);
        }
        return view('front.order.finish', compact('carts'));
    }

    public function online()
    {
        return view('front.order.online');
    }

    public function factor()
    {
        $order = Order::where('factor_id', session()->get('factor_id'))->latest()->first();

        return view('front.order.factor', compact('order'));
    }

    public function admin_list(Request $request)
    {

        $orders = Order::search($request->all());
        if (sizeof($orders) == 0) $x = 0;
        else $x = 1;

        return view('admin.orders.index', compact('orders', 'x'));
    }

    public function admin_factor(Order $o)
    {
        Order::where('id', $o['id'])->update(['read' => 1]);
        $order = Order::where('id', $o['id'])->first();

        return view('front.order.factor', compact('order'));
    }

    public function map(Order $o)
    {
        return view('admin.map', compact('o'));
    }

    public function destroy(Order $o)
    {
        $o->delete();

        return redirect()->back();
    }

    public function status(Request $request, Order $order)
    {
        Order::where('id', $order['id'])->update(['status' => $request['status']]);
        return redirect()->back();
    }

    public function follow(Request $request)
    {
        $orders = Order::orderby('created_at', 'DESC');
        $order = $orders->where('factor_id', $request['search'])->first();
        if (isset($order)) {
            if ($order->status == 0) {
                $status = "<span style='color: red' class=\"d-flex justify-content-center\" id=\"aaa\">متاسفانه سفارش شما لغو شد.</span>";
            }
            if ($order->status == 1) {
                $status = "<span class=\"d-flex justify-content-center\" id=\"aaa\" style='color:#2869ce'>سفارش شما در صف انتظار می باشد.</span>";

            }
            if ($order->status == 2) {
                $status = "<span class=\"d-flex justify-content-center\" id=\"aaa\" style='color: green'>سفارش شما تایید و آماده ارسال می باشد.</span>";

            }
            if ($order->status == 3) {
                $status = "<span class=\"d-flex justify-content-center\" id=\"aaa\" style='color: green'>سفارش شما ارسال شد.</span>";
            }
        } else {
            $status = "<span class=\"d-flex justify-content-center\" id=\"aaa\" style='color: darkorange'>سفارشی با این شماره وجود ندارد.</span>";
        }

        return compact('status');
    }


}
