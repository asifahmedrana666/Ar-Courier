<?php

namespace App\Http\Controllers;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use App\Models\User;
use App\Models\order;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashbord()
    { 
        $today = Carbon::now()->toDateString();
                // Admin
                $users = User::all();
                $adpending_delivery = order::where('status',0)->where('created_at',$today)->count();
                $adcomplete_delivery = order::where('status',5)->where('created_at',$today)->count();
                $adProcessing_delivery = order::where('status',2)->where('created_at',$today)->count();
                $adtotal_order = order::where('status',4)->where('created_at',$today)->count();
                //  dd($adcomplete_delivery);
                // Merchant
        
        $merchant_compleate = order::where('user_id',auth::user()->id)->count();
        $merchant_outfor = order::where('user_id',auth::user()->id)->where('status',3)->count();
        $merchant_Retrun = order::where('user_id',auth::user()->id)->where('status',4)->count();
        $merchantdue = order::where('user_id',auth::user()->id)->where('merchant_Due','yes')->selectRaw('sum(Ammount_Collect - delivery_charge) as total')->get();
        // dd($merchantdue);
        

        // Rider
        $rider_pending = order::where('rider',auth::user()->id)->where('status',4)->count();
        $rider_complete = order::where('rider',auth::user()->id)->where('status',5)->count();
        $Amount_toCollected = order::where('rider',auth::user()->id)->where('status',5)->selectRaw('sum( Ammount_Collect) as total')->get();
        $Amount_toCollect = order::where('rider',auth::user()->id)->where('status',2)->selectRaw('sum( Ammount_Collect) as total')->get();
        $riderordert = order::where('rider',auth::user()->id)->where('status',6)->get();
        //   dd($rider_complete);
    //    Chart
    $day = Carbon::now();
    $chart = order::where('created_at',$day->subDays(3)->toDateString())->Paginate(1000);
       return view('dashbord', compact('adpending_delivery','adcomplete_delivery','adProcessing_delivery','adtotal_order','merchant_compleate','merchant_outfor','merchant_Retrun','merchantdue','rider_pending','rider_complete','Amount_toCollected','Amount_toCollect','chart'));
    }

    public function hometracking(Request $request)
    { 

        $sc = $request->name;
        $link = "tracking/$sc";
        return redirect($link);

    }

    public function users() {
        $users = User::all();
        // $car = Carbon::now();
        // $chart = order::where('created_at',$car->subDays(3)->toDateString())->count();
        // // dd($car->startOfWeek(Carbon::MONDAY));
        // dd($car->subDays(-3)->toDateString());
        return view('users', compact('users'));
    }

    public function edit_users($id) {
        $users = User::find($id);
        return view('edit_users', compact('users'));
    }
    public function logout() {
        // Session::flush();
        Auth::logout();
        return redirect('/');
    }

    public function create_user(){

        return view('create_user');
        
    }
    public function user_stor(Request $request){
        $user          = new User;
        $user->name    = $request->name;
        $user->email   = $request->email;
        $user->address   = $request->address;
        $user->type   = $request->type;
        
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('users')->with('success','Your User Created Successfully');
    }

    public function edit_users_up(Request $request,$id){
        $users = User::find($id);
        // dd($request);
        $users->name    = $request->name;
        $users->email   = $request->email;
        $users->address   = $request->address;
        $users->type   = $request->type;
        
        $users->save();
        return redirect('users')->with('success','Your User Edit Successfully');
    }
    public function user_delete($id) {
        $users = User::find($id);
        $users->delete();

        return back()->with('danger','User Deleted Successfully');
    }

}
