<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use App\Customer;
use App\DeliveryDays;
use App\Sale;
use App\Area;
use Auth;
use DB;
use Yajra\Datatables\Datatables;
class DeliveryScheduleController extends Controller
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
        return view('schedule-list');
    }

   
    public function schedule_list()
    {
       index();
    }
    
    public function new_schedule()
    {
        $area = Area::pluck('name','id');
        return view('new_schedule',compact('area'));
    }

    public function filter(Request $request)
    {
        $customers = Customer::Keywords($request->input('keywords'))
                            ->area($request->input('area'))
                            ->block($request->input('block'))
                            ->orderBy('created_at')->get();
      //  print_r($customers);
       $area = Area::pluck('name','id');
       return view('new_schedule',compact('area','customers'));
    }

}
