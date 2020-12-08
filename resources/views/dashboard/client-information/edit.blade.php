@extends('layouts.app')

@section('style')

@endsection

@section('content')

<div class="container mt-3 mb-5">

    <h2 class="sm-heading">
        Dashboard
    </h2>

    <h1>Edit Data Usaha</h1>

    <form method="POST" action="/dashboard/client/information/{{$client_information->id}}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="company">Perusahaan</label>
            <input value="{{ $client_information->company }}" type="text" name="company" class="form-control @error('company') is-invalid @enderror" id="company" placeholder="Perusahaan">
        </div>
        @error('company')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="description">Deskripsi Usaha</label>
            <textarea rows="3" type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Deskripsi Usaha">{{ $client_information->description }}</textarea>
        </div>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="field">Jenis Usaha</label>
            <input value="{{ $client_information->field }}" type="text" name="field" class="form-control @error('field') is-invalid @enderror" id="field" placeholder="Jenis Usaha">
        </div>
        @error('field')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="phone">Nomor Telepon</label>
            <input value="{{ $client_information->phone }}" type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Nomor Telepon">
        </div>
        @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="text-center submit-container">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>

</div>

@endsection

@section('script')

<script type="text/javascript">

</script>

@endsection
