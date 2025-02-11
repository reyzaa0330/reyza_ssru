@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div classs="card-header">
            <div class="row">
                <div class="col-8 align-self-center">
                    <h3>Siswa</h3>
                </div>
              <div class="col-4 text-right ">
                  <button class="btn btn-sm text-secondary" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                         <!-- Tambahkan konten di sini sesuai kebutuhan -->
                </div>

        <div class="card-body p-2">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form method="post" action="{{ route('dashboard.siswa.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="no_daftar">no_daftar</label>
                            <input type="text" class="form-control" name="no_daftar" value="{{ $siswa->no_daftar?? '' }}">
                            @error('no_dfatar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ $siswa->nama ?? '' }}">
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nisn">nisn</label>
                            <input type="text" class="form-control" name="nisn" value="{{ $siswa->nisn ?? '' }}">
                            @error('nisn')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nik">nik</label>
                            <input type="text" class="form-control" name="nik" value="{{ $siswa->nik ?? '' }}">
                            @error('nik')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">jenis_kelamin</label>
                            <input type="text" class="form-control" name="jenis_kelamin" value="{{ $siswa->jenis_kelamin ?? '' }}">
                            @error('Jenis_Kelamin')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="agama">agama</label>
                            <input type="text" class="form-control" name="agama" value="{{ $siswa->agama  ?? '' }}">
                            @error('agama')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_kk">no_kk</label>
                            <input type="text" class="form-control" name="no_kk" value="{{ $siswa->no_kk ?? '' }}">
                            @error('no_kk')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tempat_tanggal_lahir">tempat_tanggal_lahir</label>
                            <input type="text" class="form-control" name="tempat_tanggal_lahir" value="{{ $siswa->tempat_tanggal_lahir ?? '' }}">
                            @error('tempat_tanggal_lahir')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{ $siswa->alamat ?? '' }}">
                            @error('alamat')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <div class="custom-file">
                                <input type="file" name="pas_photo" class="custom-file-input"> 
                                <label for="pas_photo" class="custom-file-label">Pas_photo</label>
                                @error('pas_photo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        <div>
                        <div class="form-group mt-4">
                        <button type="button" onclick="Window.history.back()" class="btn btn-sm btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-success btn-sm">Create</button>
                        </div>
                    </form>
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
