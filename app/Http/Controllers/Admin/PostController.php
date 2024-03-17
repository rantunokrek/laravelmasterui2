<?php

namespace App\Http\Controllers\Admin;

use Image;
use File;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

      public function index()
    {
         $posts  = Post::all();
          // <--use 2 --> $posts = DB::table('posts')
          // ->leftjoin('categories', 'posts.category_id','categories.id')
          // ->leftjoin('subcategories', 'posts.subcategory_id','subcategories.id')
          // ->leftjoin('users', 'posts.user_id','users.id')
          // ->select('posts', 'categories.CategoryName','subcategories.subcategory_name','users.name')
          // ->get();
        return view('admin.posts.index',compact('posts'));
    }

    public function create()
    {
          $category = Category::all();
        return view('admin.posts.create',compact('category'));
    }

    public function store(Request $request)
    {
      $validated = $request->validate([
        'subcategory_id' => 'required',
        'title' => 'required',
        'tags' => 'required',
        'description' => 'required',

      ]);
          $categoryid = DB::table('subcategories')->where('id', $request->subcategory_id)->first()->category_id;
          $slug=Str::of($request->title)->slug('-');
          $data=array();
          $data['category_id']=$categoryid;
          $data['subcategory_id']=$request->subcategory_id;
          $data['title']=$request->title;
          $data['slug']= $slug;
          $data['post_date']=$request->post_date;
          $data['tags']=$request->tags;
          $data['description']=$request->description;
          $data['user_id']=Auth::id();
          $data['status']=$request->status;
              $photo = $request->image;
          if ($photo) {
            $photoname = $slug.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(600,400)->save('public/media/'.$photoname);
            $data['image']='public/media/'.$photoname;
            DB::table('posts')->insert($data);
            // $notifiaction = array('message' => 'Category post Inserted', 'alert-type' => 'success');
            // return redirect()->back()->with($notifiaction);
            return redirect()->back()->with('success', 'Inserted successfully ');
          }else{
            // without image inserted
            DB::table('posts')->insert($data);
            // $notifiaction = array('message' => 'Category post Inserted', 'alert-type' => 'success');
            // return redirect()->back()->with($notifiaction);
            return redirect()->back()->with('success', 'Inserted successfully ');
          }
     
    }

    public function destroy($id)
    {
          $post = Post::find($id);
          if (File::exists($post->image)) {
              File::delete($post->image);
          }
          $post->delete();

          
          return redirect()->back()->with('error', 'Deleted successfully ');
      
    }

    public function edit($id)
    {
          $category = Category::all();
          $post = Post::find($id);
        return view('admin.posts.edit',compact('category','post'));
    }


    public function update(Request $request,$id)
    {
      $validated = $request->validate([
        'subcategory_id' => 'required',
        'title' => 'required',
        'tags' => 'required',
        'description' => 'required',

      ]);
          $categoryid = DB::table('subcategories')->where('id', $request->subcategory_id)->first()->category_id;
          $slug=Str::of($request->title)->slug('-');
          $data=array();
          $data['category_id']=$categoryid;
          $data['subcategory_id']=$request->subcategory_id;
          $data['title']=$request->title;
          $data['slug']= $slug;
          $data['post_date']=$request->post_date;
          $data['tags']=$request->tags;
          $data['description']=$request->description;
          $data['user_id']=Auth::id();
          $data['status']=$request->status;
              $photo = $request->image;
          if ($photo) {

            if (File::exists($request->old_image)) {
              File::delete($request->old_image);
              
            }
            $photoname = $slug.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(600,400)->save('public/media/'.$photoname);
            $data['image']='public/media/'.$photoname;
            DB::table('posts')->where('id', $id)->update($data);
          
            return redirect()->route('post.index')->with('success', 'Inserted successfully ');
          }else{
            // without image inserted
             $data['image'] = $request->old_image;
             DB::table('posts')->where('id', $id)->update($data);
          
            return redirect()->route('post.index')->with('success', 'Inserted successfully ');
          }
     
    }




}
