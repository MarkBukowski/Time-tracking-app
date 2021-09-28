@extends('layouts.content')

@section('data')

<div class="card-header">
    <h3>Task list</h3>
</div>
<div class="card-body">
    @if(count($tasks) > 0)
        <table class="table">
            <thead>
                <tr class="d-flex justify-content-around">
                    <th class="col-md-2 text-center" scope="col">Title</th>
                    <th class="col-md-3 text-center" scope="col">Comment</th>
                    <th class="col-md-3 text-center" scope="col">Completed in</th>
                    <th class="col-md-4 text-center" scope="col">Actions</th>
                </tr>
            </thead>
            @foreach ($tasks as $task)
                <tbody>
                    <tr class="list-group-item d-flex justify-content-around p-0">
                        <td class="col-md-2 text-center">{{$task->title}}</td>
                        <td class="col-md-3 text-center">{{$task->comment}}</th>
                        <td class="col-md-3 text-center">{{ ($task->start_time)->diffInMinutes($task->finish_time) }} minutes</td>
                        <td class="col-md-4 text-center justify-content-center d-flex">
                            <form method="POST" action="{{ route('task.destroy', $task) }}">
                                @csrf
                                <a href="{{ route('task.edit', $task) }}" class="btn btn-info btn-sm mr-1">Edit</a>
                                <a href="{{ route('task.show', $task) }}" class="btn btn-secondary btn-sm mr-1">Show</a>
                                <button type="submit" class="btn btn-danger btn-sm mr-1">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    <div>
        <a class="btn col-4 col-sm-3 col-md-2 mt-4 btn-secondary btn-sm float-right" href="{{route('task.pdf', $tasks)}}">Generate report</a>
    </div>
</div>
    @else
        <h4 class="text-center mt-4">No tasks created</h4>
    @endif
<div class="d-flex justify-content-center">{{ $tasks->links() }}</div>

@endsection
