@extends('company.layouts.app')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<style>
 .details-panel {
        padding: 20px;
        background: #f8f9fa;
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-bottom: 15px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .lead-card {
        transition: transform 0.3s ease, background-color 0.3s ease;
    }
    .lead-card:hover {
        transform: scale(1.02);
        background-color: #e9f1f9;
    }
    .btn-custom {
        background-color: #007bff;
        color: white;
    }
    .btn-custom:hover {
        background-color: #0056b3;
    }
    .lead-name {
        font-size: 1.2rem;
        font-weight: bold;
        color: #333;
    }
    .lead-service {
        font-size: 1rem;
        color: #666;
    }
    .lead-location {
        font-size: 0.9rem;
        color: #555;
    }
    .filter-section {
        background: #f1f1f1;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }
    .filter-section input,
    .filter-section select {
        margin-bottom: 10px;
    }
    .filter-section label {
        font-weight: bold;
        color: #333;
    }
    .filter-clear-btn {
        margin-top: 10px;
        background-color: #ff7f7f;
        color: white;
    }
    .filter-clear-btn:hover {
        background-color: #e07f7f;
    }
    /* Custom pagination styles */
    .pagination {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination li a, .pagination li span {
        display: inline-block;
        padding: 8px 15px;
        background-color: #007bff;
        color: white;
        border-radius: 4px;
        text-decoration: none;
        font-size: 14px;
    }

    .pagination li a:hover, .pagination li span:hover {
        background-color: #0056b3;
    }

    .pagination .active a, .pagination .active span {
        background-color: #0056b3;
        color: white;
    }

    .pagination .disabled a, .pagination .disabled span {
        background-color: #ddd;
        color: #888;
    }
</style>

@section('content')
<div class="container">
    <div class="row">
        <!-- Sidebar for filters -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-user icon"></i> Search by Name</label>
                        <input type="text" class="form-control" id="nameSearch" placeholder="Enter name" onkeyup="filterLeads()">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-map-marker-alt icon"></i> Search by Location</label>
                        <input type="text" class="form-control" id="locationSearch" placeholder="Enter location" onkeyup="filterLeads()">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-briefcase icon"></i> Filter by Service</label>
                        <select id="serviceFilter" class="form-select" onchange="filterLeads()">
                            <option value="">Select Service</option>
                            @foreach($service as $srv)
                                <option value="{{ strtolower($srv->name) }}">{{ $srv->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-briefcase icon"></i> Filter by Lead Service</label>
                        <select id="leadServiceFilter" class="form-select" onchange="filterLeads()">
                            <option value="">Select Lead Service</option>
                            @foreach($lead_service as $lsrv)
                                <option value="{{ strtolower($lsrv->name) }}">{{ $lsrv->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-danger w-100" onclick="clearFilters()">Clear Filters</button>
                </div>
            </div>
        </div>

        <!-- Main content for lead details -->
        <div class="col-md-8">
            <div class="header mb-4">
                <strong>Showing {{ $filteredLeadsCount }} Leads</strong>
            </div>

            @if(isset($leads))

            <div class="lead-list">
                @forelse($leads as $lead)
                    <div class="details-panel lead-card"
                        data-name="{{ strtolower($lead->name) }}"
                        data-location="{{ strtolower($lead->address) }}"
                        data-service="{{ strtolower($lead->service->name ?? '') }}"
                        data-lead-service="{{ strtolower($lead->service->leadService->name ?? '') }}">
                        <div class="details-header">
                            <h5>{{ $lead->name }} - {{ isset($lead->service->leadService) ? $lead->service->leadService->name : 'No Service' }}</h5>
                        </div>
                        <hr>
                        <div class="lead-details">
                            <p><strong>Location:</strong> <i class="fas fa-map-marker-alt icon"></i> {{ $lead->address }}</p>
                            <p><strong>Contact:</strong>
                                <i class="fas fa-phone-alt icon"></i>
                                <span>{{ '+' . substr($lead->phone, 1, 3) }}xxx-xx-{{ substr($lead->phone, -2, 1) }}-xx</span> |  <!-- Display first 3 digits of the phone number (after country code) followed by 'xxxx' -->
                                <i class="fas fa-envelope icon"></i>
                                <span>{{ substr($lead->email, 0, 2) }}xxxx{{ substr(strrchr($lead->email, "@"), 0) }}</span> <!-- First 2 characters of email followed by 'xxxx' and then the domain -->
                            </p>
                            <p><strong>Average Value:</strong> {{ $lead->budget }}</p>
                            <p><strong>Status:</strong> {{ $lead->status ? 'Responded' : 'Be the first - no one has responded yet!' }}</p>
                            <p><strong>Details:</strong></p>
                            <ul>
                                <li><strong>Business:</strong> {{ $lead->business }}</li>
                                <li><strong>Need:</strong> {{ $lead->need }}</li>
                                <li><strong>Industry:</strong> {{ $lead->industry }}</li>
                                <li><strong>Live Website:</strong> {{ $lead->live_website }}</li>
                            </ul>
                            <p><strong>Credit:</strong> {{ $lead->service->credit ?? 'No Credit' }}</p>
                            <div>
                                <button class="btn btn-primary">Contact <a href="{{ route('company.lead_pick',$lead->id) }}"><span style="color:white">{{ $lead->name }}</span></a></button>
                                <button class="btn btn-secondary btn-not-interested"><a href="{{ route('company.lead_not_pick',$lead->id) }}"><span style="color:white">Not interested</span></a></button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="header">
                        <strong>No Leads Found</strong>
                    </div>
                @endforelse
            </div>

            <!-- Add pagination links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $leads->links('vendor.pagination.default') }}
            </div>
            @endif
        </div>
    </div>
</div>

<script>
    function filterLeads() {
        var nameSearch = document.getElementById("nameSearch").value.toLowerCase();
        var locationSearch = document.getElementById("locationSearch").value.toLowerCase();
        var serviceFilter = document.getElementById("serviceFilter").value.toLowerCase();
        var leadServiceFilter = document.getElementById("leadServiceFilter").value.toLowerCase();
        var leads = document.querySelectorAll(".lead-card");

        leads.forEach(function(lead) {
            var name = lead.getAttribute("data-name");
            var location = lead.getAttribute("data-location");
            var service = lead.getAttribute("data-service");
            var leadService = lead.getAttribute("data-lead-service");

            // Check if the search input matches any of the lead fields
            if (
                name.includes(nameSearch) &&
                location.includes(locationSearch) &&
                (serviceFilter === "" || service.includes(serviceFilter)) &&
                (leadServiceFilter === "" || leadService.includes(leadServiceFilter))
            ) {
                lead.style.display = "block";
            } else {
                lead.style.display = "none";
            }
        });
    }

    function clearFilters() {
        document.getElementById("nameSearch").value = '';
        document.getElementById("locationSearch").value = '';
        document.getElementById("serviceFilter").value = '';
        document.getElementById("leadServiceFilter").value = '';
        filterLeads();
    }
</script>
@endsection
