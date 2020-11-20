@extends('layouts.app')

@section('style')

<link rel="stylesheet" href="{{asset('/css/auth/login-register.css')}}" />

@endsection

@section('content')

<div class="vector-bg pt-5 pb-5">
    <div class="container">

        <div class="card">
            <div class="card-body">
                <h3 class="text-center">Login</h3>
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <form class="login-form" method="POST" action="/login">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input value="{{ old('email') }}" type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email">
                    </div>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input value="{{ old('password') }}" type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                    </div>
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="text-center submit-container">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    @error('misc')
                    <div class="alert alert-danger mt-3">{{session('errors')->first('misc')}}</div>
                    @enderror
                </form>
                <p class="text-center pt-5">Belum memiliki akun? <a href="/register">Klik di sini untuk daftar</a></p>
            </div>
        </div>

    </div>
</div>

@endsection

@section('script')

<script type="text/javascript">

</script>

@endsection
