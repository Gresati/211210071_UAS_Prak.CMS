@extends('layouts.public.app')
@section('content')
<body class="my-login-page">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="brand">
                    </div>
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Login</h4>
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('login') }}" class="my-login-validation" novalidate="">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback d-block">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                    <div class="invalid-feedback">
                                        Email is required
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required data-eye>
                                    @if ($errors->has('password'))
                                        <div class="invalid-feedback d-block">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>
                                <br>

                                <div class="form-group m-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Login
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="footer">
                        Copyright &copy; 2017 &mdash; Your Company 
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
