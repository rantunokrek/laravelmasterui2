<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
         $categories = DB::table('categories')->get();

         return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=DB::table('categories')->get();
        return view('admin.category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validated = $request->validate([
           
            'CategoryName' => 'required|unique:categories|max:255',
       
         ]);
// method 1
//   $category = new Category;
//   $category->CategoryName = $request->CategoryName;
//   $category->categorySlug=Str::of($request->CategoryName)->slug('-');
//     $category->save();
//method 2
       Category::insert([
        'CategoryName' => $request->CategoryName,
        'categorySlug' => Str::of($request->CategoryName)->slug('-'),
   
       ]);
    return redirect()->back()->with('success', 'Inserted successfully ');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories=DB::table('categories')->find($id);
        return view('admin.category.view',compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=DB::table('categories')->where('id',$id)->first();
        return view('admin.category.edit',compact('category'));
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
       $category = Category::find($id);
    //    method 1
    //    $category->update([
    //     'CategoryName' => $request->CategoryName,
    //     'categorySlug' => Str::of($request->CategoryName)->slug('-'),
   
    //    ]);
    // return redirect()->back()->with('success', 'updated successfully ');
    // method 2
    $category->CategoryName = $request->CategoryName;
    $category->categorySlug = Str::of($request->CategoryName)->slug('-');
    $category->save();
    return redirect()->back()->with('success', 'updated successfully ');

      

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('categories')->where('id',$id)->delete();
        return redirect()->back()->with('error', 'successfully Deleted');
    }
}
