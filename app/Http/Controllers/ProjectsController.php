<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class ProjectsController extends Controller
{
    public function getProject(Request $request) {
     $user = \Auth::user();
     dump($user->id);
     //$projects = \App\Project::orderby('id','DESC')->get();
     $projects= \App\Project::where('user_id', $user->id)->get();
    // dump($projects->toArray());
     return view('projects.index')->with('projects',$projects);
    }

    public function getCreate() {

      return view('projects.project');
    }

    public function postCreate(Request $request){
        $this->validate(
            $request,
            [ 'title'=>'required|max:50']
        );
        $user = \Auth::user();
        $project = new \App\Project();
        $project->user_id = $user->id;
        $project->title=$request->title;
        $project->due_date=$request->due_date;
        $project->save();

        \Session::flash('flash_message','Your project was added!');
        return redirect('/projects');

    }


}
