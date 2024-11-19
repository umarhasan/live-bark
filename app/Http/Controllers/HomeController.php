<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\VeriantSize;
use App\Models\LeadGenrate;
use App\Models\PageCategory;
use App\Models\PageSections;
use App\Models\VeriantColor;
use App\Models\Service;
use App\Models\LeadService;

use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {

        return view('home');
    }

    public function search(Request $request)
    {
        $query = $request->input('service');
        $services = LeadService::with('services')->where('name', 'LIKE', '%' . $query . '%')->get();

        return response()->json($services);
    }

    public function lead_genrate(Request $request){
        LeadGenrate::create($request->all());
        return redirect()->back();
    }

    public function login(){
        // $this->middleware('auth')->except('logout');
        return view('auth.login');
    }

    public function product_detail($id)
    {
        $data['product'] = Product::find($id);
        $data['size'] = VeriantSize::where('product_id',$id)->first();
        // return json_decode($size->name);
        $data['color'] = VeriantColor::where('product_id',$id)->first();
        return view('admin.product_detail',$data);
    }


}
