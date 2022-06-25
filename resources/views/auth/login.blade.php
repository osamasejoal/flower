@extends('auth.layouts.master')

@section('main-content')
    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">

                {{-- Sign in Form --}}
                <form action="{{ route('login') }}" method="POST" class="sign-box">
                    @csrf
                    <div class="sign-avatar">
                        <img src="{{ asset('backend/assets') }}/img/avatar-sign.png" alt="">
                    </div>
                    <header class="sign-title">Sign In</header>

                    {{-- Email --}}
                    <div class="form-group">
                        <input name="email" type="text" class="form-control" placeholder="E-Mail" />

                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="form-group">
                        <input name="password" type="password" class="form-control" placeholder="Password" />

                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Keep me sign in &&& Reset Password --}}
                    {{-- <div class="form-group">
                        <div class="checkbox float-left">
                            <input type="checkbox" id="signed-in" />
                            <label for="signed-in">Keep me signed in</label>
                        </div>
                        <div class="float-right reset">
                            <a href="reset-password.html">Reset Password</a>
                        </div>
                    </div> --}}

                    {{-- Submit button --}}
                    <button type="submit" class="btn btn-rounded">Sign in</button>

                    {{-- Sign up button --}}
                    {{-- <p class="sign-note">New to our website? <a href="{{ route('register') }}">Sign up</a></p> --}}
                    <!--<button type="button" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>-->
                </form>
            </div>
        </div>
    </div>
    <!--.page-center-->
@endsection
