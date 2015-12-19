<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class TasksController extends Controller
{
    public function getCreate($id){

        $project_id = $id;
        return view('tasks.create')->with('project_id', $project_id);
    }

    public function postCreate(Request $request){

        $this->validate(
            $request,
            [ 'description'=>'required|max:500',
              'year'=>'required',
              'month'=>'required',
              'day'=>'required']
        );

        $project_id = $request->project_id;
        $year = $request->year;
        $month = $request->month;
        $day = $request ->day;

        $task = new \App\Task();
        $task->project_id = $project_id;
        $task->description=$request->description;
        $task->due_date= Carbon::createFromDate($year, $month, $day);
        $task->save();

        \Session::flash('flash_message','Your task was added!');
        return \Redirect::action('TasksController@getShow', array($project_id));

    }

    public function getShow($project_id){

        $tasks = \App\Task::where('project_id', $project_id)->get();
        return view('tasks.show')->with('tasks',$tasks)->with('project_id',$project_id);
    }

    public function getEdit($id){
        $task = \App\Task::find($id);

        //checking if due date is set
        if(strcmp($task->due_date,'0000-00-00') !== 0) {
            $due_date = Carbon::parse($task->due_date);
        }
        else {
            $due_date = 'Due date is not set';
        }

        return view('tasks.edit')->with('task',$task)->with('due_date',$due_date);
    }

    public function postEdit(Request $request){

        $task = \App\Task::find($request->task_id);

        $task->description = $request->description;
        $task->completed=$request->completed;

        //getting year, month and day to save due date
        $year = $request->year;
        $month = $request->month;
        $day = $request ->day;
        dump($year);
        dump(strcmp($year,'')!==0);

        if( strcmp($year,'')!==0 &&
            strcmp($month,'')!==0 &&
            strcmp($day,'')!==0)
        {
        //saving updated task
            $task->description = $request->description;
            $task->completed = $request->completed;
            $task->due_date = Carbon::createFromDate($year, $month, $day);
        }

        $task->save();

        \Session::flash('flash_message','Your task was updated!');
        return redirect ('/tasks/edit/'.$request->task_id);
    }

    public function getConfirmDelete($id){

        $task =  \App\Task::find($id);
        return view('tasks.confirm-delete')->with('task',$task);
    }

    public function getDelete($id){

        $task=\App\Task::find($id);
        $project_id = $task->project_id;
        $task->delete();

        \Session::flash('flash_message','Your task was deleted.');
        return redirect('/tasks/show/'.$project_id);

    }

    public function getShowIncompleted($project_id){

        $tasks = \App\Task::where('project_id', $project_id)->where('completed','=','0')->get();
        return view('tasks.incomplete')->with('tasks',$tasks)->with('project_id',$project_id);

    }

    public function getShowCompleted($project_id){

        $tasks = \App\Task::where('project_id', $project_id)->where('completed','=','1')->get();
        return view('tasks.complete')->with('tasks',$tasks)->with('project_id',$project_id);
    }
}
