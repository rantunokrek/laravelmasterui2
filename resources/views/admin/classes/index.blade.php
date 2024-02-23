@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> All Classes</div>
                @if(session()->has('success'))
                <strong class="text-success">{{ session()->get('success') }}</strong>
                @endif
                @if(session()->has('error'))
                <strong class="text-danger">{{ session()->get('error') }}</strong>
                @endif
                <div class="card-body">
                  <a href="{{route('class.create')}}" style="float: right" class="btn btn-sm btn-primary"> Add Class</a>
                    <table class="table">
                         <thead>
                           <tr>
                             <th scope="col">Id</th>
                             <th scope="col">Class name</th>
                         
                             <th scope="col">Action</th>
                           </tr>
                         </thead>
                         <tbody>
                       
                    @foreach ($class as $key=>$item)
                    <tr>
                      <td >{{++$key}}</td>
                      <td>{{$item->class_name}}</td>
                      
                      <td>
                        <a class="btn btn-sm btn-primary" href="{{route('class.edit',$item->id)}}"> edit</a>
                     
                       <a class="btn btn-sm btn-danger" href="{{route('class.delete',$item->id)}}"> delete</a>
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
