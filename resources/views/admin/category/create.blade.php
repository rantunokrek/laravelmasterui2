@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
          
                <div class="card-header"> {{ _('Add New Category') }}
                  <a href="{{ route('categories.index')}}" class="btn btn-sm btn-danger" style="float: right">All Categories</a>

                </div>
                @if(session()->has('success'))
                <strong class="text-success">{{ session()->get('success') }}</strong>
                @endif
                @if(session()->has('error'))
                <strong class="text-danger">{{ session()->get('error') }}</strong>
                @endif

                <div class="card-body">
                  <form action="{{route('categories.store')}}" method="post" >
                    @csrf
             
              
                    <div class="form-group">
                      <label for="exampleInputClassName1">Category Name</label>
                      <input name="CategoryName" type="text" value="{{old('CategoryName')}}" class="form-control  @error('CategoryName') is-invalid @enderror" id="exampleInputClassName1" aria-describedby="ClassNameHelp" placeholder="Enter CategoryName" required>
                     @error('CategoryName')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror 
                    </div>

       
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
