<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFormRequest;
use App\Http\services\TaskServices;
use App\Models\Task;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskServices $taskService)
    {
        $this->taskService = $taskService;
    }

    public function create()
    {
        //
    }

    public function store(CreateFormRequest $request)
    {
        $this->taskService->create($request);

        return redirect()->back();
    }

    public function index(){
        return view('tasks', [
            'tasks' => $this->taskService->get()
        ]);
    }

    public function destroy(Task $task)
    {
        $result = $task->delete();

        if ($result) {
                    return back()->withSuccess('message.delete_successful_task');
                }
        
                return back()->withError('message.delete_fail_task');
    }
}
