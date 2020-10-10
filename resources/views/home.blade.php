@extends('layouts.app')

@section('style')

<style>
    .temp-filler {
        min-height: 100vh;
    }

    h1 {
        color: white;
    }

</style>

@endsection

@section('content')

<div class="vector-bg pt-5 pb-5 temp-filler">
    <div class="container">
        @auth
        <h1 class="pt-5 text-center">Hello {{ Auth::user()->name}}</h1>
        @endauth
        <h1 class="pt-5 text-center">Coming Soon</h1>
    </div>
</div>

@endsection

@section('script')

<script type="text/javascript">

</script>

@endsection
