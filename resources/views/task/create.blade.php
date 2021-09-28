@extends('layouts.content')

@section('data')

    <div class="card-header">
        <h3>Create new task</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{route('task.store')}}">
            @csrf
            <div class="form-group">
                <label for="task_title">Title</label>
                <input class="form-control" type="text" name="task_title" value="{{old('task_title')}}">
            </div>
            <div class="form-group">
                <label for="task_comment">Comment</label>
                <input class="form-control" type="text" name="task_comment" value="{{old('task_comment')}}">
            </div>
            <div class="form-group">
                <label for="task_start">Start time</label>
                <input class="form-control" type="date" name="start_date"  value="{{old('start_date')}}">
                <input class="form-control" type="time" name="start_time"  value="{{old('start_time')}}">
                <small>When the task was started</small>
            </div>
            <div class="form-group">
                <label for="task_finish">Finish time</label>
                <input class="form-control" type="date" name="finish_date"  value="{{old('finish_date')}}">
                <input class="form-control" type="time" name="finish_time"  value="{{old('finish_time')}}">
                <small>When the task was finished</small>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Create</button>
            <a class="btn btn-secondary mt-2" href="{{route('task.index', $task)}}">Cancel</a>
        </form>
    </div>

@endsection
