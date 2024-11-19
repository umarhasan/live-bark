@extends('company.layouts.app')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    body { margin-top: 20px; }
    .lead-card { margin-bottom: 20px; }
    .details-panel { padding: 20px; background: #f8f9fa; border: 1px solid #ddd; }
    .btn-custom { background-color: #007bff; color: white; }
    .btn-custom:hover { background-color: #0056b3; }
    .badge-custom { background-color: #007bff; color: white; }
</style>
@section('content')
<div class="content-wrapper no-select">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1>Leads</h1>
                </div>
                <div class="col-sm-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Leads</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>



    <!-- Leads List -->
    <div class="row">
        <div class="col-md-4">
            <!-- Filter Form -->
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('company.lead_genrate') }}" method="GET">
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                                <input type="text" class="form-control mb-2" name="name" placeholder="Filter by name">
                            </div>
                            <div class="col-auto">
                                <select class="form-control mb-2" name="status">
                                    <option value="">Select Status</option>
                                    <option value="open">Open</option>
                                    <option value="closed">Closed</option>
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-2">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="list-group" id="list-tab" role="tablist">
                @foreach($leads as $lead)
                    <a class="list-group-item list-group-item-action" id="list-{{ $lead->id }}-list" data-toggle="list" href="#list-{{ $lead->id }}" role="tab" aria-controls="{{ $lead->name }}">{{ $lead->name }} - {{ isset($lead->service->leadService) ? $lead->service->leadService->name : '' }}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="col-md-8">
            <div class="tab-content" id="nav-tabContent">
                @foreach($leads as $lead)
                    <div class="tab-pane fade details-panel" id="list-{{ $lead->id }}" role="tabpanel" aria-labelledby="list-{{ $lead->id }}-list">
                        <h4>{{ $lead->name }} - {{ isset($lead->service->leadService) ? $lead->service->leadService->name : '' }}</h4>
                        <p><strong>Location:</strong> {{ $lead->location }}</p>
                        <p><strong>Contact:</strong> <span>{{ $lead->phone }}</span>&nbsp;<span>{{ $lead->email }}</span></p>
                        <p><strong>Average Value:</strong> {{ $lead->budget }}</p>
                        <p><strong>Details:</strong> {{ $lead->details }}</p>
                        <button class="btn btn-custom">Not interested</button><button class="badge badge-custom">Contact {{ $lead->name }}</button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
