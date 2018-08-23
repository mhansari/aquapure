<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use App\Supplier;
use Auth;
use DB;
use Yajra\Datatables\Datatables;
class SupplierController extends Controller
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

   
    public function supplier_list()
    {


       return view('supplier_list');
    }
    public function add_filling($sales_type_id,$id=0)
    {
         $suppliers  = Supplier::where('active',1)->pluck('name','id');
        
       return view('add_filling',compact('suppliers','id' ));
    }
    public function new_supplier()
    {
       return view('add_supplier');
    }
    public function save(Request $request)
    {
        $s = new Supplier();
        {
            $s->user_id=  Auth::user()->id;
            $s->name = $request->input('name');
            $s->contact= $request->get('contact');
            $s->address= $request->get('address');
            $s->cnic= $request->get('cnic');
            $s->payment_mode= $request->get('payment_term');
            $s->rate_with_cap= $request->get('rate_with_cap');
            $s->rate_without_cap= $request->get('rate_without_cap');
            $s->active= $request->get('active')?1:0;
            $s->save();
            return Redirect::to('/supplier/list');
        }
  
    }

    public function save_filling(Request $request)
    {
        $s = new Supplier();
        {
            $s->user_id=  Auth::user()->id;
            $s->name = $request->input('name');
            $s->contact= $request->get('contact');
            $s->address= $request->get('address');
            $s->cnic= $request->get('cnic');
            $s->payment_mode= $request->get('payment_term');
            $s->rate_with_cap= $request->get('rate_with_cap');
            $s->rate_without_cap= $request->get('rate_without_cap');
            $s->active= $request->get('active')?1:0;
            $s->save();
            return Redirect::to('/supplier/list');
        }
  
    }
}
