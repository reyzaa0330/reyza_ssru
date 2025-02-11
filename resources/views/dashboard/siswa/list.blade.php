@extends('layouts.dashboard')

@section('content')
    <div class="mb-2">
        <a href="{{route('dashboard.siswa.create')}}" class="btn btn-primary">+ Siswa</a>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8 align-self-center">
                    <h3>Siswa</h3>
                </div>
                <div class="col-4">
                    <form method="get" action="{{ route('dashboard.siswa') }}">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" name="q" value="{{ $request['q'] ?? '' }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary btn-sm">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            @if($siswas->total())
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr class='table-siswa'>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Lihat Detail</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswas as $siswa)
                            <tr>
                            <td> {{ $siswa->nama }} </td>

                            <td>{{ $siswa->jenis_kelamin }} </td>

                           <td>{{ $siswa->alamat }}</td>
                    
                                <td><a href="{{ route('dashboard.siswa.show', $siswa->id) }}" class="btn btn-primery btn-sm"><i class="fas fa-eye"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $siswas->links() }}
                @else
                    <h5 class="text-center p-3">Belum ada data Siswa</h5>
                @endif
            </div>
        </div>
    @endsection