@extends('layouts.app')

@section('style')

<link rel="stylesheet" href="{{asset('/css/dashboard/index.css')}}" />

@endsection

@section('content')

<div class="container mt-3 mb-4">

    <h1 class="sm-heading">
        Detail Project
    </h1>

    <div class="card mt-4">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col-auto">
                    <a href="{{url()->previous()}}">
                        « Back
                    </a>
                </div>
                <div class="col">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <div class="card text-primary border-primary text-center pl-5 pr-5">
                                {{ $project_detail->clientUser->clientInformation->company }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="card m-2">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-4 text-primary">
                                    JUDUL
                                </div>
                                <div class="col-md-8">
                                    {{$project_detail->title}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card m-2">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-4 text-primary">
                                    CATEGORY
                                </div>
                                <div class="col-md-8">
                                    {{$project_detail->projectCategory->name}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card m-2">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-4 text-primary">
                                    DESKRIPSI
                                </div>
                                <div class="col-md-8">
                                    {{$project_detail->description}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($project_detail->is_taken && Auth::user()->id == $project_detail->clientUser->id)
                    <div class="card m-2">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-4 text-primary">
                                    DIAMBIL OLEH
                                </div>
                                <div class="col-md-8">
                                    {{$project_detail->project->developerUser->name}}<br>
                                    Nomor Telp: {{$project_detail->project->developerUser->developerInformation->phone}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-md-4">
                    <div class="card m-2">
                        <div class="card-header text-center text-primary bg-white">
                            COMPANY INFORMATION
                        </div>
                        <div class="card-body">
                            <div>
                                <b>
                                    {{ $project_detail->clientUser->clientInformation->company }}
                                </b>
                            </div>
                            <div class="mt-1">
                                {{ $project_detail->clientUser->clientInformation->field }}
                            </div>
                            <div class="mt-3">
                                {{ $project_detail->clientUser->clientInformation->description }}
                            </div>
                            @auth
                            <div class="mt-3">
                                Nomor Kontak: {{ $project_detail->clientUser->clientInformation->phone }}
                            </div>
                            @endauth
                        </div>
                    </div>
                    <div class="m-2 mt-4">
                        <div class="text-primary">
                            DEADLINE
                        </div>
                        <div>
                            {{ date('d M Y', strtotime($project_detail->deadline)) }}
                        </div>
                        <hr>
                        <div class="text-primary">
                            BUDGET
                        </div>
                        <div>
                            Rp {{number_format($project_detail->budget, 0, ',', '.')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @auth
        <div class="card-footer bg-white text-muted text-center">
            @if(Auth::user()->is_developer)
            @if($project_detail->is_taken)
            @php
            $next_status_id = $project_detail->project->projectStatus->id + 1;
            $next_status = App\ProjectStatus::find($next_status_id);
            @endphp
            @if($next_status)
            <form method="POST" action="/project-details/{{$project_detail->project->id}}/change-status/{{$next_status_id}}">
                @csrf
                @method('PUT')
                <button class="btn btn-primary" type="submit">Ubah Status Menjadi "{{$next_status->name}}"</button>
            </form>
            @endif
            @else
            <form method="POST" action="/project-details/{{$project_detail->id}}/take">
                @csrf
                @method('PUT')
                <button class="btn btn-primary" type="submit">Ambil Project</button>
            </form>
            @endif
            @endif
            @if(Auth::user()->is_client && $project_detail->clientUser->id == Auth::user()->id && !$project_detail->is_taken)
            <a href="/project-details/{{$project_detail->id}}/edit">
                <button class="btn btn-primary" type="submit">Edit Project Detail</button>
            </a>
            @endif
        </div>
        @endauth
        @guest
        <div class="card-footer bg-white text-muted text-center">
            <a href="/login">
                <button class="btn btn-primary" type="button">Login</button>
            </a>
        </div>
        @endguest
    </div>




</div>

@endsection

@section('script')

<script type="text/javascript">

</script>

@endsection
