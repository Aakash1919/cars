@extends('layouts.front')

@section('content')
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="title">
                        Login
                    </h1>
                    <ul class="pages">
                        <li>
                            <a href="#">
                                {{ $langg->lang1 }}
                            </a>
                        </li>
                        <li class="active">
                            <a href="#">
                                Login
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- About Area Start -->
    <section class="login-signup">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="log-reg-tab-wrapper">
                        <div class="log-reg-tab-menu">
                            <ul class="nav" id="pills-tab" role="tablist">

                                {{-- <li class="nav-item">
                                    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill"
                                        href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true">
                                        {{ $langg->lang400 }}
                                    </a>
                                </li> --}}
                                {{-- <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route('user.login-signup1') }}">{{ $langg->lang401 }}</a>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContent">

                            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <div class="login-area signup-area">

                                    <div class="login-form signup-form">
                                        @include('includes.admin.form-login')
                                        <form id="loginform" action="{{ route('user.login.submit') }}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-input">
                                                        <input name="email" type="email"
                                                            placeholder="{{ $langg->lang405 }}">
                                                        <i class="fas fa-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-input">
                                                        <input name="password" type="password" class="Password"
                                                            placeholder="{{ $langg->lang406 }}">
                                                        <i class="fas fa-key"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{ route('front-forgot') }}"
                                                class="forgot-pass">{{ $langg->lang409 }}? </a>
                                            <button class="submit-btn">{{ $langg->lang400 }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- About Area End -->
@endsection

@section('scripts')
    <script>
        $('.refresh_code').on("click", function() {
            $.get('{{ url('refresh_code') }}', function(data, status) {
                $('#codeimg').attr("src", "{{ url('assets/images') }}/capcha_code.png?time=" + Math
                .random());
            });
        })
    </script>
@stop
