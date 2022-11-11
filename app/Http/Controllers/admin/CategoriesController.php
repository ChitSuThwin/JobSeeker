<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Jobs;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Categories::with('jobs')->get();
        return view('admin.categories.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);
        if($v->fails()){
            return back()->withErrors($v->errors());
        }
        try{
            $name = filter_var($request->name, FILTER_SANITIZE_STRING);
            Categories::create([
                'name' => $name,
            ]);
            
            return back()->with(['message'=>['type' => 'success', 'text' => 'Category created successfully']]);
        }catch(Exception $e){
            dd($e->getMessage());
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Categories::where('id',$id)->select('name')->first();
        $dataa = collect($data)->all();
        return response($dataa);
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
        $v = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);
        if($v->fails()){
            return back()->withErrors($v->errors());
        }
        try{
            $name = filter_var($request->name, FILTER_SANITIZE_STRING);
            Categories::where('id', $id)->update([
                'name' => $name,
            ]);
            return back()->with('message',['type' => 'success', 'text' => 'Category updated successfully']);
        }catch(Exception $e){
            dd($e->getMessage());
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
        Categories::destroy($id);
        return back()->with('message',['type' => 'success', 'text' => 'Category deleted successfully']);
    }
}
