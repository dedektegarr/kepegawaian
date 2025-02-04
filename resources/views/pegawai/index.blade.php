@extends('layouts.app')
@section('title', 'Data Pegawai')
@section('content')
    @if (session()->has('success'))
        <div class="callout callout-info mb-2">
            {{ session('success') }}
        </div>
    @endif

    @if (auth()->user()->role === 'admin')
        <div class="row">
            <div class="col">
                <a href="{{ route('pegawai.create') }}" class="btn btn-primary">Tambah Data Pegawai</a>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Jabatan</th>
                            <th>Departement</th>
                            <th>Gaji</th>
                            <th>Tanggal Bergabung</th>
                            <th>Ditambahkan Oleh</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->nip }}</td>
                                <td>{{ $employee->jabatan }}</td>
                                <td>{{ $employee->departemen }}</td>
                                <td>Rp.{{ number_format($employee->gaji, 0, ',', ',') }}</td>
                                <td>{{ $employee->tgl_gabung }}</td>
                                <td>{{ $employee->user->name }}</td>
                                <td>
                                    <a href="{{ route('pegawai.edit', $employee->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    @if (auth()->user()->role === 'admin')
                                        <form action="{{ route('pegawai.destroy', $employee->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apa anda yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        new DataTable('#example');
    </script>
@endpush
