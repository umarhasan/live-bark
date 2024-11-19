@extends('admin.layouts.app')


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1>Company List</h1>
          </div>
          <div class="col-sm-2">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Company</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="card-header">

                <!-- <a class="btn btn-success" href="{{ route('package.create') }}"> Create New Package</a> -->
                <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">Add Company</a>
                <!-- <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a> -->
                </div>
              <div class="card-body">
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if($companies)

                  @foreach($companies as $key => $user)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if(!empty($user))
                            <?php $roles = $user->getRoleNames(); ?>
                            <label class="badge bg-label-primary me-1">{{ $roles[0] }}</label>
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('companies.show',$user->id) }}"
                                    ><i class="bx bx-show-alt me-1"></i> View</a>
                                <a class="dropdown-item" href="{{ route('companies.edit',$user->id) }}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <form action="{{ route('companies.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item"><i class="bx bx-trash-alt me-1"></i> Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                  @endforeach
                  @endif
                  </tbody>

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection

