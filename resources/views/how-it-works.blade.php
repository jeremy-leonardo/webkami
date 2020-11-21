@extends('layouts.app')

@section('style')

<link rel="stylesheet" href="{{asset('/css/home.css')}}" />

@endsection

@section('content')

<div class="vector-bg">
    <div class="container pt-4 pb-3">

        <div class="alert alert-light" role="alert">
            <h2 class="mb-4">Cara Kerja Webkami</h2>
            <p>1. Untuk setiap user dari Webkami wajib memiliki akun Webkami untuk dapat menggunakan aplikasi ini. Bagi yang
                belum mempunyai akun dapat membuat akun dengan mengklik tombol Daftar dan jika user sudah memiliki akun dapat
                langsung melakukan login.</p>
            <p>2. Setelah melakukan Login akun Anda akan langsung diarahkan ke halaman dimana Anda harus mengisi peran Anda yaitu
                sebagai pencari jasa / penyedia jasa. </p>
        </div>

        <div class="alert alert-light" role="alert">
            <h2 class="mb-4">Pencari Jasa</h2>
            <p>1. Jika user memilih sebagai pencari jasa maka akan langsung diarahkan ke halaman dimana Anda harus menuliskan data lengkap Anda yang diminta aplikasi berupa data usaha dan data project Anda.</p>
            <p>2. Setelah melakukan pengisian informasi untuk informasi data project dan data usaha Anda tinggal menunggu ada konfirmasi dari pihak penyedia jasa. </p>
        </div>

        <div class="alert alert-light" role="alert">
            <h2 class="mb-4">Penyedia Jasa</h2>
            <p>1. Jika user memilih sebagai penyedia jasa maka akan langsung diarahkan ke halaman dimana Anda harus menuliskan data lengkap Anda yang diminta aplikasi berupa data pribadi Anda.
            </p>
            <p>2. Setelah melakukan pengisian informasi untuk informasi data pribadi, Anda dapat melihat list dari project yang sudah Anda ambil (Jika sebelumnya sudah pernah mengambil suatu project) / Anda dapat melihat list project yang ada dan dapat Anda lihat untuk informasi dari project itu baik jobdesc, deadline hingga bayarannya.
            </p>
            <p> 3. Jika pihak penyedia jasa menyanggupi akan project itu pihak penyedia jasa dapat mengambil project itu</p>
        </div>

    </div>
</div>

@endsection

@section('script')

<script type="text/javascript">

</script>

@endsection
