<?php

namespace App\Http\Controllers;
use App\Models\order;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;
use App\Http\Controllers\HomeController;
class OrderController extends Controller
{
    public function order() {
//         $ordert = order::where('rider',17)->Paginate(1000);
// dd($ordert);

        $merchantorder = order::where('user_id',Auth::user()->id)->Paginate(1000);
        $adminorder = order::all();
        $riderordert = order::where('rider',Auth::user()->id)->Paginate(1000);

        // merchant
        $total_order = order::where('user_id',auth::user()->id)->count();
        $pending_delivery = order::where('user_id',auth::user()->id)->where('status',0)->count();
        $complete_delivery = order::where('user_id',auth::user()->id)->where('status',5)->count();
        $Processing_delivery = order::where('user_id',auth::user()->id)->where('status',2)->count();
        $Retrun_delivery = order::where('user_id',auth::user()->id)->where('status',4)->count();
        $hold_delivery = order::where('user_id',auth::user()->id)->where('status',3)->count();

         // Rider
         $riderall = order::where('rider',Auth::user()->id)->count();
        $riderpicup = order::where('rider',Auth::user()->id)->where('status',0)->count();
        $ridercomplete = order::where('rider',Auth::user()->id)->where('status',5)->count();
        $riderout = order::where('rider',Auth::user()->id)->where('status',2)->count();
        $riderRetrun = order::where('rider',Auth::user()->id)->where('status',4)->count();
        $riderhold = order::where('rider',Auth::user()->id)->where('status',3)->count();

        // admin
        $admintotal = order::count();
        $adminpicup = order::where('status',0)->count();
        $admincomplete = order::where('status',5)->count();
        $adminout = order::where('status',2)->count();
        $adminRetrun = order::where('status',4)->count();
        $adminhold = order::where('status',3)->count();

        return view('order', compact('merchantorder','riderordert','adminorder','total_order','pending_delivery','complete_delivery','Processing_delivery','Retrun_delivery',
        'hold_delivery','riderpicup','ridercomplete','riderout','riderRetrun','riderhold','adminpicup','admincomplete','adminout','adminRetrun','adminhold','admintotal','riderall'));
    }

    // public function adminorder() {
      
    //     $adminorder = order::all();
    //     //   dd($order);
    //     return view('order', compact('order'));
    // }
    public function stororder(Request $request){
        // dd($request);
        $request->validate([
                'Recipient_Address' => 'required',
                'Recipient_Phone' => 'required|digits:11',
                'Ammount_Collect' => 'required'
            ]);
        $order  = new order;
        $order->marcent_name = $request->marcent_name;
        $order->picup_address = $request->picup_address;
        $order->Product_Type = $request->Product_Type;
        $order->Recipient_Name = $request->Recipient_Name;
        $order->Recipient_Phone = $request->Recipient_Phone;
        $order->Recipient_Address = $request->Recipient_Address;
        $order->Ammount_Collect = $request->Ammount_Collect;
        $order->Description = $request->Description;
        $order->status = 0;
        $order->delivery_charge = 60;
        $order->package_type = $request->package_type;
        $order->delivery_time = $request->delivery_time;
        $order->weight = $request->weight;
        $order->created_at = Carbon::now()->toDateString();
        $order->user_id  = auth::user()->id;
        $order->save();
        
        
       return back()->with('success','Your Order Created Successfully');
     
        }

    public function create_order() {
        $users = auth::user();
        return view('create_order', compact('users'));
    }
    
    public function edit_order($id) {
        $order = order::find($id);
        $rider = User::where('type','Rider')->Paginate(1000);
        // dd($rider);
        return view('edit_order', compact('order','rider'));
    }

    public function updateorder(Request $request,$id){
        $order = order::find($id);
        $order->marcent_name = $request->marcent_name;
        $order->picup_address = $request->picup_address;
        $order->Product_Type = $request->Product_Type;
        $order->Recipient_Name = $request->Recipient_Name;
        $order->Recipient_Phone = $request->Recipient_Phone;
        $order->Recipient_Address = $request->Recipient_Address;
        $order->Ammount_Collect = $request->Ammount_Collect;
        $order->Description = $request->Description;
        $order->status = $request->status;
        
        $order->delivery_charge = $request->delivery_charge;
        $order->package_type = $request->package_type;
        $order->delivery_time = $request->delivery_time;
        $order->weight = $request->weight;
        $order->rider = $request->rider;
        // $order->user_id  = auth::user()->id;
        $order->save();
        $order = order::where('status',5)->update(array('merchant_Due' => 'yes'));
        return redirect('order');
     
        }

