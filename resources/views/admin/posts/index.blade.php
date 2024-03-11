@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
                <div class="card-header"> All Posts</div>
                @if(session()->has('success'))
                <strong class="text-success">{{ session()->get('success') }}</strong>
                @endif

                @if(session()->has('error'))
                <strong class="text-danger">{{ session()->get('error') }}</strong>
                @endif

                <div class="card-body">
                  <a href="{{route('post.create')}}" style="float: right" 
                  class="btn btn-sm btn-primary"> Add post</a>
                    <table class="table">
                         <thead>
                           <tr>
                             <th scope="col">SL</th>
                             <th scope="col">Category</th>
                             <th scope="col">SubCategory</th>
                             <th scope="col">Author</th>
                             <th scope="col">Title</th>
                             <th scope="col">Published</th>
                             <th scope="col">Status</th>
                             <th scope="col">Action</th>
                           
                           </tr>
                         </thead>
                         <tbody>
                       
                    @foreach($posts as $key=>$item)
                    <tr>
                      <td >{{++$key}}</td> 

                      <td>{{$item->category->CategoryName}}</td> 
                      <td>{{$item->subcategory->subcategory_name}}</td> 
                      <td>{{$item->user->name}}</td> 
                      <td>{{$item->title}}</td> 
                      <td>{{$item->post_date}}</td> 
                      <td>
                        @if ($item->status==1)
                        <span class="badge badge-success">Active</span>
                        @else
                        <span class="badge badge-danger">Inactive</span>
                        @endif
                            
                       
                      </td> 
                      
                      <td>
  
                        <a class="btn btn-sm btn-primary" href="{{route('post.edit', $item->id)}}"> edit</a>
                        <a class="btn btn-sm btn-danger" href="{{route('post.destroy',$item->id)}}"> Delete</a>
                     
                   
                      </td>
                    </tr>
                    @endforeach
                         </tbody>
                       </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
