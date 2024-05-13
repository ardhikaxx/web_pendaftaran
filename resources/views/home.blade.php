@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Daftar Pasien') }}
                        <form action="{{ route('cari') }}" method="GET">
                            <div class="input-group mt-3 mb-3">
                                <input class="form-control" name="cari" type="text"
                                    placeholder="Search for..." aria-label="Search for..."
                                    aria-describedby="btnNavbarSearch" />
                                <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                        <form id="lihatForm">
                            <button type="button" class="btn btn-primary" id="btnLihat">Lihat</button>
                        </form>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Umur</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pasiens as $pasien)
                                    <tr>
                                        <td>{{ $pasien->nama }}</td>
                                        <td>{{ $pasien->jenis_kelamin }}</td>
                                        <td>{{ $pasien->tanggal_lahir->format('d/m/Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->diffInYears(\Carbon\Carbon::now()) }}
                                            Tahun</td>
                                        <td>
                                            <button class="btn btn-primary btn-detail" data-id="{{ $pasien->id }}">Detail</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $pasiens->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).on('click', '.btn-detail', function() {
            var pasienId = $(this).data('id');
            $.ajax({
                url: '/pasien/' + pasienId,
                method: 'GET',
                success: function(response) {
                    var html = '<table class="table">';
                    html += '<tr><th>Detail</th><th>Data</th></tr>';
                    html += '<tr><td><strong>Alamat:</strong></td><td>' + response.alamat +
                    '</td></tr>';
                    html += '<tr><td><strong>Nomor Telepon:</strong></td><td>' + response
                        .nomor_telepon + '</td></tr>';
                    html += '<tr><td><strong>Penyakit:</strong></td><td>' + response.penyakit +
                        '</td></tr>';
                    html += '</table>';

                    Swal.fire({
                        title: 'Detail Pasien',
                        html: html,
                        confirmButtonText: 'Tutup',
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    </script>

<script>
    $(document).ready(function() {
        function showSweetAlert(htmlContent) {
            Swal.fire({
                html: htmlContent
            });
        }

        $('#btnLihat').on('click', function() {
            $.ajax({
                url: '/pasiens',
                method: 'GET',
                success: function(response) {
                    var tableContent = '<table class="table"><thead><tr><th>Nama</th><th>Jenis Kelamin</th><th>Tanggal Lahir</th><th>Detail</th></tr></thead><tbody>';
                    response.forEach(function(pasien) {
                        tableContent += '<tr><td>' + pasien.nama + '</td><td>' + pasien.jenis_kelamin + '</td><td>' + pasien.tanggal_lahir + '</td><td><button class="btn btn-primary btn-detail" data-id="' + pasien.id + '">Detail</button></td></tr>';
                    });
                    tableContent += '</tbody></table>';

                    showSweetAlert(tableContent);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    showSweetAlert('Error: ' + error);
                }
            });
        });
    });
</script>
@endsection