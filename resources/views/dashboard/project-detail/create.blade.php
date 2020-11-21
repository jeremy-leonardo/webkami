@extends('layouts.app')

@section('style')

@endsection

@section('content')

<div class="container mt-3 mb-5">

    <h2 class="sm-heading">
        Dashboard
    </h2>

    <h1>Daftarkan Project Baru</h1>
    <p>Agar kami dapat memberikan konsultasi mengenai kebutuhan Anda dengan baik, maka mohon lengkapi data berikut:</p>

    <form method="POST" action="/dashboard/client/project-details">
        @csrf

        <div class="form-group">
            <label for="title">Judul Project</label>
            <input value="{{ old('title') }}" type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Judul Project">
        </div>
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="description">Deskripsi Project</label>
            <textarea rows="3" type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Deskripsi Project">{{ old('description') }}</textarea>
        </div>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="project_category">Kategori Project</label>
            @foreach(App\ProjectCategory::all() as $project_category)
            <div class="form-check">
                <input @if(old('project_category')==$project_category->id) checked @endif class="form-check-input @error('project_category') is-invalid @enderror" type="radio" name="project_category" id="{{$project_category->id}}" value="{{$project_category->id}}">
                <label class="form-check-label" for="{{$project_category->id}}">
                    {{$project_category->name}}
                </label>
            </div>
            @endforeach
        </div>
        @error('project_category')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="deadline">Deadline</label>
            <input value="{{ old('deadline') }}" type="date" name="deadline" class="form-control @error('deadline') is-invalid @enderror" id="deadline" placeholder="yyyy-mm-dd">
        </div>
        @error('deadline')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="budget">Budget</label>
            <input value="{{ old('budget') }}" type="number" name="budget" class="form-control @error('budget') is-invalid @enderror" id="budget" placeholder="Budget">
        </div>
        @error('budget')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="text-center submit-container">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</div>

@endsection

@section('script')

<script type="text/javascript">

</script>

@endsection
