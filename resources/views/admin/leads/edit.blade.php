@extends('admin.layouts.app')


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1>Edit Leads</h1>
          </div>
          <div class="col-sm-2">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">edit / lead</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
    <div class="container-fluid">

        <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                  <form method="POST" action="{{ route('leads.update', $lead->id) }}">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                          <label for="name">Name:</label>
                          <input type="text" class="form-control" id="name" name="name" value="{{ $lead->name }}" required>
                      </div>
                      <div class="form-group">
                          <label for="email">Email:</label>
                          <input type="email" class="form-control" id="email" name="email" value="{{ $lead->email }}" required>
                      </div></br>
                      <!-- Add other fields as needed -->
                      <button type="submit" class="btn btn-primary">Update</button>
                  </form>
                  </div>
              </div>
          </div>
        </div>
    </div>
</section>
  </div>

@endsection