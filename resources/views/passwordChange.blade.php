
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                       @if(session()->has('success'))
                       <strong class="text-success">{{ session()->get('success') }}</strong>
                       @endif
                       @if(session()->has('error'))
                       <strong class="text-danger">{{ session()->get('error') }}</strong>
                       @endif

                        <form method="post" action="{{route('password.update')}}">
                          @csrf
                          <h1>PassWord Change </h1>
                                   <div class="mb-3">
                                     <label for="exampleInputPassword1" class="form-label">Currenyt PassWord</label>
                                     <input type="password" name="current_password" class="form-control  @error('current_password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Current password" required>
                                     @error('current_password')
                                     <span class="invalid-feedback" role="alert">
                                      <strong> {{$message}}</strong>
                                     </span>
                                     @enderror
                                   </div>
                                   <div class="mb-3">
                                     <label for="exampleInputPassword1" class="form-label">New PassWord</label>
                                     <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="New password" required>
                                     @error('password')
                                     <span class="invalid-feedback" role="alert">
                                      <strong> {{$message}}</strong>
                                     </span>
                                     @enderror
                                   </div>
                                   <div class="mb-3">
                                     <label for="exampleInputPassword1" class="form-label">Confirm PassWord</label>
                                     <input type="password" name="password_confirmation" class="form-control  @error('password_confirmation') is-invalid @enderror" id="exampleInputPassword1" placeholder="Confirm password" required>
                                     @error('password_confirmation')
                                     <span class="invalid-feedback" role="alert">
                                      <strong> {{$message}}</strong>
                                     </span>
                                     @enderror
                                     
                                   </div>
                             
                                 <button type="submit" class="btn btn-primary">ReSet password</button>
                               </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection



