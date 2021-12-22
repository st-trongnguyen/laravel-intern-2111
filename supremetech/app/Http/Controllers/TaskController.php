<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use DateTime;
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
        $tasks = DB::table('tasks')->get();
        return view("task.index", ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = DB::table('users')->get();
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
        DB::table('tasks')->insert(
            [
                'title' => $request->title,
                'description' => $request->description,
                'type' => $request->type,
                'status' => $request->status,
                'start_date' => $request->start_date,
                'due_date' => $request->due_date,
                'assignee' => $request->assignee,
                'estimate' => $request->estimate,
                'actual' => $request->actual,
            ]
        );
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
        $task = DB::table('tasks')->where('id', $id)->first();
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
        $users = DB::table('users')->get();
        $task = DB::table('tasks')->where('id', $id)->first();
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
        DB::table('tasks')->where('id', $id)->update(
            [
                'title' => $request->title,
                'description' => $request->description,
                'type' => $request->type,
                'status' => $request->status,
                'start_date' => $request->start_date,
                'due_date' => $request->due_date,
                'assignee' => $request->assignee,
                'estimate' => $request->estimate,
                'actual' => $request->actual,
            ]
        );
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
        DB::table('tasks')->where('id', $id)->delete();
        return redirect()->back()->with('success', __("Xóa task " . $id . " thành công!!!"));
    }

    //Basic execution of the Query Builder statement
    public function more_query($id)
    {
        $user = DB::table('users')->where('name', 'Trọng')->first();
        var_dump($user);
        $user1 = DB::table('users')->find(3);
        var_dump($user1);
        $user2 = DB::table('users')->count();
        echo $user2;
        $user3 = DB::table('orders')->where('finalized', 1)->exists();
        echo $user3;
        $user4 =  DB::table('users')->join('tasks', 'users.id', '=', 'tasks.assignee')->get();
        dd($user4);
        $user5 =  DB::table('users')->join('tasks', 'users.id', '=', 'tasks.assignee')->where('users.id', $id)->get();
        dd($user5);
    }
}
