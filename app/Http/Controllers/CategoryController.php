<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function __construct()
 {
     $this->middleware('auth',['except'=>'show']);
 }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::latest()->get();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category'=>'required',
            'job'=>'required',
        ]);
        $category=new Category();
        $user=Auth::user();
        $category->user()->associate(Auth::id());
        $category->category=$request->category;
        $category->slug=Str::slug($request->job) ;
        $category->job=$request->job;
        if($category->save()){
            return redirect()->route('category.index');

        }
        else{
            return redirect()->route('category.create');
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
        $category=Category::findOrFail($id);
        $jobs=$category->jobs()->latest()->paginate(4);
   return view('category.show')->with(compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories=Category::latest()->get();
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'category'=>'required',
            'job'=>'required',
        ]);
        $category->update($request->only('category','job','user_id'));
        return redirect('/category')->with('success','Category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success','Category Has been Deleted');

    }
}
