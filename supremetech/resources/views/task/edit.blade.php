@extends("layout.app")
@section("content")
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">New Task</h6>
    </div>
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Edit Task!</h1>
                        </div>
                        <form class="user" action="{{ route('tasks.update',['task'=>$task->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group ">
                                <input type="text" value="{{ $task->title }}" class="form-control form-control-user" name="title" />
                                @error('title')
                                {{ $message}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{ $task->description }}" class="form-control form-control-user" name="description" />
                                @error('description')
                                {{ $message}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{ $task->type }}" class="form-control form-control-user" name="type" />
                                @error('type')
                                {{ $message}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{ $task->status }}" class="form-control form-control-user" name="status" />
                                @error('status')
                                {{ $message}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{ $task->start_date }}" class="form-control form-control-user" name="start_date" />
                                @error('start_date')
                                {{ $message}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{ $task->due_date }}" class="form-control form-control-user" name="due_date" />
                                @error('due_date')
                                {{ $message}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <select name="assignee" class="form-control form-options">
                                    @foreach ($users as $item)
                                        <option {{  $item->id == $task->assignee ? 'selected' : ''}} value="{{ $item->id }}"  >{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('assignee')
                                {{ $message}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{ $task->estimate }}" class="form-control form-control-user" name="estimate" />
                                @error('estimate')
                                {{ $message}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{ $task->actual }}" class="form-control form-control-user" name="actual" />
                                @error('actual')
                                {{ $message}}
                                @enderror
                            </div>
                            @if (session('success'))
                            <div class="alert alert-success alert dismissible">
                                <button type="close" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                <h4><i class="icon fa fa-check"></i>Thông báo!!!</h4>
                                {{session('success')}}
                            </div>
                            @endif
                            <button type="submit" class="btn btn-primary btn-user btn-block">Edit Task</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection