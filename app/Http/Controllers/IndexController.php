<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Cat;
use App\Food;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class IndexController extends Controller
{

    public function index()
    {
        $cats = Cat::get();

        $offer1 = Food::where('offer', '1')->where('cat', $cats[0]->name)->get();
        $offer2 = Food::where('offer', '1')->where('cat', $cats[1]->name)->get();
        $offer3 = Food::where('offer', '1')->where('cat', $cats[2]->name)->get();
        $offer4 = Food::where('offer', '1')->where('cat', $cats[3]->name)->get();
        $offer5 = Food::where('offer', '1')->where('cat', $cats[4]->name)->get();
        return view('welcome', compact('offer1', 'offer2',
            'offer3', 'offer4', 'offer5', 'cats'));
    }

    public function cart_ajax(Request $request, Food $food)
    {
        if (isset($_COOKIE['cart'])) {
            $x = Cart::where('cookie', $_COOKIE['cart'])->where('food_id', $food['id'])->get();

            if (sizeof($x) == 0) {
                Cart::create([
                    'food_id' => $food['id'],
                    'cookie' => $_COOKIE['cart'],
                    'num' => $request['num'],
                ]);
            } else {
                Cart::where('cookie', $_COOKIE['cart'])->where('food_id', $food['id'])->update(['num' => $request['num']]);
            }
        } else {
            $cookie = microtime(true) . rand(1, 10000);
            setcookie('cart', $cookie, time() + 60 * 60 * 24 * 365, '/');

            Cart::create([
                'food_id' => $food['id'],
                'cookie' => $cookie,
                'num' => $request['num'],
            ]);
            $carts = 1;
            $sum = $food['price'] * $request['num'];

            return compact('carts', 'sum');
        }

        $carts = Cart::where('cookie', $_COOKIE['cart'])->get();
        $sum = 0;
        foreach ($carts as $cart) {
            $sum += $cart->food->price * $cart->num;
        }
        $carts = sizeof($carts);

        return compact('carts', 'sum');
    }


    public function cart_index()
    {

        if (isset($_COOKIE['cart'])) {
            $carts = Cart::where('cookie', $_COOKIE['cart'])->get();
            if (sizeof($carts) > 0) {
                $cats = Cat::get();
                return view('front.cart', compact('carts', 'cats'));
            } else {
                $cats = Cat::get();
                $offer1 = Food::where('offer', '1')->where('cat', $cats[0]->name)->get();
                $offer2 = Food::where('offer', '1')->where('cat', $cats[1]->name)->get();
                $offer3 = Food::where('offer', '1')->where('cat', $cats[2]->name)->get();
                $offer4 = Food::where('offer', '1')->where('cat', $cats[3]->name)->get();
                $offer5 = Food::where('offer', '1')->where('cat', $cats[4]->name)->get();
                $xx = 1;

                return view('welcome', compact('offer1', 'offer2',
                    'offer3', 'offer4', 'offer5', 'cats', 'xx'));
            }
        } else {
            $cats = Cat::get();
            $offer1 = Food::where('offer', '1')->where('cat', $cats[0]->name)->get();
            $offer2 = Food::where('offer', '1')->where('cat', $cats[1]->name)->get();
            $offer3 = Food::where('offer', '1')->where('cat', $cats[2]->name)->get();
            $offer4 = Food::where('offer', '1')->where('cat', $cats[3]->name)->get();
            $offer5 = Food::where('offer', '1')->where('cat', $cats[4]->name)->get();
            $xx = 1;

            return view('welcome', compact('offer1', 'offer2',
                'offer3', 'offer4', 'offer5', 'cats', 'xx'));
        }
    }

    public function cart(Request $request, Food $food)
    {
        Cart::where('cookie', $_COOKIE['cart'])->where('food_id', $food['id'])->update(['num' => $request['num']]);

        $carts = Cart::where('cookie', $_COOKIE['cart'])->get();
        $cats = Cat::get();

        return view('front.cart', compact('carts', 'cats'));
    }

    public function destroy_cart(Food $food)
    {
        Cart::where('food_id', $food['id'])->delete();

        return redirect(route('cart.index'));
    }


    public function ref_num(Request $request, Product $product)
    {
        Cart::where('cookie', $_COOKIE['cart'])->where('product_id', $product['id'])->update(['num' => $request['num']]);
        return redirect(route('cart.index'));
    }

    public static function search_index(Request $request)
    {
        $key = $request['search'];
        $products = Product::where('name', 'like', '%' . $key . '%')->latest()->paginate(20);
        if (sizeof($products) == 0) {
            $products = Product::where('brand', 'like', '%' . $key . '%')->latest()->paginate(20);
            if (sizeof($products) == 0) {
                $products = Product::where('cat', 'like', '%' . $key . '%')->latest()->paginate(20);
            }
        }
        return view('front.search.key', compact('products', 'key'));
    }

    public static function panel_order()
    {
//        $orders = Order::where('user_id', auth()->user()->id)->orderby('id', 'DESC')->paginate(10);
        $orders = auth()->user()->orders()->orderby('created_at', 'DESC')->paginate(10);
        if (sizeof($orders) == 0) $x = 0;
        else $x = 1;

        return view('front.panel.order', compact('orders', 'x'));
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function list(Cat $cat)
    {
        $foods = Food::where('cat', $cat->name)->paginate(15);
        $cats = Cat::get();
        return view('list', compact('foods', 'cats'));
    }

    public function test1()
    {
        return view('test');
    }

    function action()
    {
        if (isset($_POST['btnSubmit'])) {
            $uploadfile = $_FILES["uploadImage"]["tmp_name"];
            $folderPath = "test/";

            if (!is_writable($folderPath) || !is_dir($folderPath)) {
                echo "error";
                exit();
            }
            if (move_uploaded_file($_FILES["uploadImage"]["tmp_name"], $folderPath . $_FILES["uploadImage"]["name"])) {
                echo '<img src="' . $folderPath . "" . $_FILES["uploadImage"]["name"] . '">';
                exit();
            }
        }
    }

    public function test()
    {

        return view('vuetest');

    }

}
