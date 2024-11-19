<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\LeadGenrate;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Validator;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Session;
use Stripe;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function customer_leads_genrate(){
        $user = Auth::id();
        $leads = LeadGenrate::get();
        $companyUsers = User::whereHas('roles', function($q){
            $q->where('name', 'company');
        })->get();
        return view('customer.lead_genrate',compact('leads','companyUsers'));
    }

    public function assign_company(Request $request){

        // $assign = User::where('id',$request->lead_assign_company_id)->first();
        // $assign->lead_assign_company_id = $request->lead_assign_company_id;
        // $assign->assign_status = 1;
        // $assign->save();

        $leads= LeadGenrate::where('id',$request->lead_id)->first();
        $leads->assign_company_id = $request->lead_assign_company_id;
        $leads->status = 1;
        $leads->save();


        return redirect()->back();
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return Auth::user();
        $data['users'] = User::all()->count();
        return view('customer.dashboard',$data);
    }

    public function profile()
    {
        return view('customer.profile');
    }



    public function UserProfileUpdate(Request $request)
    {
        $id = Auth::user()->id;

        $this->validate($request, [
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'email' => 'nullable',
        ]);

        $password = Hash::make($request->password);

        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = isset($password) ? $password : $user->password;
        $user->save();

        session::flash('success','profile Updated Successfully');
        return redirect()->back();

    }

    public function user_edit_profile(Request $request){

        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        session::flash('success','profile Updated Successfully');
        return redirect()->back();

    }


    public function users_change_password()
    {
        return view('customer.change-password');
    }
    public function users_store_change_password(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();
        $userPassword = $user->password;

        $validator =Validator::make($request->all(),[
          'oldpassword' => 'required',
          'newpassword' => 'required|same:password_confirmation|min:6',
          'password_confirmation' => 'required',
        ]);

        if(!Hash::check($request->oldpassword, $userPassword))
        {
            return back()->with(['error'=>'old password not match']);
        }

        $user->password = Hash::make($request->newpassword);
        $user->save();

        return redirect()->back()->with("success","Password changed successfully!");
    }

}
