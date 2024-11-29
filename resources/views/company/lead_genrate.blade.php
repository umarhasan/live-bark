@extends('company.layouts.app')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<style>
    .details-panel {
        padding: 20px;
        background: #f8f9fa;
        border: 1px solid #ddd;
    }
    .btn-custom {
        background-color: #007bff;
        color: white;
    }
    .btn-custom:hover {
        background-color: #0056b3;
    }
    .badge-custom {
        background-color: #007bff;
        color: white;
    }
    .lead-item {
        cursor: pointer;
    }
    .lead-item:hover {
        background-color: #f0f0f0;
    }
    .details-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .today-leads {
        font-weight: bold;
        color: #007bff;
    }
    .lead-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 10px;
        background-color: #f9f9f9;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
    /* Hover Effect for Lead Cards */
    .lead-card:hover {
        background-color: #e9f1f9;
        transform: scale(1.02);
    }
    /* Lead Name */
    .lead-name {
        font-size: 1.2rem;
        font-weight: bold;
        color: #333;
    }
    /* Lead Service */
    .lead-service {
        font-size: 1rem;
        color: #666;
    }
    .service-name {
        font-weight: bold;
        color: #007bff;
    }
    /* Time Since Lead Created */
    .lead-time {
        font-size: 0.9rem;
        color: #999;
    }

    .time-since {
        font-weight: bold;
    }

    /* Location and Credit Info */
    .lead-location {
        font-size: 0.9rem;
        color: #555;
        margin-top: 5px;
    }

    .location, .credit {
        font-weight: bold;
        color: #28a745; /* Green for location and credit */
    }

    /* Tooltip Style for Info (optional) */
    .lead-location, .credit {
        position: relative;
    }

    .lead-location:hover::after, .credit:hover::after {
        content: attr(data-tooltip);
        position: absolute;
        top: -20px;
        left: 0;
        background-color: rgba(0, 0, 0, 0.7);
        color: #fff;
        padding: 5px;
        border-radius: 3px;
        font-size: 0.8rem;
        white-space: nowrap;
    }

    /* Icon styles */
    .icon {
        color: #007bff;
        margin-right: 8px;
    }
</style>

@section('content')
<div class="container">
    <div class="row">
        <!-- Sidebar for leads -->
        <div class="col-md-4">
            <div class="header d-flex justify-content-between align-items-center">
                <!-- Showing Leads Count -->
                <div class="lead-count">
                    Showing {{ $filteredLeadsCount }} leads
                </div><br/><br/><br/>
                <!-- Filter Button with Icon -->
            </div>
                <input type="text" class="form-control mt-3" id="leadSearch" placeholder="Search leads by name" onkeyup="filterLeads()">
            <!-- Today's Leads Section -->
            <div class="list-group mt-3" id="leadsList">
                @foreach($todaysLeads as $lead)
                    <a href="#list-{{ $lead->id }}" class="list-group-item list-group-item-action lead-item" id="list-{{ $lead->id }}-list" data-toggle="list" role="tab" aria-controls="{{ $lead->name }}">
                        <div class="lead-card" data-name="{{ $lead->name }}">
                            <!-- Lead Name -->
                            <h5 class="lead-name"><strong>{{ $lead->name }}</strong></h5>
                            <!-- Service Info -->
                            <p class="lead-service">
                                <span class="lead-service-name">{{ isset($lead->service->leadService) ? $lead->service->leadService->name : 'No Service' }}</span>
                                -<span class="">{{ isset($lead->service) ? $lead->service->name : 'No Service' }}</span>
                            </p>
                            <!-- Time Since Lead Created -->
                            <p class="lead-time">
                                <span class="time-since">{{ \Carbon\Carbon::parse($lead->created_at)->diffForHumans() }}</span></p>
                            <!-- Location and Credit -->
                            <p class="lead-location">
                                <i class="fas fa-map-marker-alt icon"></i>
                                <span class="location">{{ $lead->address ?? 'Location Not Provided' }}</span> |
                                <i class="fas fa-credit-card icon"></i>
                                <span class="credit">{{ isset($lead->service) ? $lead->service->credit : 'No Credit' }}</span>
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Main content for lead details -->
        <div class="col-md-8">
            <div class="tab-content" id="nav-tabContent">
                @if(isset($leads) && $leads->isNotEmpty())
                    <div class="header">
                        <strong>Showing {{ $filteredLeadsCount }} Leads</strong> <!-- Showing filtered leads -->
                    </div>
                    @foreach($leads as $lead)
                        <div class="tab-pane fade details-panel" id="list-{{ $lead->id }}" role="tabpanel" aria-labelledby="list-{{ $lead->id }}-list">
                            <div class="details-header">
                                <h5>{{ $lead->name }} - {{ isset($lead->service->leadService) ? $lead->service->leadService->name : 'No Service' }}</h5>
                            </div>
                            <hr>
                            <div class="lead-details">
                                <p><strong>Location:</strong> <i class="fas fa-map-marker-alt icon"></i>{{ $lead->address }}</p>
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
                                    <li><strong>Details:</strong>&nbsp;{{ $lead->contact }}</li>
                                    <li><strong>Business:</strong>&nbsp;{{ $lead->business }}</li>
                                    <li><strong>Need:</strong>&nbsp;{{ $lead->need }}</li>
                                    <li><strong>Industry:</strong>&nbsp;{{ $lead->industry }}</li>
                                    <li><strong>Live Website:</strong>&nbsp;{{ $lead->live_website }}</li>
                                </ul>
                                <p><strong>Credit:</strong>{{ isset($lead->service) ? $lead->service->credit : 'No Credit' }}</p>
                                <div>
                                    <button class="btn btn-primary">Contact {{ $lead->name }}</button>
                                    <button class="btn btn-secondary btn-not-interested">Not interested</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="header">
                        <strong>No Filtered Leads Found</strong>
                    </div>
                @endif
                <!-- Display Today's Leads when filtered leads are not available -->
                @if(isset($todaysLeads) && $todaysLeads->isNotEmpty())
                    @foreach($totalLeads as $lead)
                    <div class="tab-pane fade details-panel active show">
                        <div class="details-header">
                            <h5>{{ $lead->name }} - {{ isset($lead->service->leadService) ? $lead->service->leadService->name : 'No Service' }}</h5>
                        </div>
                        <hr>
                        <div class="lead-details">
                            <p><strong>Location:</strong> <i class="fas fa-map-marker-alt icon"></i>{{ $lead->address }}</p>
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
                                <li><strong>Details:</strong>&nbsp;{{ $lead->contact }}</li>
                                <li><strong>Business:</strong>&nbsp;{{ $lead->business }}</li>
                                <li><strong>Need:</strong>&nbsp;{{ $lead->need }}</li>
                                <li><strong>Industry:</strong>&nbsp;{{ $lead->industry }}</li>
                                <li><strong>Live Website:</strong>&nbsp;{{ $lead->live_website }}</li>
                            </ul>
                            <p><strong>Credit:</strong>{{ isset($lead->service) ? $lead->service->credit : 'No Credit' }}</p>
                            <div>
                                <button class="btn btn-primary">Contact {{ $lead->name }}</button>
                                <button class="btn btn-secondary btn-not-interested">Not interested</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function filterLeads() {
        var searchInput = document.getElementById("leadSearch").value.toLowerCase();
        var leads = document.querySelectorAll(".lead-card");

        leads.forEach(function(lead) {
            var leadName = lead.getAttribute("data-name").toLowerCase();
            if (leadName.includes(searchInput)) {
                lead.style.display = "block";
            } else {
                lead.style.display = "none";
            }
        });
    }
</script>
@endsection
