@extends('layouts.app')

@section('style')

<link rel="stylesheet" href="{{asset('/css/dashboard/index.css')}}" />

@endsection

@section('content')

<div class="container mt-3">

    <h1>
        Dashboard
    </h1>

    <p class="mb-1">Halo {{Auth::user()->name}}</p>
    <h5>Anda belum terdaftar sebagai pencari jasa maupun penyedia jasa</h5>
    <p class="more-information-text">Jangan khawatir, Anda dapat melakukan switching "sebagai pencari jasa" dan "sebagai penyedia jasa".</p>

    <div class="row">
        <div class="col-md-6 text-center p-5 border-right">
            <h5>Daftar sebagai pencari jasa</h5>
            <div class="m-5">
                <img class="img-fluid" src="{{asset('images/dashboard/status-board.svg')}}" alt="">
            </div>
            <button type="button" class="btn btn-primary">Daftar</button>

        </div>
        <div class="col-md-6 text-center p-5 border-left">
            <h5>Daftar sebagai penyedia jasa</h5>
            <div class="m-5">
                <img class="img-fluid" src="{{asset('images/dashboard/kanban-board.svg')}}" alt="">
            </div>
            <button type="button" class="btn btn-primary">Daftar</button>
        </div>
    </div>

</div>

@endsection

@section('script')

<script type="text/javascript">

</script>

@endsection
