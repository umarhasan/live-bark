@extends('company.layouts.app')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="{{ asset('assets/css/lead.css') }}" rel="stylesheet">

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
                                    <label class="form-label"><i class="fas fa-city icon"></i> Search by City</label>
                                    <input type="text" class="form-control" id="citySearch" placeholder="Enter city" onkeyup="filterLeads()">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><i class="fas fa-globe icon"></i> Search by Country</label>
                                    <input type="text" class="form-control" id="countrySearch" placeholder="Enter country" onkeyup="filterLeads()">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><i class="fas fa-map-marker icon"></i> Search by State</label>
                                    <input type="text" class="form-control" id="stateSearch" placeholder="Enter state" onkeyup="filterLeads()">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><i class="fas fa-map-pin icon"></i> Search by Zip Code</label>
                                    <input type="text" class="form-control" id="zipCodeSearch" placeholder="Enter zip code" onkeyup="filterLeads()">
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
                                <div class="mb-3">
                                    <label class="form-label"><i class="fas fa-filter icon"></i> Filter by Status</label>
                                    <select id="statusFilter" class="form-select" onchange="filterLeads()">
                                        <option value="">Select Status</option>
                                        <option value="null">Pending</option>
                                        <option value="1">Picked</option>
                                        <option value="0">Not Picked</option>
                                    </select>
                                </div>
                                <!-- Budget Dropdown -->
                                <div class="mb-3">
                                    <label class="form-label"><i class="fas fa-money-bill-wave"></i> Filter by Budget</label>
                                    <input type="text" class="form-control" id="budgetSearch" placeholder="Enter Budget" onkeyup="filterLeads()">
                                </div>
                                <button class="btn btn-danger w-100" onclick="clearFilters()">Clear Filters</button>
                            </div>
                        </div>
                    </div>
                    <!-- Main content for lead details -->
                    <div class="col-md-8">
                        <div class="header mb-4 d-flex justify-content-between align-items-center">
                            <!-- Total Leads Section -->
                            <div>
                                <strong>Showing {{ $filteredLeadsCount }} Leads</strong>
                            </div>
                            <!-- Records per page Section -->
                            <div>
                                <label class="form-label">Records per page:</label>
                                <select id="recordsPerPage" class="form-select" onchange="updateRecordsPerPage()">
                                    <option value="0" {{ request('per_page') == 0 ? 'selected' : '' }}>All</option>
                                    <option value="1" {{ request('per_page') == 1 ? 'selected' : '' }}>1</option>
                                    <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                                    <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                                    <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                                    <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                                </select>
                            </div>
                        </div>
                        @if(isset($leads))
                            <div class="lead-list">
                                @forelse($leads as $lead)
                                    <div class="details-panel lead-card"
                                        data-name="{{ strtolower($lead->name) }}"
                                        data-city="{{ strtolower($lead->City ?? '') }}"
                                        data-country="{{ strtolower($lead->country ?? '') }}"
                                        data-state="{{ strtolower($lead->state ?? '') }}"
                                        data-zip="{{ strtolower($lead->zip ?? '') }}"
                                        data-service="{{ strtolower($lead->service->name ?? '') }}"
                                        data-lead-service="{{ strtolower($lead->service->leadService->name ?? '') }}"
                                        data-status="{{ $lead->status === NULL ? 'null' : $lead->status }}"
                                        data-budget="{{ strtolower($lead->budget) }}">
                                        <div class="details-header">
                                            <h5>{{ $lead->name }} </h5>
                                            <p><span>{{ isset($lead->service) ? $lead->service->name : 'No Service' }}</span> - <span>{{ isset($lead->service->leadService) ? $lead->service->leadService->name : 'No Service Type' }}</span></p>
                                        </div>
                                        <hr>
                                        <div class="lead-details">
                                            <p><strong>City:</strong> <i class="fas fa-city icon"></i> {{ $lead->City ?? 'N/A' }} -
                                                <strong>Zip Code:</strong> <i class="fas fa-map-pin icon"></i> {{ $lead->zip ?? 'N/A' }}</p>
                                             <p><strong>Country:</strong> <i class="fas fa-globe icon"></i> {{ $lead->country ?? 'N/A' }} -
                                                <strong>State:</strong> <i class="fas fa-map-marker icon"></i> {{ $lead->state ?? 'N/A' }}</p>
                                             <p><strong>Location:</strong> <i class="fas fa-map-marker-alt icon"></i> {{ $lead->address ?? 'N/A' }}</p>
                                            <p>
                                                <strong>Contact:</strong>
                                                <i class="fas fa-phone-alt icon"></i>
                                                <span>
                                                    @if($lead->status == 1)
                                                        {{ $lead->phone }} <!-- Show full phone number -->
                                                    @else
                                                        {{ '+' . substr($lead->phone, 1, 3) }}xxx-xx-{{ substr($lead->phone, -2, 1) }}-xx
                                                    @endif
                                                </span> |
                                                <i class="fas fa-envelope icon"></i>
                                                <span>
                                                    @if($lead->status == 1)
                                                        {{ $lead->email }} <!-- Show full email -->
                                                    @else
                                                        {{ substr($lead->email, 0, 2) }}xxxx{{ substr(strrchr($lead->email, "@"), 0) }}
                                                    @endif
                                                </span>
                                            </p>
                                            <p><strong>Average Value:</strong> {{ $lead->budget }}</p>
                                            <p><strong>Status:</strong>
                                                @if($lead->status == 1)
                                                    <strong class="text-success">Pick</strong>
                                                @elseif($lead->status === 0)
                                                    <strong class="text-danger">Not Pick</strong>
                                                @else
                                                    <strong class="text-warning">Pending</strong>
                                                @endif
                                            </p>
                                            <p><strong>Details:</strong></p>
                                            <ul>
                                                <li><strong>Business:</strong> {{ $lead->business }}</li>
                                                <li><strong>Need:</strong> {{ $lead->need }}</li>
                                                <li><strong>Industry:</strong> {{ $lead->industry }}</li>
                                                <li><strong>Live Website:</strong> {{ $lead->live_website }}</li>
                                            </ul>
                                            <p>
                                                <strong>Credit:</strong><span class="text-info"> {{ $lead->service->credit ?? 'No Credit' }}</span>
                                            </p>
                                            <div>
                                                @if($lead->status === NULL)
                                                    <button class="btn btn-primary">
                                                        <a href="{{ route('company.lead_pick', $lead->id) }}">
                                                            <span style="color:white">{{ $lead->name }}</span>
                                                        </a>
                                                    </button>
                                                    <button class="btn btn-secondary btn-not-interested">
                                                        <a href="{{ route('company.lead_not_pick', $lead->id) }}">
                                                            <span style="color:white">Not interested</span>
                                                        </a>
                                                    </button>

                                                @endif
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
                            @if($leads instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                <div class="d-flex justify-content-center mt-4">
                                    {{ $leads->links('vendor.pagination.default') }}
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            <script src="{{ asset('assets/js/lead.js')}}"></script>
            <script>
    // Update the records per page and reload the page
    function updateRecordsPerPage() {
        var perPage = document.getElementById('recordsPerPage').value;
        window.location.href = "{{ url()->current() }}?per_page=" + perPage;
    }
</script>
@endsection
