<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LeadService;

class LeadServiceController extends Controller
{
    public function index()
    {
        $leadServices = LeadService::all();
        return view('admin.leadServices.index', compact('leadServices'));
    }

    public function create()
    {
        return view('admin.leadServices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        LeadService::create($request->all());

        return redirect()->route('lead-services.index');
    }

    public function show($id)
    {
        $leadService = LeadService::findOrFail($id);
        return view('admin.leadServices.show', compact('leadService'));
    }

    public function edit($id)
    {
        $leadService = LeadService::findOrFail($id);
        return view('admin.leadServices.edit', compact('leadService'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $leadService = LeadService::findOrFail($id);
        $leadService->update($request->all());

        return redirect()->route('lead-services.index');
    }

    public function destroy($id)
    {
        $leadService = LeadService::findOrFail($id);
        $leadService->delete();

        return redirect()->route('lead-services.index');
    }
}
