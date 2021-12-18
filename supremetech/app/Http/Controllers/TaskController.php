<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =
            [
                [
                    'title' => 'Quyết lựm macbook',
                    'description' => 'Thực tập để được thành nhân viên chính thức',
                    'type' => '3 thằng 3 chiếc',
                    'status' => '1/4 chặng đường',
                    'start_date' => '2021/11/15',
                    'due_date' => '2022/02/15',
                    'assignee' => 'chính là tôi',
                    'estimate' => '3 tháng',
                    'actual' => '2 tháng rưỡi thuôi'
                ]
            ];
        return view("task/index", ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("task/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTaskRequest $request)
    {
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
        return view("task/show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view("task/edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateTaskRequest $request, $id)
    {
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
        return redirect()->back()->with('success', __("Xóa task " . $id . " thành công!!!"));
    }
}
