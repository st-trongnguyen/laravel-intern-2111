@extends("layout.app")
@section("content")
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTable Task</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if (session('success'))
            <div class="alert alert-success alert dismissible">
                <button type="close" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-check"></i>Thông báo!!!</h4>
                {{session('success')}}
            </div>
            @endif
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $value)
                    <tr>
                        <td>{{ $value->name}}</td>
                        <td>{{ $value->email }}</td>
                        <td>
                            <a href="{{ route('users.show',[ 'user' => $value->id ]) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-sm text-white-50"></i> Detail User </a>                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2 mb-0 text-gray-400"></h1>
        <a href="{{ url('tasks/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-sm text-white-50"></i> Add</a>
    </div>
</div>
@endsection