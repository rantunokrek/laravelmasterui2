@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
                <div class="card-header"> All Categories</div>
                @if(session()->has('success'))
                <strong class="text-success">{{ session()->get('success') }}</strong>
                @endif

                @if(session()->has('error'))
                <strong class="text-danger">{{ session()->get('error') }}</strong>
                @endif

                <div class="card-body">
                  <a href="{{route('subcategory.create')}}" style="float: right" 
                  class="btn btn-sm btn-primary"> Add SubCategory</a>
                    <table class="table">
                         <thead>
                           <tr>
                             <th scope="col">SL</th>
                             <th scope="col">SubCatName</th>
                             <th scope="col">SubCatName</th>
                             <th scope="col">Sub Slug</th>
                             <th scope="col">Action</th>
                           
                           </tr>
                         </thead>
                         <tbody>
                       
                    @foreach($data as $key=>$item)
                    <tr>
                      <td >{{++$key}}</td> 

                      <td>{{$item->category->CategoryName}}</td> 
                      <td>{{$item->subcategory_name}}</td> 
                      <td>{{$item->subcategory_slug}}</td> 
                      
                      <td>
  
                        <a class="btn btn-sm btn-primary" href="{{route('subcategory.edit', $item->id)}}"> edit</a>
                        <a class="btn btn-sm btn-danger" href="{{route('subcategory.destroy',$item->id)}}"> Delete</a>
                     
                   
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
