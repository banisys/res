<?php

namespace App\Http\Controllers\Admin;

use App\Absent;
use App\Delay;
use App\Overtime;
use App\Personel;
use App\Receive;
use App\Task;
use App\Vacation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PersonelController extends AdminController
{
    public function index(Request $request)
    {
        $personels = Personel::search($request->all());
        if (sizeof($personels) == 0) $x = 0;
        else $x = 1;

        return view('admin.personel.index', compact('personels', 'x'));
    }

    public function create()
    {
        $tasks = Task::get();
        return view('admin.personel.create', compact('tasks'));
    }

    public function store(Request $request)
    {

        if (isset($request['image'])) {
            $img = $this->personel_uploader($request['image']);
        } else {
            $img = null;
        }
        if (isset($request['scan'])) {
            $scan = $this->scan_uploader($request['scan']);
        } else {
            $scan = null;
        }

        Personel::create([
            'task' => $request['task'],
            'name' => $request['name'],
            'dad' => $request['dad'],
            'meli' => $request['meli'],
            'cel' => $request['cel'],
            'tel' => $request['tel'],
            'address' => $request['address'],
            'supporter_name' => $request['supporter_name'],
            'supporter_tel' => $request['supporter_tel'],
            'image' => $img,
            'scan' => $scan,
        ]);

        return redirect(route('personel.index'));
    }

    public function edit(Personel $personel)
    {
        $tasks = Task::get();
        return view('admin.personel.edit', compact('personel','tasks'));
    }

    public function update(Request $request, Personel $personel)
    {

        $data = $request->all();
        $personel->update($data);
//        dd("ssss");

        return Redirect::back();
    }

    public function destroy(Personel $personel)
    {
        $personel->delete();

        return Redirect::back();
    }


    public function destroy_image(Personel $image)
    {
        $string_1 = $image['image'];
        $string_2 = substr($string_1, 1);
        unlink($string_2);

        $image->image = null;
        $image->save();
        return redirect(url()->previous() . '#ttt');
    }

    public function store_image(Request $request, Personel $image)
    {

        if (isset($request['image'])) {
            $img = $this->personel_uploader($request['image']);
        } else {
            $img = null;
        }

        $image->image = $img;
        $image->save();
        return redirect(url()->previous() . '#ttt');

    }


    public function destroy_scan(Personel $scan)
    {
        $string_1 = $scan['scan'];
        $string_2 = substr($string_1, 1);
        unlink($string_2);

        $scan->scan = null;
        $scan->save();
        return redirect(url()->previous() . '#ttt');
    }

    public function store_scan(Request $request, Personel $scan)
    {

        if (isset($request['scan'])) {
            $img = $this->scan_uploader($request['scan']);
        } else {
            $img = null;
        }

        $scan->scan = $img;
        $scan->save();
        return redirect(url()->previous() . '#ttt');

    }


    public function create_task()
    {
        $tasks = Task::get();
        return view('admin.personel.task',compact('tasks'));
    }

    public function store_task(Request $request)
    {
        task::create([
            'name' => $request['name'],
        ]);

        return Redirect::back();
    }

    public function destroy_task(Task $task)
    {
        $task->delete();

        return Redirect::back();
    }


    public function create_receive(Request $request ,Personel $personel)
    {
        $receives = Receive::search($request->all() ,$personel);
        if (sizeof($receives) == 0) $x = 0;
        else $x = 1;


        return view('admin.personel.receive',compact('personel','receives','x'));
    }

    public function store_receive(Request $request ,Personel $personel)
    {
        $month=explode("/",$request['date']);
        Receive::create([
            'personel_id' => $personel['id'],
            'amount' => $request['amount'],
            'month' => intval($month[1]),
            'date' => $request['date'],
        ]);

        return Redirect::back();
    }

    public function destroy_receive(Receive $receive)
    {
        $receive->delete();

        return Redirect::back();
    }

    public function statistics_chart_receive(Personel $personel)
    {

        $far = Receive::where('month', 1)->where('personel_id', $personel->id)->get();
        $farvardin=0;
        foreach ($far as $f){
            $farvardin=+$farvardin+$f->amount;
        }

        $ord = Receive::where('month', 2)->where('personel_id', $personel->id)->get();
        $ordibehesht=0;
        foreach ($ord as $o){
            $ordibehesht=+$ordibehesht+$o->amount;
        }

        $kho = Receive::where('month', 3)->where('personel_id', $personel->id)->get();
        $khordad=0;
        foreach ($kho as $k){
            $khordad=+$khordad+$k->amount;
        }

        $ti = Receive::where('month', 4)->where('personel_id', $personel->id)->get();
        $tir=0;
        foreach ($ti as $t){
            $tir=+$tir+$t->amount;
        }

        $mor = Receive::where('month', 5)->where('personel_id', $personel->id)->get();
        $mordad=0;
        foreach ($mor as $m){
            $mordad=+$mordad+$m->amount;
        }

        $sha = Receive::where('month', 6)->where('personel_id', $personel->id)->get();
        $shahrivar=0;
        foreach ($sha as $sh){
            $shahrivar=+$shahrivar+$sh->amount;
        }

        $meh = Receive::where('month', 7)->where('personel_id', $personel->id)->get();
        $mehr=0;
        foreach ($meh as $me){
            $mehr=+$mehr+$me->amount;
        }

        $aba = Receive::where('month', 8)->where('personel_id', $personel->id)->get();
        $aban=0;
        foreach ($aba as $a){
         $aban=+$aban+$a->amount;
        }

        $aza = Receive::where('month', 9)->where('personel_id', $personel->id)->get();
        $azar=0;
        foreach ($aza as $az){
            $azar=+$azar+$az->amount;
        }

        $de = Receive::where('month', 10)->where('personel_id', $personel->id)->get();
        $dey=0;
        foreach ($de as $d){
            $dey=+$dey+$d->amount;
        }

        $bah = Receive::where('month', 11)->where('personel_id', $personel->id)->get();
        $bahman=0;
        foreach ($bah as $b){
            $bahman=+$bahman+$b->amount;
        }

        $esf = Receive::where('month', 12)->where('personel_id', $personel->id)->get();
        $esfand=0;
        foreach ($esf as $e){
            $esfand=+$esfand+$e->amount;
        }

        return view('admin.chart.price', compact(
            'farvardin', 'ordibehesht', 'khordad', 'tir', 'mordad'
            , 'shahrivar', 'mehr', 'aban', 'azar', 'dey', 'bahman', 'esfand'));
    }


    public function create_overtime(Request $request ,Personel $personel)
    {
        $overtimes = Overtime::search($request->all() ,$personel);
        if (sizeof($overtimes) == 0) $x = 0;
        else $x = 1;


        return view('admin.personel.overtime',compact('personel','overtimes','x'));
    }

    public function store_overtime(Request $request ,Personel $personel)
    {
        $month=explode("/",$request['date']);
        Overtime::create([
            'personel_id' => $personel['id'],
            'time' => $request['time'],
            'month' => intval($month[1]),
            'date' => $request['date'],
        ]);

        return Redirect::back();
    }

    public function destroy_overtime(Overtime $overtime)
    {
        $overtime->delete();

        return Redirect::back();
    }

    public function statistics_chart_overtime(Personel $personel)
    {

        $far = Overtime::where('month', 1)->where('personel_id', $personel->id)->get();
        $farvardin=0;
        foreach ($far as $f){
            $farvardin=+$farvardin+$f->time;
        }

        $ord = Overtime::where('month', 2)->where('personel_id', $personel->id)->get();
        $ordibehesht=0;
        foreach ($ord as $o){
            $ordibehesht=+$ordibehesht+$o->time;
        }

        $kho = Overtime::where('month', 3)->where('personel_id', $personel->id)->get();
        $khordad=0;
        foreach ($kho as $k){
            $khordad=+$khordad+$k->time;
        }

        $ti = Overtime::where('month', 4)->where('personel_id', $personel->id)->get();
        $tir=0;
        foreach ($ti as $t){
            $tir=+$tir+$t->time;
        }

        $mor = Overtime::where('month', 5)->where('personel_id', $personel->id)->get();
        $mordad=0;
        foreach ($mor as $m){
            $mordad=+$mordad+$m->time;
        }

        $sha = Overtime::where('month', 6)->where('personel_id', $personel->id)->get();
        $shahrivar=0;
        foreach ($sha as $sh){
            $shahrivar=+$shahrivar+$sh->time;
        }

        $meh = Overtime::where('month', 7)->where('personel_id', $personel->id)->get();
        $mehr=0;
        foreach ($meh as $me){
            $mehr=+$mehr+$me->time;
        }

        $aba = Overtime::where('month', 8)->where('personel_id', $personel->id)->get();
        $aban=0;
        foreach ($aba as $a){
            $aban=+$aban+$a->time;
        }

        $aza = Overtime::where('month', 9)->where('personel_id', $personel->id)->get();
        $azar=0;
        foreach ($aza as $az){
            $azar=+$azar+$az->time;
        }

        $de = Overtime::where('month', 10)->where('personel_id', $personel->id)->get();
        $dey=0;
        foreach ($de as $d){
            $dey=+$dey+$d->time;
        }

        $bah = Overtime::where('month', 11)->where('personel_id', $personel->id)->get();
        $bahman=0;
        foreach ($bah as $b){
            $bahman=+$bahman+$b->time;
        }

        $esf = Overtime::where('month', 12)->where('personel_id', $personel->id)->get();
        $esfand=0;
        foreach ($esf as $e){
            $esfand=+$esfand+$e->time;
        }

        return view('admin.chart.price', compact(
            'farvardin', 'ordibehesht', 'khordad', 'tir', 'mordad'
            , 'shahrivar', 'mehr', 'aban', 'azar', 'dey', 'bahman', 'esfand'));
    }


    public function create_delay(Request $request ,Personel $personel)
    {
        $delays = Delay::search($request->all() ,$personel);
        if (sizeof($delays) == 0) $x = 0;
        else $x = 1;


        return view('admin.personel.delay',compact('personel','delays','x'));
    }

    public function store_delay(Request $request ,Personel $personel)
    {
        $month=explode("/",$request['date']);
        Delay::create([
            'personel_id' => $personel['id'],
            'time' => $request['time'],
            'month' => intval($month[1]),
            'date' => $request['date'],
        ]);

        return Redirect::back();
    }

    public function destroy_delay(Delay $delay)
    {
        $delay->delete();

        return Redirect::back();
    }

    public function statistics_chart_delay(Personel $personel)
    {

        $far = Delay::where('month', 1)->where('personel_id', $personel->id)->get();
        $farvardin=0;
        foreach ($far as $f){
            $farvardin=+$farvardin+$f->time;
        }

        $ord = Delay::where('month', 2)->where('personel_id', $personel->id)->get();
        $ordibehesht=0;
        foreach ($ord as $o){
            $ordibehesht=+$ordibehesht+$o->time;
        }

        $kho = Delay::where('month', 3)->where('personel_id', $personel->id)->get();
        $khordad=0;
        foreach ($kho as $k){
            $khordad=+$khordad+$k->time;
        }

        $ti = Delay::where('month', 4)->where('personel_id', $personel->id)->get();
        $tir=0;
        foreach ($ti as $t){
            $tir=+$tir+$t->time;
        }

        $mor = Delay::where('month', 5)->where('personel_id', $personel->id)->get();
        $mordad=0;
        foreach ($mor as $m){
            $mordad=+$mordad+$m->time;
        }

        $sha = Delay::where('month', 6)->where('personel_id', $personel->id)->get();
        $shahrivar=0;
        foreach ($sha as $sh){
            $shahrivar=+$shahrivar+$sh->time;
        }

        $meh = Delay::where('month', 7)->where('personel_id', $personel->id)->get();
        $mehr=0;
        foreach ($meh as $me){
            $mehr=+$mehr+$me->time;
        }

        $aba = Delay::where('month', 8)->where('personel_id', $personel->id)->get();
        $aban=0;
        foreach ($aba as $a){
            $aban=+$aban+$a->time;
        }

        $aza = Delay::where('month', 9)->where('personel_id', $personel->id)->get();
        $azar=0;
        foreach ($aza as $az){
            $azar=+$azar+$az->time;
        }

        $de = Delay::where('month', 10)->where('personel_id', $personel->id)->get();
        $dey=0;
        foreach ($de as $d){
            $dey=+$dey+$d->time;
        }

        $bah = Delay::where('month', 11)->where('personel_id', $personel->id)->get();
        $bahman=0;
        foreach ($bah as $b){
            $bahman=+$bahman+$b->time;
        }

        $esf = Delay::where('month', 12)->where('personel_id', $personel->id)->get();
        $esfand=0;
        foreach ($esf as $e){
            $esfand=+$esfand+$e->time;
        }

        return view('admin.chart.price', compact(
            'farvardin', 'ordibehesht', 'khordad', 'tir', 'mordad'
            , 'shahrivar', 'mehr', 'aban', 'azar', 'dey', 'bahman', 'esfand'));
    }


    public function create_vacation(Request $request ,Personel $personel)
    {
        $vacations = Vacation::where('personel_id',$personel['id'])->orderby('id', 'DESC')->paginate(10);
        $farvardins = Vacation::where('personel_id',$personel['id'])->where('month',1)->get();
        $ordibeheshts = Vacation::where('personel_id',$personel['id'])->where('month',2)->get();
        $khordads = Vacation::where('personel_id',$personel['id'])->where('month',3)->get();
        $tirs = Vacation::where('personel_id',$personel['id'])->where('month',4)->get();
        $mordads = Vacation::where('personel_id',$personel['id'])->where('month',5)->get();
        $shahrivars = Vacation::where('personel_id',$personel['id'])->where('month',6)->get();
        $mehrs = Vacation::where('personel_id',$personel['id'])->where('month',7)->get();
        $abans = Vacation::where('personel_id',$personel['id'])->where('month',8)->get();
        $azars = Vacation::where('personel_id',$personel['id'])->where('month',9)->get();
        $deys = Vacation::where('personel_id',$personel['id'])->where('month',10)->get();
        $bahmans = Vacation::where('personel_id',$personel['id'])->where('month',11)->get();
        $esfands = Vacation::where('personel_id',$personel['id'])->where('month',12)->get();


        return view('admin.personel.vacation',compact('personel','vacations',
            'farvardins','ordibeheshts','khordads','tirs','mordads','shahrivars','mehrs',
            'abans','azars','deys','bahmans','esfands'));
    }

    public function store_vacation(Request $request ,Personel $personel)
    {
        $month=explode("/",$request['date']);
        Vacation::create([
            'personel_id' => $personel['id'],
            'day' => intval($month[2]),
            'month' => intval($month[1]),
            'date' => $request['date'],
        ]);

        return Redirect::back();
    }

    public function destroy_vacation(Vacation $vacation)
    {
        $vacation->delete();

        return Redirect::back();
    }


    public function create_absent(Request $request ,Personel $personel)
    {
        $absents = Absent::where('personel_id',$personel['id'])->orderby('id', 'DESC')->paginate(10);
        $farvardins = Absent::where('personel_id',$personel['id'])->where('month',1)->get();
        $ordibeheshts = Absent::where('personel_id',$personel['id'])->where('month',2)->get();
        $khordads = Absent::where('personel_id',$personel['id'])->where('month',3)->get();
        $tirs = Absent::where('personel_id',$personel['id'])->where('month',4)->get();
        $mordads = Absent::where('personel_id',$personel['id'])->where('month',5)->get();
        $shahrivars = Absent::where('personel_id',$personel['id'])->where('month',6)->get();
        $mehrs = Absent::where('personel_id',$personel['id'])->where('month',7)->get();
        $abans = Absent::where('personel_id',$personel['id'])->where('month',8)->get();
        $azars = Absent::where('personel_id',$personel['id'])->where('month',9)->get();
        $deys = Absent::where('personel_id',$personel['id'])->where('month',10)->get();
        $bahmans = Absent::where('personel_id',$personel['id'])->where('month',11)->get();
        $esfands = Absent::where('personel_id',$personel['id'])->where('month',12)->get();


        return view('admin.personel.absent',compact('personel','absents',
            'farvardins','ordibeheshts','khordads','tirs','mordads','shahrivars','mehrs',
            'abans','azars','deys','bahmans','esfands'));
    }

    public function store_absent(Request $request ,Personel $personel)
    {
        $month=explode("/",$request['date']);
        Absent::create([
            'personel_id' => $personel['id'],
            'day' => intval($month[2]),
            'month' => intval($month[1]),
            'date' => $request['date'],
        ]);

        return Redirect::back();
    }

    public function destroy_absent(Absent $absent)
    {
        $absent->delete();

        return Redirect::back();
    }
}
