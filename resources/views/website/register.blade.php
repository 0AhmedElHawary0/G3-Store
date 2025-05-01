@extends('website.main_layout')

@section('page_title')
Home Page
@endsection

@section('page_content')

<!-- HERO SECTION-->
<div class="container">

    <div class="card mb-4" id="forms">
        <div class="card-header">User Registration</div>
        <div class="card-body">

            {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif --}}

            <form action="{{ url('/post-register') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input class="form-control" type="text" name="name">
                    <small class="text-danger">
                        @if ($errors->has('name'))
                        {{ $errors->first('name') }}
                        @endif
                    </small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input class="form-control" type="text" name="phone">
                    <small class="text-danger">
                        @if ($errors->has('phone'))
                        {{ $errors->first('phone') }}
                        @endif
                    </small>
                </div>

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

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea class="form-control" name="address"></textarea>
                    <small class="text-danger">
                        @if ($errors->has('address'))
                        {{ $errors->first('address') }}
                        @endif
                    </small>
                </div>

                <button class="btn btn-primary" type="submit">Register</button>
            </form>
        </div>
    </div>

</div>
@endsection