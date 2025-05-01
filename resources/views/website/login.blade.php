@extends('website.main_layout')

@section('page_title')
Home Page
@endsection

@section('page_content')

<!-- HERO SECTION-->
<div class="container">

    <div class="card mb-4" id="forms">
        <div class="card-header">User Login</div>
        <div class="card-body">

            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
            @endif

            <form action="{{ url('/post-login') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input class="form-control" type="text" name="email">
                    <small class="text-danger">
                        @if ($errors->has('email'))
                        {{ $errors->first('email') }}
                        @endif
                    </small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input class="form-control" type="password" name="password">
                    <small class="text-danger">
                        @if ($errors->has('password'))
                        {{ $errors->first('password') }}
                        @endif
                    </small>
                </div>

                <div class="mb-3 form-check">
                    <input class="form-check-input" id="exampleCheck1" type="checkbox">
                    <label class="form-check-label" for="exampleCheck1">Remember Me?</label>
                </div>

                <button class="btn btn-primary" type="submit">Login</button>
            </form>
        </div>
    </div>

</div>
@endsection