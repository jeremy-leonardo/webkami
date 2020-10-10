@extends('layouts.app')

@section('style')

<link rel="stylesheet" href="{{asset('/css/home.css')}}" />

@endsection

@section('content')

<div class="vector-bg pt-5 pb-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 pt-5 pb-5">
                <div>
                    @auth
                    <h3>Halo <b>{{ Auth::user()->name}}</b>,</h3>
                    @endauth
                    <h1><b>Hemat biaya</b> dan bantu</h1>
                    <h1>pelajar bidang teknologi</h1>
                </div>
                <div class="pt-5 pb-5">
                    <a @guest href="/register" @endguest @auth href="/dashboard" @endauth>
                        <button class="btn btn-primary">Daftarkan Project</button>
                    </a>
                    &nbsp;&nbsp;
                    <a @guest href="/register" @endguest @auth href="/dashboard" @endauth>
                        <button class="btn btn-outline-light">Ambil Project</button>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
            <img class="img-fluid" src="{{asset('/images/home/desktop-web.png')}}"/>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script type="text/javascript">

</script>

@endsection
