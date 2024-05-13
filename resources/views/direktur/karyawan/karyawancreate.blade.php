@extends('layouts.home')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Tambah Karyawan</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted">Beranda</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Laporan</li>
                        <li class="breadcrumb-item"><a href="{{ route('karyawan.index') }}" class="text-muted">Karyawan</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Tambah Karyawan</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-end">
                <a href="{{ route('karyawan.create') }}" class="btn btn-primary btn-rounded"><i class="fas fa-plus"></i>Tambah Karyawan</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<!-- multi-column ordering -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form class="mt-3 form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('karyawan.store') }}">
                    @csrf
                    <div class="form-body">
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <select class="form-select mr-sm-2 @error('jabatan') is-invalid @enderror" id="inlineFormCustomSelect" name="jabatan">
                                    <option value="Direktur" {{ old('jabatan') == "Direktur" ? 'selected' : '' }}>Direktur</option>
                                    <option value="Finance" {{ old('jabatan') == "Finance" ? 'selected' : '' }}>Finance</option>
                                    <option value="Staff" {{ old('jabatan') == "Staff" ? 'selected' : '' }}>Staff</option>
                                </select>
                                @error('jabatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" id="inputHorizontal" placeholder="Contoh: 1234567890" autofocus value="{{ old('nip') }}">
                                @error('nip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="inputHorizontal" placeholder="Contoh: Subrata" autofocus value="{{ old('nama') }}">
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputHorizontal" placeholder="Contoh: xxxxxx" autofocus value="{{ old('password') }}">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="text-end">
                            <button type="reset" class="btn btn-outline-danger btn-rounded">Batal</button>
                            <button type="submit" class="btn btn-primary btn-rounded">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection