@extends('layouts.site')
@push('styles')
@endpush
@section('content')
<div id="content" class="container ">
  <div class="row">
    <div class="col-md-5 auth-form mx-auto my-auto ">
        <div class="card mt-5 mb-5">
          <div class="card-body">
            <h5 class="auth-form__title text-center mb-4">Access Your Account</h5>
            {{ Form::open(['route'=>'get.login'])}}
            <form>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input value="" type="text" name="username" class="form-control" placeholder="User ID" />
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input value="" type="password" name="password" class="form-control" placeholder="Password" />
              </div>
              <button type="submit" class="btn btn-pill btn-accent d-table mx-auto">Access Account</button>
            </form>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    <br>
    <br>
  </div>
</div>
@endsection

@push('scripts')

@endpush