<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
      public function getCreate($id){

        $project_id = $id;
        //dump($project_id);

        return view('tasks.create_taskform')->with('project_id', $project_id);
    }

    public function postCreate(Request $request){
        $this->validate(
            $request,
            [ 'description'=>'required|max:100']
        );

        $project_id = $request->project_id;
        dump($project_id);
        $task = new \App\Task();
        $task->project_id = $project_id;
        $task->description=$request->description;
        $task->due_date=$request->due_date;
        $task->save();

        \Session::flash('flash_message','Your task was added!');
        return redirect('/tasks/$project_id');
    }

    public function getShow($project_id){


        //dump($project_id);
        $tasks = \App\Task::where('project_id', $project_id)->get();
        //dump($tasks);
        return view('tasks.tasks')->with('tasks',$tasks)->with('project_id',$project_id);
    }
}
