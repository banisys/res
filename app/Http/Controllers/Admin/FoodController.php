<?php

namespace App\Http\Controllers\Admin;

use App\Cat;
use App\Food;
use App\Order;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;


class FoodController extends AdminController
{
    public function index(Request $request)
    {
        $foods = Food::search($request->all());
        if (sizeof($foods) == 0) $x = 0;
        else $x = 1;

        return view('admin.food.index', compact('foods', 'x'));
    }

    public function create()
    {
        $cats = Cat::get();
        return view('admin.food.create', compact('cats'));
    }

    public function store(Request $request)
    {


        if (isset($request['image'])) {
            $img = $this->thumbnail_uploader($request['image']);
        } else {
            $img = null;
        }
        $user_id = auth()->user()->id;
        Food::create([

            'user_id' => $user_id,
            'cat' => $request['cat'],
            'name' => $request['name'],
            'price' => $request['price'],
            'offer' => $request['offer'],
            'image' => $img,

        ]);

        return redirect(route('food.index'));
    }

    public function edit(Food $food)
    {
        $cats = Cat::get();
        return view('admin.food.edit', compact('food','cats'));
    }

    public function update(Request $request, Food $food)
    {
        if($request->offer != 1){$food->offer = null;}
        $data = $request->all();
        $food->update($data);

        return redirect(route('food.index'));
    }

    public function destroy(Food $food)
    {
        $string_1 = $food->image;
        $string_2 = substr($string_1, 1);

        unlink($string_2);
        $food->delete();

        return redirect(route('food.index'));
    }

    public function destroy_thumbnail(Food $image)
    {
        $string_1 = $image['image'];
        $string_2 = substr($string_1, 1);
        unlink($string_2);

        $image->image = null;
        $image->save();
        return redirect(url()->previous() . '#fileName');
    }

    public function store_thumbnail(Request $request, Food $image)
    {

        if (isset($request['pic'])) {
            $img = $this->thumbnail_uploader($request['pic']);
        } else {
            $img = null;
        }

        $image->image = $img;
        $image->save();
        return redirect(url()->previous() . '#pic');

    }

    public function index_cat()
    {
        $cat = Cat::get()->all();
        return view('admin.food.cat', compact('cat'));
    }

    public function store_cat(Request $request, Cat $cat)
    {
        $filename = $cat['id'].'.png';
        $img = Image::make($request['image']);
        $img->resize(128, 128);
        $img->save('uploads/cats/' . $filename);


        $cat->name=$request['name'];
        return Redirect::back();
    }

    public function statistics()
    {
        return view('admin.statistics');
    }

    public function statistics_chart_price()
    {

        $far = Order::where('month', 1)->get();
        foreach ($far as $f){
            $farvardin=+$f->amount;
        }

        $ord = Order::where('month', 2)->get();
        foreach ($ord as $o){
            $ordibehesht=+$o->amount;
        }

        $kho = Order::where('month', 3)->get();
        foreach ($kho as $k){
            $khordad=+$k->amount;
        }

        $ti = Order::where('month', 4)->get();
        foreach ($ti as $t){
            $tir=+$t->amount;
        }

        $mor = Order::where('month', 5)->get();
        foreach ($mor as $m){
            $mordad=+$m->amount;
        }

        $sha = Order::where('month', 6)->get();
        foreach ($sha as $sh){
            $shahrivar=+$sh->amount;
        }

        $meh = Order::where('month', 7)->get();
        foreach ($meh as $me){
            $mehr=+$me->amount;
        }

        $aba = Order::where('month', 8)->get();
        foreach ($aba as $a){
            $aban=+$a->amount;
        }

        $aza = Order::where('month', 9)->get();
        foreach ($aza as $az){
            $azar=+$az->amount;
        }

        $de = Order::where('month', 10)->get();
        foreach ($de as $d){
            $dey=+$d->amount;
        }

        $bah = Order::where('month', 11)->get();
        foreach ($bah as $b){
            $bahman=+$b->amount;
        }

        $esf = Order::where('month', 12)->get();
        foreach ($esf as $e){
            $esfand=+$e->amount;
        }

        return view('admin.chart.price', compact(
            'farvardin', 'ordibehesht', 'khordad', 'tir', 'mordad'
            , 'shahrivar', 'mehr', 'aban', 'azar', 'dey', 'bahman', 'esfand'));
    }
}
