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
                <form class="login-form">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="passwordConfirmation">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="passwordConfirmation" placeholder="Password">
                    </div>
                    <div class="text-center submit-container">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection

@section('script')

<script type="text/javascript">

</script>

@endsection
