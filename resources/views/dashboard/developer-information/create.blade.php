@extends('layouts.app')

@section('style')

@endsection

@section('content')

<div class="container mt-3 mb-5">

    <h2 class="sm-heading">
        Dashboard
    </h2>

    <h1>Lengkapi Data Pribadi</h1>
    <p>Anda belum terdaftar sebagai penyedia jasa. Agar para pencari jasa pembuatan web dapat mendapatkan yang terbaik, maka kami perlu melakukan seleksi terhadap penyedia jasa. </p>

    <form method="POST" action="/dashboard/developer/information">
        @csrf

        <label>Pendidikan Terakhir</label>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    {{-- <label for="last_formal_education_level">Tingkat Pendidikan</label> --}}
                    <select class="form-control @error('last_formal_education_level') is-invalid @enderror" name="last_formal_education_level">
                        @foreach(App\EducationLevel::all() as $level)
                        <option value="{{$level->id}}">{{$level->name}}</option>
                        @endForeach
                    </select>
                </div>
                @error('last_formal_education_level')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {{-- <label for="last_formal_education_institution">Lembaga Pendidikan</label> --}}
                    <input value="{{ old('last_formal_education_institution') }}" type="text" name="last_formal_education_institution" class="form-control @error('last_formal_education_institution') is-invalid @enderror" id="last_formal_education_institution" placeholder="Lembaga Pendidikan">
                </div>
                @error('last_formal_education_institution')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {{-- <label for="last_formal_education_field_of_study">Jurusan</label> --}}
                    <input value="{{ old('last_formal_education_field_of_study') }}" type="text" name="last_formal_education_field_of_study" class="form-control @error('last_formal_education_field_of_study') is-invalid @enderror" id="last_formal_education_field_of_study" placeholder="Jurusan">
                </div>
                @error('last_formal_education_field_of_study')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <label>Pendidikan Saat Ini</label>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    {{-- <label for="current_formal_education_level">Tingkat Pendidikan</label> --}}
                    <select class="form-control @error('current_formal_education_level') is-invalid @enderror" name="current_formal_education_level">
                        @foreach(App\EducationLevel::all() as $level)
                        <option value="{{$level->id}}">{{$level->name}}</option>
                        @endForeach
                    </select>
                </div>
                @error('current_formal_education_level')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {{-- <label for="current_formal_education_institution">Lembaga Pendidikan</label> --}}
                    <input value="{{ old('current_formal_education_institution') }}" type="text" name="current_formal_education_institution" class="form-control @error('current_formal_education_institution') is-invalid @enderror" id="current_formal_education_institution" placeholder="Lembaga Pendidikan">
                </div>
                @error('current_formal_education_institution')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {{-- <label for="current_formal_education_field_of_study">Jurusan</label> --}}
                    <input value="{{ old('current_formal_education_field_of_study') }}" type="text" name="current_formal_education_field_of_study" class="form-control @error('current_formal_education_field_of_study') is-invalid @enderror" id="current_formal_education_field_of_study" placeholder="Jurusan">
                </div>
                @error('current_formal_education_field_of_study')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="other_education">Pendidikan Lainnya</label>
            <textarea rows="3" type="text" name="other_education" class="form-control @error('other_education') is-invalid @enderror" id="other_education" placeholder="Pendidikan Lainnya">{{ old('other_education') }}</textarea>
        </div>
        @error('other_education')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="skills">Kemampuan</label>
            <input value="{{ old('skills') }}" type="text" name="skills" class="form-control @error('skills') is-invalid @enderror" id="skills" placeholder="Kemampuan">
        </div>
        @error('skills')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="portfolio_link">Link Portfolio</label>
            <input value="{{ old('portfolio_link') }}" type="text" name="portfolio_link" class="form-control @error('portfolio_link') is-invalid @enderror" id="portfolio_link" placeholder="Link Portfolio">
        </div>
        @error('portfolio_link')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="linkedin_link">Link Linkedin</label>
            <input value="{{ old('linkedin_link') }}" type="text" name="linkedin_link" class="form-control @error('linkedin_link') is-invalid @enderror" id="linkedin_link" placeholder="Link Linkedin">
        </div>
        @error('linkedin_link')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="phone">Nomor Telepon</label>
            <input value="{{ old('phone') }}" type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Nomor Telepon">
        </div>
        @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="text-center submit-container">
            <button type="submit" class="btn btn-primary">Ajukan Sekarang</button>
        </div>
    </form>

</div>

@endsection

@section('script')

<script type="text/javascript">

</script>

@endsection
