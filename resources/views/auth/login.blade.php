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
                <form class="login-form" method="POST" action="/login">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="text-center submit-container">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
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
