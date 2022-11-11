<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Jobs;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Jobs::with('categories')->get();
        return view('admin.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::select('id', 'name')->get();
        return view('admin.jobs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(),[
            'title' => 'required|string|min:3',
            'categories_id' => 'required|integer',
            'salary' => 'required|integer',
            'jd' => 'required|string',
            'jr' => 'required|string',
            'desc' => 'required|string',
            'end_date' => 'required|date',
        ]);

        if($v->fails()){
            return redirect()->route('admin.jobs.create')->withErrors($v->errors())->withInput($request->all());
        }
        try{
            $title = filter_var($request->title, FILTER_SANITIZE_STRING);
            $categories_id = filter_var($request->categories_id, FILTER_SANITIZE_NUMBER_INT);
            $salary = filter_var($request->salary, FILTER_SANITIZE_NUMBER_INT);
            $jd = filter_var($request->jd, FILTER_SANITIZE_STRING);
            $jr = filter_var($request->jr, FILTER_SANITIZE_STRING);
            $desc = filter_var($request->desc, FILTER_SANITIZE_STRING);
            $end_date = filter_var($request->end_date, FILTER_SANITIZE_STRING);
            $is_display = $request->has('is_display') ? '1' : '0';
            Jobs::create([
                'categories_id' => $categories_id,
                'title' => $title,
                'salary' => $salary,
                'job_description' => $jd,
                'job_requirement' => $jr,
                'description' => $desc,
                'end_date' => $end_date,
                'is_display' => $is_display,
            ]);
            return redirect()->route('admin.jobs.index')->with('message', ['type' => 'success', 'text' => 'Job created successfully']);
        }catch(Exception $e){
            dd($e->getMessage());
            return back()->with('message', ['type' => 'error', 'text' => 'Something went wrong']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Jobs::with('categories')->where('id', $id)->first();
        $employee=Jobs::with('employees')->where('id', $id)->first();
        return view('admin.jobs.show', compact('job','employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categories::select('id', 'name')->get();
        $job = Jobs::with('categories')->where('id', $id)->first();
        return view('admin.jobs.edit', compact('job', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $v = Validator::make($request->all(),[
            'title' => 'required|string|min:3',
            'categories_id' => 'required|integer',
            'salary' => 'required|integer',
            'jd' => 'required|string',
            'jr' => 'required|string',
            'desc' => 'required|string',
            'end_date' => 'required|date',
        ]);

        if($v->fails()){
            return back()->withErrors($v->errors());
        }
        try{
            $title = filter_var($request->title, FILTER_SANITIZE_STRING);
            $categories_id = filter_var($request->categories_id, FILTER_SANITIZE_NUMBER_INT);
            $salary = filter_var($request->salary, FILTER_SANITIZE_NUMBER_INT);
            $jd = filter_var($request->jd, FILTER_SANITIZE_STRING);
            $jr = filter_var($request->jr, FILTER_SANITIZE_STRING);
            $desc = filter_var($request->desc, FILTER_SANITIZE_STRING);
            $end_date = filter_var($request->end_date, FILTER_SANITIZE_STRING);
            $is_display = $request->has('is_display') ? '1' : '0';
            $job = Jobs::findOrFail($id);
            $job->categories_id = $categories_id;
            $job->title = $title;
            $job->salary = $salary;
            $job->job_description = $jd;
            $job->job_requirement = $jr;
            $job->description = $desc;
            $job->end_date = $end_date;
            $job->is_display = $is_display;
            $job->save();
            return redirect()->route('admin.jobs.index')->with('message', ['type' => 'success', 'text' => 'Job updated successfully']);
        }catch(Exception $e){
            // dd($e->getMessage());
            return back()->with('message', ['type' => 'error', 'text' => 'Something went wrong']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Jobs::destroy($id);
            return redirect()->route('admin.jobs.index')->with('message', ['type' => 'success', 'text' => 'Job updated successfully']);
        }catch(Exception $e){
            return back()->with('message', ['type' => 'error', 'text' => 'Something went wrong on delete']);
        }
    }
}
