@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
 <!-- general form elements -->
 <div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Quick Example</h3>
  </div>
  <!-- /.card-header -->
  <!--  -->

  @if(session()->has('success'))
  <strong class="text-success">{{ session()->get('success') }}</strong>
  @endif
  @if(session()->has('error'))
  <strong class="text-danger">{{ session()->get('error') }}</strong>
  @endif
  <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Post Title</label>
        <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Category</label>
        <select id="" class="form-control" name="subcategory_id">
          @foreach($category as $item)
          @php
          $subcategories = DB::table('subcategories')->where('category_id',$item->id)->get();
          @endphp
            <option disabled ="" class="text-info"> {{ $item->CategoryName }}</option>
            @foreach($subcategories as $sub)
            <option value="{{ $sub->id }}">--- {{ $sub->subcategory_name }}</option>
            @endforeach
          @endforeach
        </select>      
    
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Post Date</label>
        <input type="date" name="post_date"  class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Tags</label>
        <input type="text" name="tags" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Description</label>
        <textarea name="description" id="summernote" cols="30" rows="10">
              
        </textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text">Upload</span>
          </div>
        </div>
      </div>
      <div class="form-check">
        <input type="checkbox" name="status" class="form-check-input" value="1" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
        </div>
    </div>
</div>

@endsection
