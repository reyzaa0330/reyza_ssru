@extends('layouts.dashboard')

@section('content')
    <div class="mb-3">
        <a href="{{route('dashboard.siswa')}}" class="btn btn-secondary"> ⬅ Kembali kehalaman</a>
    </div>

    <div class="card">
        <div classs="card-header">
            <div class="row">
                <div class="col-8 align-self-center">
                    <h3>Detail Siswa</h3>
                </div>
              <div class="col-4 text-right ">
                  <button class="btn btn-sm text-secondary" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                         <!-- Tambahkan konten di sini sesuai kebutuhan -->
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
            <div class="col-4 d-flex justify-content-center align-items-center flex-column">
                    <img src="{{asset('storage/siswa/'.$siswa->pas_photo)}}" class="img-fluid" width="250px">
                </div>
        <div class="col-8">
            <table class="table table-bordered">
                <tr>
                    <th>No Daftar</th>
                    <td>{{ $siswa->no_daftar }}</td>    
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $siswa->nama }}</td>
                </tr>
                <tr>
                    <th>Nisn</th>
                    <td>{{ $siswa->nisn }}</td>
                </tr>
                <tr>
                    <th>Nik</th>
                    <td>{{ $siswa->nik }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ $siswa->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <th>Agama</th>
                    <td>{{ $siswa->agama }}</td>
                </tr>
                <tr>
                    <th>No kk</th>
                    <td>{{ $siswa->no_kk }}</td>
                </tr>
                <tr>
                    <th>Tempat Tanggal Lahir</th>
                    <td>{{ $siswa->tempat_tanggal_lahir }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $siswa->alamat }}</td>
                </tr>
            <table>
        </div>
    @if(isset($siswa))
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-tittle">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5>Delete</h5>
                    </div>
                </div>

                <div class="modal-body">
                    <p>Anda yakin ingin menghapus siswa </p>
                </div>

                <div class="modal-footer">
                    <form action="{{ route('dashboard.siswa.delete', $siswa->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></botton>
                        
                        <td><a href="{{ url('dashboard/siswa/edit/'.$siswa->id) }}" class="btn btn-success btn-sm">Edit</a></td>
                    </form>
                </div>
    @endif
@endsection
