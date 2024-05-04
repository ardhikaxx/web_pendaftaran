@extends('layouts.app')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                {{ __('Daftar Pasien') }}
                                <form action="{{ route('cari') }}" method="GET">
                                    <div class="input-group mt-3 mb-3">
                                        <input class="form-control" name="cari" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                                        <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </form>
                                {{-- <form action="{{ route('process_dropdown') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="patient">Pilih Pasien:</label>
                                        <select name="patient" id="patient" class="form-control">
                                            @foreach($pasiens as $pasien)
                                                <option value="{{ $pasien->id }}">{{ $pasien->nama }} - {{ $pasien->tanggal_lahir->diffInMonths(\Carbon\Carbon::now()) }} Bulan</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form> --}}
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Umur</th>
                                            <th>Alamat</th>
                                            <th>Nomor Telepon</th>
                                            <th>Penyakit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pasiens as $pasien)
                                        <tr>
                                            <td>{{ $pasien->nama }}</td>
                                            <td>{{ $pasien->jenis_kelamin }}</td>
                                            <td>{{ $pasien->tanggal_lahir->format('d/m/Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->diffInMonths(\Carbon\Carbon::now()) }} Bulan</td>
                                            <td>{{ $pasien->alamat }}</td>
                                            <td>{{ $pasien->nomor_telepon }}</td>
                                            <td>{{ $pasien->penyakit }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {!! $pasiens->withQueryString()->links('pagination::bootstrap-5') !!}
                                <div class="card-footer">
                                    ini data pasien
                                </div>                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>


<script>
    document.getElementById('printBtn').addEventListener('click', function() {
        window.open("{{ route('print') }}", "_blank");
    });
</script>
@endsection