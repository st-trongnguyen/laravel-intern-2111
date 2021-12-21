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
        $data = DB::table('tasks')->get();
        return view("task.index", ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_users = DB::table('users')->get();
        return view("task.create", ['data_user' => $data_users]);
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
            array(
                'title' => $request->title,
                'description' => $request->description,
                'type' => $request->type,
                'status' => $request->status,
                'start_date' => $request->start_date,
                'due_date' => $request->due_date,
                'assignee' => $request->assignee,
                'estimate' => $request->estimate,
                'actual' => $request->actual,
            )
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
        $data = DB::table('tasks')->where('id', $id)->get();
        return view("task.show", ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_users = DB::table('users')->get();
        $data_tasks = DB::table('tasks')->where('id', $id)->get();
        return view("task.edit", ['data_task' => $data_tasks, 'data_user' => $data_users]);
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
            array(
                'title' => $request->title,
                'description' => $request->description,
                'type' => $request->type,
                'status' => $request->status,
                'start_date' => $request->start_date,
                'due_date' => $request->due_date,
                'assignee' => $request->assignee,
                'estimate' => $request->estimate,
                'actual' => $request->actual,
            )
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
        echo $user2;
    }
}
