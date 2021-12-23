<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::TaskNotDeleted();
        return view("task.index", ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        return view("task.create", ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        Task::create($request->except(['_token']));
        return redirect()->back()->with('success', __("Thêm thành công!!!"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::GetTask($id);
        return view("task.show", ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::get();
        $task = Task::GetTask($id);
        return view("task.edit", ['task' => $task, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
        Task::GetTask($id)->update($request->except(['_token', '_method']));
        return redirect()->back()->with('success', __("Sửa task " . $id . " thành công!!!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::destroy($id);
        return redirect()->back()->with('success', __("Xóa task " . $id . " thành công!!!"));
    }

    //Basic execution of the Query Builder statement
    public function more_query()
    {
        $user = User::UserName("Trọng");
        var_dump($user);
        $user1 = User::find(3);
        var_dump($user1);
        $user2 = User::count();
        echo $user2;
        $user4 =  User::UserJoinTask();
        dd($user4);
        $user5 =  User::UserWithIdJoinTask(5);
        dd($user5);
    }
}
