@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Create Class Page</div>
                @if(session()->has('success'))
                <strong class="text-success">{{ session()->get('success') }}</strong>
                @endif
                @if(session()->has('error'))
                <strong class="text-danger">{{ session()->get('error') }}</strong>
                @endif
                <div class="card-body">
                  <form action="{{ route('class.update', $data->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputClassName1">Class Name</label>
                      <input name="class_name" type="text" value="{{ $data->class_name }}" class="form-control  @error('class_name') is-invalid @enderror" id="exampleInputClassName1" aria-describedby="ClassNameHelp" >
                      @error('class_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
         <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
