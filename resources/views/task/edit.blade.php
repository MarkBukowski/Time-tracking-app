@extends('layouts.content')

@section('data')

<div class="card-header">
    <h3>Edit task</h3>
</div>
<div class="card-body">
    <form method="POST" action="{{route('task.update',$task)}}">
        @csrf
        <div class="form-group">
            <label for="task_title">Title</label>
            <input class="form-control" type="text" name="task_title" value="{{ $task->title }}">
        </div>
        <div class="form-group">
            <label for="task_comment">Comment</label>
            <input class="form-control" type="text" name="task_comment" value="{{ $task->comment }}">
        </div>
        <div class="form-group">
            <label for="task_start">Start time</label>
            <input class="form-control" type="datetime-local" name="start_date" value="{{ $task->start_date }}">
            <small>When the task was started</small>
        </div>
        <div class="form-group">
            <label for="task_finish">Finish time</label>
            <input class="form-control" type="datetime-local" name="finish_date" value="{{ $task->finish_date }}">
            <small>When the task was finished</small>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Edit</button>
        <a class="btn btn-secondary mt-2" href="{{route('task.index', $task)}}">Cancel</a>
    </form>
</div>

@endsection

