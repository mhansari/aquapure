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
class CustomerController extends Controller
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
        return view('supplier-list');
    }

   
    public function customer_list()
    {


       return view('supplier_list');
    }
    public function add_filling($sales_type_id,$id=0)
    {
         $suppliers  = Supplier::where('active',1)->pluck('name','id');
        
       return view('add_filling',compact('suppliers','id' ));
    }
    public function new_customer()
    {
        $days = array('Mon'=>'Mon','Tue'=>'Tue','Wed'=>'Wed','Thu'=>'Thu','Fri'=>'Fri','Sat'=>'Sat','Sun'=>'Sun');
        $time = array(
                    '0000' => '0000',
                    '0100' => '0100',
                    '0200' => '0200',
                    '0300' => '0300',
                    '0400' => '0400',
                    '0500' => '0500',
                    '0600' => '0600',
                    '0700' => '0700',
                    '0800' => '0800',
                    '0900' => '0900',
                    '1000' => '1000',
                    '1100' => '1100',
                    '1200' => '1200',
                    '1300' => '1300',
                    '1400' => '1400',
                    '1500' => '1500',
                    '1600' => '1600',
                    '1700' => '1700',
                    '1800' => '1800',
                    '1900' => '1900',
                    '2000' => '2000',
                    '2100' => '2100',
                    '2200' => '2200',
                    '2300' => '2300'
                );
        $area = Area::pluck('name','id');
        return view('add_customer',compact('days','time','area'));
    }
    public function save(Request $request)
    {
        $c = new Customer();
        {
            $c->user_id=  Auth::user()->id;
            $c->customer_name = $request->input('name');   
            $c->company  = $request->input('company');
            $c->mobile_number = $request->input('contact1');
            $c->mobile_number_2 = $request->input('contact2'); 
            $c->mobile_number_3 = $request->input('contact3'); 
            $c->rate = $request->input('rate');    
            $c->address = $request->input('address'); 
            $c->area = $request->input('area'); 
            $c->block = $request->input('block'); 
            $c->near_by = $request->input('near_by'); 
            $c->symbol = $request->input('symbol');  
            $c->referred_by = $request->input('refered_by');
            $c->active= $request->get('active')?1:0;
            $c->time_slot = $request->input('time_s');
            if($request->input('time_s') == 1)
            {
                $c->time_slot_1 = $request->input('time_before');
            }
            else if($request->input('time_s') == 2)
            {
                $c->time_slot_1 = $request->input('time_after');
            }
            else
            {
                $c->time_slot_1 = $request->input('time_slot_1');
                $c->time_slot_2 = $request->input('time_slot_2');
            }
           // ECHO $request->input('time_slot_1');
            $c->note = $request->input('note');
            $c->save();
            $pk = $c->id;
            $dd = DeliveryDays::where('customer_id',$pk)->delete();
            $days = $request->input('delivery_days');
            foreach($days as $d)
            {
                $dd = new DeliveryDays();
                $dd->day = $d;
                $dd->customer_id = $pk;
                $dd->save();
            }
            $sale = new Sale();
            $sale->sale_type_id = 2;
            $sale->user_id  = $c->user_id;
            $sale->supplier_customer_id = $pk;
            $sale->sales_date  = date('Y-m-d H:i:s');
            $sale->qty = $request->input('advance_btl');
            $sale->price =  $request->input('advance'); 
            $sale->total  = $request->input('advance'); 
            $sale->title   = 'Advance Amount';
            $sale->description = 'Rs: ' . $request->input('advance') . ' received as a advance of ' . $request->input('advance_btl') . ' Bottle(s)';
            $sale->balance = 0;
            $sale->is_advance = 1;
            $sale->save();
            return Redirect::to('/customer/list');
        }
  
    }

}
