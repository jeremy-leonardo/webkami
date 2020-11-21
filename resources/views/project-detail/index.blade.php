@extends('layouts.app')

@section('style')

<link rel="stylesheet" href="{{asset('/css/dashboard/index.css')}}" />

@endsection

@section('content')

<div class="container mt-3 mb-4">

    <h1 class="sm-heading">
        Cari Project
    </h1>

    <div class="card mt-4">
        <div class="card-header bg-white">
            <form class="form-group">
                <div class="row">
                    <div class="col-md-4 col-7">
                        <input class="form-control" type="text" name="search" value="{{Request::input('search')}}">
                    </div>
                    <div class="col-md-8 col-5 pl-0">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            @if($project_details->isEmpty())
            <div class="text-center">
                <p>Pencarian tidak ditemukan</p>
            </div>
            @endif
            @foreach($project_details as $project_detail)

            <div class="row align-items-end">
                <div class="col-md-8">
                    <div>
                        <b>{{$project_detail->title}}</b>
                    </div>
                    <div class="mt-1">
                        {{$project_detail->projectCategory->name}}
                    </div>
                    <div class="mt-3">
                        {{$project_detail->clientUser->company}}
                    </div>
                    <p class="mt-3">
                        {{$project_detail->description}}
                    </p>
                </div>
                <div class="col-md-4 text-right">
                    <div class="mt-2">
                        Deadline:
                        <b>
                            {{ date('d M Y', strtotime($project_detail->deadline)) }}
                        </b>
                    </div>
                    <div class="mt-2">
                        <b>
                            Rp {{number_format($project_detail->budget, 0, ',', '.')}}
                        </b>
                    </div>
                    <div class="mt-4">
                        <a href="/project-details/{{$project_detail->id}}">
                            <button type="button" class="btn btn-primary">Lihat Detail</button>
                        </a>
                    </div>
                </div>
            </div>
            @if(($loop->index +1) != $project_details->count())
            <hr>
            @endif
            @endforeach
        </div>
        <div class="card-footer bg-white text-muted">
            {{$project_details->withQueryString()->links()}}
        </div>
    </div>




</div>

@endsection

@section('script')

<script type="text/javascript">

</script>

@endsection
