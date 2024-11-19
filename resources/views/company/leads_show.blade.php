@extends('company.layouts.app')

@section('content')
<style>
    /* CSS to prevent text selection and copying */
    .no-select {
        -webkit-user-select: none; /* Chrome/Safari */
        -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* IE10+ */
        user-select: none; /* Standard */
    }

    /* Additional styles for better UI */
    .status-badge {
        padding: 0.5em 0.75em;
        font-size: 0.9em;
        font-weight: 700;
    }
</style>

<script>
    // JavaScript to prevent right-click and clipboard actions
    document.addEventListener('DOMContentLoaded', function () {
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
        }, false);
        document.addEventListener('copy', function(e) {
            e.preventDefault();
        });
    });
</script>

<div class="content-wrapper no-select">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9"></div>
                <div class="col-sm-3">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Leads / Information</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Company Information on the right side -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Company Information</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $lead->users->name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $lead->users->email ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Credit</th>
                                    <td>
                                        @if(isset($lead->users->credit) && $lead->users->credit == 0)
                                            <span class="status-badge bg-warning">0</span>
                                        @elseif(isset($lead->users->credit))
                                            <span class="status-badge bg-success">{{ $lead->users->credit }}</span>
                                        @else
                                            <span class="status-badge bg-warning">0</span>
                                        @endif
                                    </td>
                                </tr>
                                <!-- Add additional company details here -->
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Lead Information -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lead Information</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Need</th>
                                    <td>{{ $lead->need }}</td>
                                </tr>
                                <tr>
                                    <th>Business</th>
                                    <td>{{ $lead->business }}</td>
                                </tr>
                                <tr>
                                    <th>Industry</th>
                                    <td>{{ $lead->industry }}</td>
                                </tr>
                                <tr>
                                    <th>Live Website</th>
                                    <td>{{ $lead->live_website }}</td>
                                </tr>
                                <tr>
                                    <th>Budget</th>
                                    <td>{{ $lead->budget }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Additional Lead Details Below -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">More Lead Details</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Hiring Decision</th>
                                    <td>{{ $lead->hire }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $lead->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $lead->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $lead->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Zip</th>
                                    <td>{{ $lead->zip }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $lead->address }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <span class="status-badge {{ $lead->status == 1 ? 'bg-success' : 'bg-warning' }}">
                                            {{ $lead->status == 1 ? 'Picked' : 'Not Picked' }}
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