        public function edit_order_rd(Request $request,$id){
            $order = order::find($id);
            // dd($request);
            $order->status = $request->status;
            
           
            $order->save();
            $order = order::where('status',5)->update(array('merchant_Due' => 'yes'));
            return redirect('order');
         
            }

            public function due_edit_up(Request $request,$id){
                $order = order::find($id);
                // dd($request);
                $order->merchant_Due = $request->merchant_Due;
                $order->save();
                
                return redirect('Merchant_Due_Payment');
             
                }
        public function delete_order($id){
            $order = order::find($id);
            $order->delete();
            return redirect('order');
         
            }
            
            public function pending_delivery() {
            $admin = order::where('status',0)->Paginate(1000);
            $merchant = order::where('user_id',Auth::user()->id)->where('status',0)->Paginate(1000);
            $rider = order::where('rider',Auth::user()->id)->where('status',0)->Paginate(1000);
            //   dd($order);

            return view('pending_delivery', compact('admin','merchant','rider'));
            
            }

            public function complete_delivery() {
        
                $admin = order::where('status',5)->Paginate(1000);
                $merchant = order::where('user_id',Auth::user()->id)->where('status',5)->Paginate(1000);
                $rider = order::where('rider',Auth::user()->id)->where('status',5)->Paginate(1000);
                //   dd($order);
    
                return view('complete_delivery', compact('admin','merchant','rider'));
                
                }
                public function Processing_delivery() {
        
                    $admin = order::where('status',2)->Paginate(1000);
                    $merchant = order::where('user_id',Auth::user()->id)->where('status',2)->Paginate(1000);
                    $rider = order::where('rider',Auth::user()->id)->where('status',2)->Paginate(1000);
                    //   dd($order);
        
                    return view('Processing_delivery', compact('admin','merchant','rider'));
                    
                    }
                    public function Retrun_delivery() {
        
                        $admin = order::where('status',4)->Paginate(1000);
                        $merchant = order::where('user_id',Auth::user()->id)->where('status',4)->Paginate(1000);
                        $rider = order::where('rider',Auth::user()->id)->where('status',4)->Paginate(1000);
                        //   dd($order);
            
                        return view('Retrun_delivery', compact('admin','merchant','rider'));
                        
                        }
                        public function holddelivery() {
        
                            $admin = order::where('status',3)->Paginate(1000);
                            $merchant = order::where('user_id',Auth::user()->id)->where('status',3)->Paginate(1000);
                            $rider = order::where('rider',Auth::user()->id)->where('status',3)->Paginate(1000);
                            //   dd($order);
                
                            return view('holddelivery', compact('admin','merchant','rider'));
                        
                        }

public function viewinvoice($id) {
    $viewinvoice = order::findOrFail($id);
    return view('viewinvoice', compact('viewinvoice'));
}

public function Merchant_Due_Payment() {
    $mdp = order::all();
    $today = Carbon::now()->toDateString();
    $yesterday = Carbon::yesterday()->toDateString();
    // Merchant
    $mdptoday = order::where('user_id',auth::user()->id)->where('merchant_Due','yes')->where('created_at',$today)->selectRaw('sum(Ammount_Collect - delivery_charge) as total')->get();
    $mdpyesterday = order::where('user_id',auth::user()->id)->where('merchant_Due','yes')->where('created_at',$yesterday)->selectRaw('sum(Ammount_Collect - delivery_charge) as total')->get();
    $mdptotal = order::where('user_id',auth::user()->id)->where('merchant_Due','yes')->selectRaw('sum(Ammount_Collect - delivery_charge) as total')->get();
    $alldueshow = order::where('user_id',auth::user()->id)->where('merchant_Due','yes')->get();
    //  Admin
    $alladminshow = order::where('merchant_Due','yes')->get();
    $admintoday = order::where('merchant_Due','yes')->where('created_at',$today)->selectRaw('sum(Ammount_Collect - delivery_charge) as total')->get();
    $adminyesterday = order::where('merchant_Due','yes')->where('created_at',$yesterday)->selectRaw('sum(Ammount_Collect - delivery_charge) as total')->get();
    $admintotal = order::where('merchant_Due','yes')->selectRaw('sum(Ammount_Collect - delivery_charge) as total')->get();
    

    // dd($alldueshow);
    return view('Merchant_Due_Payment', compact('mdp','mdptoday','mdpyesterday','mdptotal','alldueshow','alladminshow','admintoday','adminyesterday','admintotal'));
}

public function tracking($id) {
    $tracking = order::findOrFail($id);
    return view('tracking', compact('tracking'));

}

public function due_edit($id) {
    $order = order::find($id);
    return view('due_edit', compact('order'));
}
}
