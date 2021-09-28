<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Generate PDF</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>

    <table class="table">
        <thead>
            <tr class="table-primary">
                <td>Title</td>
                <td>Comment</td>
                <td>Date added</td>
                <td>Start date</td>
                <td>Finish date</td>
                <td>Time spent</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->comment }}</td>
                    <td>{{ ($task->created_at) }}</td>
                    <td>{{ ($task->start_time->toDayDateTimeString()) }}</td>
                    <td>{{ ($task->finish_time->toDayDateTimeString()) }}</td>
                    <td>{{ ($task->start_time)->diffInMinutes($task->finish_time) }} minutes</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        Total time spent: {{ $totalTime }} minutes
    </div>
    <small>Or {{ $totalTimeDays }}</small>
</body>

</html>
















    <div class="card-header">
    <h3>Task list</h3>
</div>
<div class="card-body">
    <table class="table">
        <thead>
        <tr class="d-flex justify-content-around">
            <th class="col-md-2 text-center" scope="col">Title</th>
            <th class="col-md-3 text-center" scope="col">Comment</th>
            <th class="col-md-3 text-center" scope="col">Completed in</th>
            <th class="col-md-4 text-center" scope="col">Actions</th>
        </tr>
        </thead>
    </table>
    @foreach ($tasks as $task)
        <div class="list-group-item d-flex justify-content-around">
            <div class="col-md-2 text-center">{{$task->title}}</div>
            <div class="col-md-3 text-center">{{$task->comment}}</div>
            <div class="col-md-3 text-center">
                @if(($task->start_time)->diffInMinutes($task->finish_time) > 0)
                    {{ ($task->start_time)->diffInMinutes($task->finish_time) }} minutes
                @endif
            </div>
            <div class="col-md-4 text-center justify-content-center d-flex">
                <form method="POST" action="{{ route('task.destroy', $task) }}">
                    @csrf
                    <a href="{{ route('task.edit', $task) }}" class="btn btn-info btn-sm mr-1">Edit</a>
                    <a href="{{ route('task.show', $task) }}" class="btn btn-secondary btn-sm mr-1">Show</a>
                    <button type="submit" class="btn btn-danger btn-sm mr-1">Delete</button>
                </form>

            </div>
        </div>
    @endforeach

</div>

