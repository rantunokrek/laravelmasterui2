@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
          
                <div class="card-header"> {{ _('Edite Page Student') }}
                  <a href="{{ route('students.index')}}" class="btn btn-sm btn-danger" style="float: right">All Students</a>

                </div>
                @if(session()->has('success'))
                <strong class="text-success">{{ session()->get('success') }}</strong>
                @endif
                @if(session()->has('error'))
                <strong class="text-danger">{{ session()->get('error') }}</strong>
                @endif

                <div class="card-body">
                  <form action="{{route('students.update',$student->id)}}" method="post" >
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                      <label for="exampleInputClassName1">Class Name</label>
                      <select id="" class="form-control" name="class_id">
                        @foreach($classes as $item)
                          <option value="{{ $item->id }}"  @if($item->id == $student->class_id) selected : @endif>  {{ $item->class_name }} </option>
                        @endforeach
                      </select>  
                    </div>
              
                    <div class="form-group">
                      <label for="exampleInputClassName1">Student Name</label>
                      <input name="name" type="text" value="{{$student->name}}" class="form-control  @error('name') is-invalid @enderror" id="exampleInputClassName1" aria-describedby="ClassNameHelp" placeholder="Enter Student Name" required>
                     @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror 
                    </div>

                    <div class="form-group">
                      <label for="exampleInputClassName1">Student Roll</label>
                      <input name="roll" type="text" value="{{$student->roll}}" class="form-control  @error('roll') is-invalid @enderror" id="exampleInputClassName1" aria-describedby="ClassNameHelp" placeholder="Enter Student roll" required>
                     @error('roll')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror 
                    </div>

                    <div class="form-group">
                      <label for="exampleInputClassName1">Phone</label> 
                      <input name="phone" type="text" value="{{$student->phone}}" class="form-control  @error('phone') is-invalid @enderror" id="exampleInputClassName1" aria-describedby="ClassNameHelp" placeholder="Enter phone Number" required>
                     @error('phone')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                     </div>

                    <div class="form-group">
                      <label for="exampleInputClassName1">email</label>
                      <input name="email" type="text" value="{{$student->email}}" class="form-control  @error('email') is-invalid @enderror" id="exampleInputClassName1" aria-describedby="ClassNameHelp" placeholder="Enter email " required>
                     @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="exampleInputClassName1">Address</label>
                      <input name="address" value="{{$student->address}}" type="text" class="form-control  @error('address') is-invalid @enderror" id="exampleInputClassName1" aria-describedby="ClassNameHelp" placeholder="Enter address" required>
                     @error('address')
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
