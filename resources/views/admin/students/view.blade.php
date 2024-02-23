@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{ _('Show Page Student') }}
                    <a href="{{ route('students.index')}}" class="btn btn-sm btn-danger" style="float: right">All Students</a>
  
                  </div>

                @if(session()->has('success'))
                <strong class="text-success">{{ session()->get('success') }}</strong>
                @endif

                @if(session()->has('error'))
                <strong class="text-danger">{{ session()->get('error') }}</strong>
                @endif

                <div class="card-body">
                  
                    <table class="table">
                        <ul>
                            <li> Student ID : {{$student->class_id}}</li>
                            <li> Student Name :  {{$student->name}}</li>
                            <li> Student Roll :  {{$student->roll}}</li>
                            <li> Student Email :  {{$student->email}}</li>
                            <li> Student Phone :  {{$student->phone}}</li>
                        </ul>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
