@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{ _('Show Page Student') }}
                    <a href="{{ route('subcategory.index')}}" class="btn btn-sm btn-danger" style="float: right">All Students</a>
  
                  </div>

                @if(session()->has('success'))
                <strong class="text-success">{{ session()->get('success') }}</strong>
                @endif

                @if(session()->has('error'))
                <strong class="text-danger">{{ session()->get('error') }}</strong>
                @endif

                <div class="card-body">
                  
                 

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
