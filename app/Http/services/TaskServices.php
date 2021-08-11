<?php
namespace App\Http\services;

use App\Models\Task;
use Illuminate\Support\Facades\Session;

class TaskServices
{
    
    public function create($request)
    {
        $result = Task::create([
                'name' => (string) $request->input('name')
            ]);
        if ($result) {

            return back()->withSuccess('message.create_successful_task');
        }

        return back()->withError('message.create_Fail_task');
    }

    public function get()
    {
        $taskPagiPage = config('paginate.items_pagi_page');
        return Task::orderbyDesc('id')->paginate($taskPagiPage);
    }
}
