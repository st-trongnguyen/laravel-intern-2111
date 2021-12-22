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
                            <h1 class="h4 text-gray-900 mb-4">Create New Task!</h1>
                        </div>
                        <form class="user" action="{{ route('tasks.store') }}" method="POST">
                            @csrf
                            <div class="form-group ">
                                <input type="text" value="{{ old('title') }}" placeholder="Title" class="form-control form-control-user" name="title" />
                                @error('title')
                                {{ $message}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{ old('description') }}" placeholder=" Description" class="form-control form-control-user" name="description" />
                                @error('description')
                                {{ $message}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{ old('type') }}" placeholder=" Type" class="form-control form-control-user" name="type" />
                                @error('type')
                                {{ $message}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{ old('status') }}" placeholder=" Status" class="form-control form-control-user" name="status" />
                                @error('status')
                                {{ $message}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{ old('start_date') }}" placeholder=" Start Date" class="form-control form-control-user" name="start_date" />
                                @error('start_date')
                                {{ $message}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{ old('due_date') }}" placeholder=" Due Date" class="form-control form-control-user" name="due_date" />
                                @error('due_date')
                                {{ $message}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <select name="assignee" class="form-control form-options">
                                    <option value=""  >Select User</option>
                                    @foreach ($users as $item)
                                        <option value="{{ $item->id }}"  >{{ $item->name }}</option>
                                    @endforeach
                                </select>                                
                                @error('assignee')
                                {{ $message}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{ old('estimate') }}" placeholder=" Estimate" class="form-control form-control-user" name="estimate" />
                                @error('estimate')
                                {{ $message}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{ old('actual') }}" placeholder=" Actual" class="form-control form-control-user" name="actual" />
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
                            <button type="submit" class="btn btn-primary btn-user btn-block">Add New</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection