@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"> All Categories</div>

                @if(session()->has('success'))
                <strong class="text-success">{{ session()->get('success') }}</strong>
                @endif

                @if(session()->has('error'))
                <strong class="text-danger">{{ session()->get('error') }}</strong>
                @endif

                <div class="card-body">
                  <a href="{{route('categories.create')}}" style="float: right" 
                  class="btn btn-sm btn-primary"> Add Category</a>
                    <table class="table">
                         <thead>
                           <tr>
                             <th scope="col">SL</th>
                             <th scope="col">Name</th>
                             <th scope="col">Action</th>
                           
                           </tr>
                         </thead>
                         <tbody>
                       
                    @foreach ($categories as $key=>$item)
                    <tr>
                      <td >{{++$key}}</td> 

                      <td>{{$item->CategoryName}}</td> 
                      
                      <td>
                        <a class="btn btn-sm btn-primary" href="{{route('categories.show', $item->id)}}"> View</a>
                        <a class="btn btn-sm btn-primary" href="{{route('categories.edit', $item->id)}}"> edit</a>
                     
                     <form action="{{route('categories.destroy',$item->id)}}" method="post">
                      @csrf
                      <input type="hidden" name="_method" value="DELETE">
                      <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                     </form>
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
