@extends('layouts.content')

@section('data')

    <div class="card-header"><h1>Task: {{ $task->title }}</h1></div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item">Task comment: <b>{{ $task->comment }}</b></li>
            <li class="list-group-item">Added on: <b>{{ $task->created_at->toDayDateTimeString() }}</b></li>
            <li class="list-group-item">Edited on: <b>{{ $task->updated_at->toDayDateTimeString() }}</b></li>
            <li class="list-group-item">Started: <b>{{ $task->start_time->toDayDateTimeString() }}</b></li>
            <li class="list-group-item">Finished: <b>{{ $task->finish_time->toDayDateTimeString() }}</b></li>
            <li class="list-group-item">Added by: <b>{{ Auth::user()->name }}</b></li>
        </ul>
        <div class="pt-3">
            <a class="btn btn-primary" href="{{route('task.edit', $task)}}">Update</a>
            <a class="btn btn-secondary" href="{{route('task.index', $task)}}">Back</a>
        </div>
    </div>


@endsection
