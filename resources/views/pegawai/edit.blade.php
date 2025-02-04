@extends('layouts.app')
@section('title', 'Edit Data Pegawai')
@section('content')
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card card-primary card-outline mb-4">
                <!--begin::Header-->
                <div class="card-header">
                    <div class="card-title">Edit Pegawai</div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <form method="POST" action="{{ route('pegawai.update', $employee->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') ?? $employee->name }}">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="number" class="form-control @error('nip') is-invalid @enderror" id="nip"
                                name="nip" value="{{ old('nip') ?? $employee->nip }}">
                            @error('nip')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan"
                                name="jabatan" value="{{ old('jabatan') ?? $employee->jabatan }}">
                            @error('jabatan')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="departemen" class="form-label">Departemen</label>
                            <input type="text" class="form-control @error('departemen') is-invalid @enderror"
                                name="departemen" id="departemen" value="{{ old('departemen') ?? $employee->departemen }}">
                            @error('departemen')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="gaji" class="form-label">Gaji</label>
                            <input type="number" class="form-control @error('gaji') is-invalid @enderror" id="gaji"
                                name="gaji" value="{{ old('gaji') ?? $employee->gaji }}">
                            @error('gaji')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tgl_gabung" class="form-label">Tanggal Bergabung</label>
                            <input type="date" class="form-control @error('tgl_gabung') is-invalid @enderror"
                                name="tgl_gabung" id="tgl_gabung" value="{{ old('tgl_gabung') ?? $employee->tgl_gabung }}">
                            @error('tgl_gabung')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    <!--end::Footer-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
@endsection
