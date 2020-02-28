<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $all_tasks = Task::all(); // select * from tasks

        //$all_tasks = Task::where('user_id',Auth::user()->id)->get();

        return view('Tasks.index')->with(['tasks' => $all_tasks]);

    }

    public function add(){

         return view('Tasks.add');
    }

    public function store(){
        // 1. Receive the data
            $task_name = $_POST['t_name'];
        //2. Initiate the model

            $task = new Task();

        // 3. Store the data

                $task->task_name = $task_name;
                $task->user_id = Auth::user()->id;

        //4. Save the data
             $task->save();


            return redirect('/task/list');

    }


    // mysite.com/task/delete/100
    // mysite.com/task/delete/150



    public function delete(Task $task_id){

        $task_id->delete();

        //1. Get the task to delete
       // $task_id = $_GET['id'];

//        //2. find it in your DB
//            $task = Task::find($task_id);
//
//        //3. Delete it
//
//            $task->delete();

        //2. Find and Delete

          //  Task::destroy($task_id);

        //3. Go back to your index page

        return redirect('/task/list');


    }

    public function update(Task $task){



        return view('Tasks.update')->with(['task'=>$task]);
//        return view('Tasks.update')->compact($task);
    }


    public function updateTask($id){

        //1. Receive the data to update
                  $task_name = $_POST['task_name'];
        //2. Find the task you want to update in the db

                  $task = Task::find($id);

        //3. Provide the updated values
                $task->task_name = $task_name;
        //4. Save the updated values

                  $task->save();

        //5. Redirect

        return redirect('/task/list');





    }

}
