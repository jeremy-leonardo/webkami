@extends('layouts.app')

@section('style')

<link rel="stylesheet" href="{{asset('/css/dashboard/index.css')}}" />

@endsection

@section('content')

<div class="container mt-3 mb-4">

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <h1 class="sm-heading">
        Dashboard
    </h1>

    @if(!Auth::user()->is_developer && !Auth::user()->is_client)
    <p class="mb-1 mt-4">Halo {{Auth::user()->name}}</p>
    <h5>Anda belum terdaftar sebagai pencari jasa maupun penyedia jasa</h5>
    {{-- <p class="more-information-text">Jangan khawatir, Anda dapat melakukan switching "sebagai pencari jasa" dan "sebagai penyedia jasa".</p> --}}

    <div class="row">
        <div class="col-md-6 text-center p-5 border-right">
            <h5>Daftar sebagai pencari jasa</h5>
            <div class="m-5">
                <img class="img-fluid" src="{{asset('images/dashboard/status-board.svg')}}" alt="">
            </div>
            <a href="{{url('/dashboard/client/information/create')}}">
                <button type="button" class="btn btn-primary">Daftar</button>
            </a>
        </div>
        <div class="col-md-6 text-center p-5 border-left">
            <h5>Daftar sebagai penyedia jasa</h5>
            <div class="m-5">
                <img class="img-fluid" src="{{asset('images/dashboard/kanban-board.svg')}}" alt="">
            </div>
            <a href="{{url('/dashboard/developer/information/create')}}">
                <button type="button" class="btn btn-primary">Daftar</button>
            </a>
        </div>
    </div>
    @endif

    @if(Auth::user()->is_client)

    @if(!App\ProjectDetail::all())
    <div class="text-center mt-4">
        <h5>Anda belum mendaftarkan project</h5>
        <div class="mt-4">
            <a href="{{url('/dashboard/client/project-detail/create')}}">
                <button type="button" class="btn btn-primary">Daftarkan Project</button>
            </a>
        </div>
        <div class="mt-3">
            <img class="img-fluid" src="{{asset('images/dashboard/kanban-board.svg')}}" alt="">
        </div>
    </div>
    @else
    <h5 class="mt-4">Created Projects</h5>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Status</th>
                <th scope="col">Kategori</th>
                <th scope="col">Deadline</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach(App\ProjectDetail::all() as $project_detail)
            <tr>
                <th scope="row">{{ $loop->index + 1 }}</th>
                <td>{{ $project_detail->title }}</td>
                <td>{{ $project_detail->project ? $project_detail->projectStatus->name : "Belum Diambil" }}</td>
                <td>{{ $project_detail->projectCategory->name }}</td>
                <td>{{ $project_detail->deadline }}</td>
                <td>
                    <a href="/dashboard/client/project-detail/{{ $project_detail->id }}">
                        View Detail
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center mt-4">
        <div>
            <p>atau</p>
        </div>
        <div>
            <a href="{{url('/dashboard/client/project-detail/create')}}">
                <button type="button" class="btn btn-primary">Daftarkan Project</button>
            </a>
        </div>
    </div>
    @endif

    @endif


</div>

@endsection

@section('script')

<script type="text/javascript">

</script>

@endsection
