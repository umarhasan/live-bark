@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Services List</h1>
    <a href="{{ route('services.create') }}" class="btn btn-primary mb-3">Create New Service</a>

    <!-- Filter Form -->
    <form action="{{ route('services.index') }}" method="GET">
        <div class="form-group">
            <label for="lead_service_id">Filter by Lead Service:</label>
            <select name="lead_service_id" onchange="this.form.submit()" class="form-control w-25">
                <option value="">All Services</option>
                @foreach($leadServices as $leadService)
                    <option value="{{ $leadService->id }}" {{ request('lead_service_id') == $leadService->id ? 'selected' : '' }}>
                        {{ $leadService->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>

    <!-- Services Table -->
    <form action="{{ route('services.bulkUpdatePage') }}" method="POST" id="bulk-update-form">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th><input type="checkbox" id="select-all"></th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Lead Service</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr>
                    <td><input type="checkbox" name="ids[]" value="{{ $service->id }}"></td>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->description }}</td>
                    <td>{{ $service->price }}</td>
                    <td>{{ $service->leadService->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{ route('services.destroy', $service->id) }}" class="btn btn-sm btn-danger">Delete</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Bulk Actions -->
        <button type="submit" class="btn btn-primary">Bulk Update</button>
    </form>


</div>

<script>
    document.getElementById('select-all').onclick = function() {
        var checkboxes = document.querySelectorAll('input[name="ids[]"]');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }
</script>
@endsection
