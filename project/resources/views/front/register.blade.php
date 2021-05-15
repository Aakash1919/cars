@extends('layouts.front')

@section('content')
  <div class="container signup-form">
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        @include('includes.admin.form-login')
        <br>
        <form id="registerform" class="" action="{{ route('user.reg.submit') }}" method="post">
          {{ csrf_field() }}
          <input class="form-control" type="text" name="name" placeholder="Name"><br>
          <input class="form-control" type="email" name="email" placeholder="Email"><br>
          <input class="form-control" type="password" name="password" placeholder="Password"><br>
          <input class="form-control" type="password" name="password_confirmation" placeholder="Repeat Password"><br>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div><br>

        </form>
      </div>
    </div>
  </div>
@endsection
