<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use App\Counter_Sales;
use Auth;
use DB;
use Yajra\Datatables\Datatables;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function record_counter_sale($id=0)
    {
        $sizes = \App\Sizes::pluck('size', 'id');
        $rate = \App\Sizes::where('id', '=',$id)->get();
        return view('record_counter_sale',compact('sizes'))->with('rate',$rate);
    }
    public function record_counter_sale_list()
    {
       return view('counter_sale_list');
    }
    public function record_counter_sale_list_data()
    {
         DB::statement(DB::raw('set @rownum=0'));

         $sales = DB::table('counter_sales')
            ->join('sizes', 'sizes.id', '=', 'counter_sales.size_id')
            ->select(DB::raw('@rownum := 0 r'))
            ->select(DB::raw('@rownum := @rownum + 1 AS sno'),'sizes.size', 'counter_sales.*');


    
        return Datatables::of($sales)->make(true);
    }
    public function record_counter_sale_save(Request $request)
    {
        $cs = new Counter_Sales();
        {
            $cs->user_id=  Auth::user()->id;
            $cs->sales_date = date("Y-m-d",strtotime($request->input('datepicker')));
            $cs->qty= $request->get('qty');
  $cs->size_id= $request->get('size');
  $cs->rate= $request->get('rate');
  $cs->total= $request->get('total');
$cs->save();
            return Redirect::to('/record-counter-sale/list');
        }
  
    }
}
