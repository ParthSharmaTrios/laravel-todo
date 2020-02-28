<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>

<div class="container">
    <h2>List of all tasks({{count($tasks)}})</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Task</th>
            <th>User</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($tasks as $t)
        <tr>
            <td>{{$t->id}}</td>
            <td>{{$t->task_name}}</td>
            <td>
                @php
                    $user = \App\User::find($t->user_id);
                @endphp

{{--                {{$t->user_id}}--}}
                {{ $user->name }}

            </td>
            <td>{{$t->created_at->diffForHumans()}}</td>
            <td>
                @if(Auth::user()->id == $t->user_id)
                    <a href="/task/delete/{{$t->id}}" class="btn btn-danger">X</a>
                    <a href="/task/update/{{$t->id}}" class="btn btn-primary">Update</a>
                @endif
            </td>
{{--            <td><a href="/task/delete?id={{$t->id}}" class="btn btn-danger">X</a></td>--}}
        </tr>
        @endforeach

        </tbody>
    </table>
</div>

</body>
</html>
