<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ProjectsController extends Controller
{
    public function getProject(Request $request) {
        $user = \Auth::user();
        $projects= \App\Project::where('user_id', $user->id)->get();
        return view('projects.index')->with('projects',$projects);
    }

    public function getCreate() {
        return view('projects.create');
    }

    public function postCreate(Request $request){
        $this->validate(
            $request,
            [ 'title'=>'required|max:50',
            'year'=>'required',
            'month'=>'required',
            'day'=>'required']
        );

        $year = $request->year;
        $month = $request->month;
        $day = $request ->day;
        $user = \Auth::user();
        $project = new \App\Project();
        $project->user_id = $user->id;
        $project->title=$request->title;
        $project->due_date= Carbon::createFromDate($year, $month, $day);
        $project->save();

        \Session::flash('flash_message','Your project was added!');
        return redirect('/projects');

}

public function getConfirmDelete($id){

    $project = \App\Project::find($id);
    return view('projects.confirm-delete')->with('projects',$project);

}

public function getDelete($id){

    $project=\App\Project::find($id);
    $project->delete();

    \Session::flash('flash_message','Your project was deleted.');
    return redirect('/projects');
}
}
