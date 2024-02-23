@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> All Students</div>

                @if(session()->has('success'))
                <strong class="text-success">{{ session()->get('success') }}</strong>
                @endif

                @if(session()->has('error'))
                <strong class="text-danger">{{ session()->get('error') }}</strong>
                @endif

                <div class="card-body">
                  <a href="{{route('students.create')}}" style="float: right" 
                  class="btn btn-sm btn-primary"> Add Student</a>
                    <table class="table">
                         <thead>
                           <tr>
                             <th scope="col">SL</th>
                             <th scope="col">Roll</th>
                             <th scope="col">Name</th>
                             <th scope="col">Phone</th>
                             <th scope="col">Email</th>
                             <th scope="col">Addresh</th>
                             <th scope="col">Class Name</th>
                        
                             <th scope="col">Action</th>
                           
                           </tr>
                         </thead>
                         <tbody>
                       
                    @foreach ($students as $key=>$item)
                    <tr>
                      <td >{{++$key}}</td> 
                      <td>{{$item->roll}}</td> 
                      <td>{{$item->name}}</td> 
                      <td>{{$item->phone}}</td> 
                      <td>{{$item->email}}</td> 
                      <td>{{$item->address }}</td> 
                      <td>{{$item->class_name }}</td> 
                    
                    
                      
                      <td>
                        <a class="btn btn-sm btn-primary" href="{{route('students.show', $item->id)}}"> View</a>
                        <a class="btn btn-sm btn-primary" href="{{route('students.edit', $item->id)}}"> edit</a>
                     
                     <form action="{{route('students.destroy',$item->id)}}" method="post">
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
