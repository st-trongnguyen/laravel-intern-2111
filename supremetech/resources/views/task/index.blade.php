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
                        <th>Title</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Start_date</th>
                        <th>Due_date</th>
                        <th>Assignee</th>
                        <th>Estimate</th>
                        <th>Actual</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $value)
                    <tr>
                        <td>{{ $value->title}}</td>
                        <td>{{ $value->description }}</td>
                        <td>{{ $value->type }}</td>
                        <td>{{ $value->status }}</td>
                        <td>{{ $value->start_date }}</td>
                        <td>{{ $value->due_date }}</td>
                        <td>{{ $value->assignee }}</td>
                        <td>{{ $value->estimate }}</td>
                        <td>{{ $value->actual }}</td>
                        <td>
                            <a href="{{ route('tasks.show',[ 'task' => $value->id ]) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-sm text-white-50"></i> Show </a>
                            <a href="{{ route('tasks.edit',[ 'task' => $value->id ]) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-sm text-white-50"></i> Edit </a>
                            <form action="{{ route('tasks.destroy',['task'=>$value->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Delete </a>
                            </form>
                        </td>
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