<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SubcatController extends Controller
{
    public function index()
    {
        $data = Subcategory::all();
        return view('admin.subcategory.index',compact('data'));

    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategory.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required|unique:subcategories|max:255',
         ]);
            $subcategory = new Subcategory;
            $subcategory->category_id = $request->category_id;
            $subcategory->subcategory_name = $request->subcategory_name;
            $subcategory->subcategory_slug=Str::of($request->subcategory_name)->slug('-');
          $subcategory->save();
          return redirect()->back()->with('success', 'successfully Inserted');
    }

    public function edit($subcategory)
    {
        $categories =Category::all();
        $subcat=DB::table('subcategories')->where('id',$subcategory)->first();
        return view('admin.subCategory.edit',compact('categories','subcat'));
    } 

    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = Str::of($request->subcategory_name)->slug('-');
        $subcategory->save();
    return redirect()->back()->with('success', 'successfully updated');
    }

    public function destroy($id)
    {
        DB::table('subcategories')->where('id',$id)->delete();
        return redirect()->back()->with('error', 'successfully Deleted');
    }
}
