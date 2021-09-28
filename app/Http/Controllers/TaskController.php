<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\CarbonInterval;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $tasks = Task::where('user_id', '=', $request->user()->id)->paginate(5);
        return view('task.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Task $task)
    {
        return view('task.create', ['task' => $task]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
            'task_title' => ['required', 'max:64'],
            'task_comment' => ['required', 'max:512'],
            'start_date' => ['required'],
            'finish_date' => ['required'],
            ],
            [
                'task_title.max' => 'Title text too long. Try with less than 64 characters',
                'task_comment.max' => 'Comment text too long. Try with less than 512 characters',
            ]
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $task = new Task();
        $task->title = $request->task_title;
        $task->comment = $request->task_comment;
        $task->start_time = $request->start_date;
        $task->finish_time = $request->finish_date;
        $task->user_id = $request->user()->id;
        $task->save();
        return redirect()->route('task.index')->with('success', 'Task added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {

        return view('task.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('task.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $validator = Validator::make($request->all(),
            [
                'task_title' => ['required', 'max:64'],
                'task_comment' => ['required', 'max:512'],
                'start_date' => ['required'],
                'finish_date' => ['required'],
            ],
            [
                'task_title.max' => 'Title text too long. Try with less than 64 characters',
                'task_comment.max' => 'Comment text too long. Try with less than 512 characters',
            ]
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $task->title = $request->task_title;
        $task->comment = $request->task_comment;
        $task->start_time = $request->start_date;
        $task->finish_time = $request->finish_date;
        $task->user_id = $request->user()->id;
        $task->save();
        return redirect()->route('task.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('task.index')->with('success', 'Task deleted successfully.');
    }

    public function pdf(Request $request)
    {
        $tasks = Task::all()
            ->where('user_id', '=', $request->user()->id)
            ->sortByDesc('created_at');

        $totalTime = 0;
        foreach ($tasks as $task) {
            $totalTime += ($task->start_time)->diffInMinutes($task->finish_time);
        }
        $totalTimeDays = CarbonInterval::minutes($totalTime)->cascade()->forHumans();

        view()->share('tasks', $tasks);
        $pdf = PDF::loadView('pdf', ['tasks' => $tasks, 'totalTime' => $totalTime, 'totalTimeDays' => $totalTimeDays]);
        return $pdf->download(now().'.pdf');
    }

}
