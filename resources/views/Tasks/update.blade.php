<html>
<head>
    <title > Update Page</title>
</head>
<body>

<h1>Update Your Task</h1>
<form action="/task/update/{{$task->id}}" method="post">
    @csrf

    <input type="text" name="task_name" value="{{$task->task_name}}" >

    <input type="submit">

</form>
</body>
</html>
