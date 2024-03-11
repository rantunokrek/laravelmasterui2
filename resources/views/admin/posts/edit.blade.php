@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
          
                <div class="card-header"> {{ _('Add New Category') }}
                  <a href="{{ route('subcategory.index')}}" class="btn btn-sm btn-danger" style="float: right">All Categories</a>

                </div>
                @if(session()->has('success'))
                <strong class="text-success">{{ session()->get('success') }}</strong>
                @endif
                @if(session()->has('error'))
                <strong class="text-danger">{{ session()->get('error') }}</strong>
                @endif
                <div class="card-body">
                  <form action="{{route('subcategory.update',$subcat->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputClassName1">Choose Category Name</label>
                      <select id="" class="form-control" name="category_id">
                        @foreach($categories as $item)
                          <option value="{{ $item->id }}" @if($item->id == $subcat->category_id) selected @endif>  {{ $item->CategoryName }}</option>
                        @endforeach
                      </select>  
                    </div>
                    <div class="form-group">
                      <label for="exampleInputClassName1">Sub Cat Name</label>
                      <input name="subcategory_name" type="text" value="{{($subcat->subcategory_name)}}" class="form-control  @error('subcategory_name') is-invalid @enderror" id="exampleInputClassName1" aria-describedby="ClassNameHelp" placeholder="Enter Sub Category Name" required>
                     @error('subcategory_name')
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
