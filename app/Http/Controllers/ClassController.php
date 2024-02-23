<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
   public function classIndex( ){
      $class = DB::table('classes')->get();
    return view('admin.classes.index',compact('class'));
   }

   public function classCreate( ){
    return view('admin.classes.create');
   }

   public function classStore(Request $request)
   {
     $request->validate([
           'class_name' => 'required|unique:classes',
          
       ]);

   $data = array(
      'class_name' => $request->class_name,
    );
    DB::table('classes')->insert($data);
       return redirect()->back()->with('success', 'successfully insert Data');
   }

public function delete($id){
   DB::table('classes')->where('id', $id)->delete();
   return redirect()->back()->with('success', 'Deleted successfully');

}
public function edit($id)
{
   $data = DB::table('classes')->where('id', $id)->first();
   return view('admin.classes.edit', compact('data'));
}

public function update(Request $request, $id)
{
   $request->validate([
      'class_name' => 'required',
   ]);
   $data = array(
      'class_name' => $request->class_name,
   );
  DB::table('classes')->where('id', $id)->update($data);
  return redirect()->back()->with('success', 'updated successfully');
}




}
