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
        //dump($project_id);

        return view('tasks.create_taskform')->with('project_id', $project_id);
    }

    public function postCreate(Request $request){
         $this->validate(
            $request,
            [ 'description'=>'required|max:100',
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

        //dump($project_id);
        $tasks = \App\Task::where('project_id', $project_id)->get();
        //$created_at = Carbon::parse($tasks->created_at)->toFormattedDateString();
    //    $due_date = $created_at->toFormattedDateString();

        return view('tasks.tasks')->with('tasks',$tasks)->with('project_id',$project_id);
    }

    public function getEdit($id){
        $task = \App\Task::find($id);
        //dump($task->due_date);
        dump(strcmp($task->due_date,'0000-00-00') !== 0);
        //if the due date is not set
        if(strcmp($task->due_date,'0000-00-00') !== 0) {
            $due_date = Carbon::parse($task->due_date);
        //    $due_date = $task->due_date;
        }
        else {
            $due_date = 'Due date is not set';
        }

        return view('tasks.edit')->with('task',$task)->with('due_date',$due_date);
    }

    public function postEdit(Request $request){
        $task = \App\Task::find($request->task_id);
        dump($task->description);
        $task->description = $request->description;
        $task->completed=$request->completed;

        //due date info
        $year = $request->year;
        $month = $request->month;
        $day = $request ->day;
        dump($year !== '' || $month !== '' || $day !== '');
    //    dump($year,$month,$day);
        if($year !== '' || $month !== '' || $day !== ''){
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
        dump($task->id);
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
        $tasks = \App\Task::where('project_id', $project_id,'completed')->get();

    }
}
