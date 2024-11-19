<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\LeadGenrate;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Validator;
use App\Models\User;
use App\Models\Package;
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
        public function index(){
            return view('company.dashboard');
        }
        public function company_leads_genrate(Request $request) {
        $query = LeadGenrate::with('service','service.leadService')->whereNull('assign_company_id');

        // Filter by name if provided
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        // Filter by status if provided
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $leads = $query->get();
        return view('company.lead_genrate', compact('leads'));
    }

    public function purchaseleads(){
            $user_id = Auth::user()->id;
            $leads = LeadGenrate::with('users')->where('assign_company_id',$user_id)->get();
        return view('company.purchased_lead',compact('leads'));
    }

    public function company_show($id){
        $lead = LeadGenrate::with('users')->where('id',$id)->first();
        return view('company.leads_show',compact('lead'));
    }


    /**
     * Pick a lead.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function pick(Request $request)
    {
        $request->validate([
            'lead_id' => 'required|exists:leads,id',
        ]);

        $lead = Lead::findOrFail($request->lead_id);
        // Implement your pick logic here, e.g., assign to user, change status, etc.
        $lead->status = 'picked';
        $lead->picked_by = auth()->user()->id; // Assuming you have authentication
        $lead->save();

        return redirect()->route('company.leads.index')->with('success', 'Lead picked successfully.');
    }

    public function companyProfile()
    {
        return view('company.profile');
    }


    public function companyProfileUpdate(Request $request)
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



    public function companyEditProfile(Request $request){

        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->paypal_email = $request->paypal_email;
        $user->venmo_number = $request->venmo_number;
        $user->connect_to_facebook = $request->connect_to_facebook;
        $user->save();

        session::flash('success','profile deatail Updated Successfully');
        return redirect()->back();
    }
    public function companyBankDetail(Request $request){

        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->account_number = $request->account_number;
        $user->rout_number = $request->route_number;
        $user->save();

        session::flash('success','Bank Detail Updated Successfully');
        return redirect()->back();
    }

    public function company_change_password()
    {
        return view('company.change-password');
    }
    public function company_store_change_password(Request $request)
    {
        $user = Auth::user();
        $userPassword = $user->password;

        $validator =Validator::make($request->all(),[
          'oldpassword' => 'required',
          'newpassword' => 'required|same:password_confirmation|min:6',
          'password_confirmation' => 'required',
        ]);

        if(Hash::check($request->oldpassword, $userPassword))
        {
            return back()->with(['error'=>'Old password not match']);
        }

        $user->password = Hash::make($request->newpassword);
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");
    }


    public function purchasePackageCreate($id){

        if(Auth::user()->credit >= 50){
            $user = Auth::user();
            $user = User::where('id',$user->id)->first();
            $user->assign_status = 1;
            $user->credit = $user->credit - 50;
            $user->save();

            $lead = LeadGenrate::where('id',$id)->first();
            $lead->assign_company_id = $user->id;
            $lead->status = 1;
            $lead->save();
         return redirect()->back()->with('success','Successfully Purchased');
      }else{
        $leads =LeadGenrate::where('id',$id)->first();
        $package = Package::get();
        return view('company.packages',compact('package','leads'));

       }
       }

    public function stripePost(Request $request)
    {
        try {

            // Set your Stripe API key
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            // Create a charge using Stripe API
            Stripe\Charge::create([
                "amount" => $request->amount, // Amount in cents
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from https://virtuexolutions.com."
            ]);

            $user = Auth::user();
            $user = User::where('id',$user->id)->first();

            $user->assign_status = 1;
            $user->credit = $user->credit + $request->credit;
            $user->save();

            $lead = LeadGenrate::where('id',$request->lead_id)->first();
            $lead->assign_company_id = $user->id;
            $lead->status = 1;
            $lead->save();


            // Payment successful, flash success message
            Session::flash('success', 'Payment successful!');
            // return redirect()->route('user_joke');
            return redirect('/company/leads-genrate');

        } catch (\Stripe\Exception\CardException $e) {
            // Card error occurred, handle it
            Session::flash('error', $e->getError()->message);
        }

        // Redirect back to the previous page
        return back();
    }


}
