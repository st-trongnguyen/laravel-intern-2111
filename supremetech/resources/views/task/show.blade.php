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
                                <input type="text" readonly value="{{ $task->title }}" class="form-control form-control-user" name="title" />
                            </div>
                            <div class="form-group">
                                <input type="text" readonly value="{{ $task->description }}" class="form-control form-control-user" name="description" />
                            </div>
                            <div class="form-group">
                                <input type="text" readonly value="{{ $task->type }}" class="form-control form-control-user" name="type" />
                            </div>
                            <div class="form-group">
                                <input type="text" readonly value="{{ $task->status }}" class="form-control form-control-user" name="status" />
                            </div>
                            <div class="form-group">
                                <input type="text" readonly value="{{ $task->start_date }}" class="form-control form-control-user" name="start_date" />
                            </div>
                            <div class="form-group">
                                <input type="text" readonly value="{{ $task->due_date }}" class="form-control form-control-user" name="due_date" />
                            </div>
                            <div class="form-group">
                                <input type="text" readonly value="{{ $task->assignee }}" class="form-control form-control-user" name="assignee" />
                            </div>
                            <div class="form-group">
                                <input type="text" readonly value="{{ $task->estimate }}h" class="form-control form-control-user" name="estimate" />
                            </div>
                            <div class="form-group">
                                <input type="text" readonly value="{{ $task->actual }}h" class="form-control form-control-user" name="actual" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection