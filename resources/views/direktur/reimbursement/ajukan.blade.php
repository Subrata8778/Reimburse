@extends('layouts.home')

@section('breadcrumb')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Pengajuan Reimburse: Ajukan Reimburse
                </h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted">Beranda</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Pengajuan Reimburse</li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Ajukan Reimburse</li>
                        </ol>
                    </nav>
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
                    <form class="mt-3 form-horizontal" method="post" enctype="multipart/form-data"
                        action="{{ route('reimbursement.ajukan') }}">
                        @csrf
                        <input type="hidden" name="nip" value="{{ auth()->user()->nip }}">
                        <div class="form-body">
                            <div class="form-group mb-3 row">
                                <label for="inputTanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="date" name="tanggal"
                                        class="form-control datepicker @error('tanggal') is-invalid @enderror"
                                        id="inputTanggal" placeholder="Pilih Tanggal" autofocus
                                        value="{{ old('tanggal') }} max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                    @error('tanggal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label for="inputHorizontal" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama"
                                        class="form-control @error('nama') is-invalid @enderror" id="inputHorizontal"
                                        placeholder="Contoh: Biaya Rumah Sakit" autofocus value="{{ old('nama') }}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label for="inputHorizontal" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <input type="text" name="deskripsi"
                                        class="form-control @error('deskripsi') is-invalid @enderror" id="inputHorizontal"
                                        placeholder="Contoh: rawat inap 3 malam" autofocus value="{{ old('deskripsi') }}">
                                    @error('deskripsi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label for="inputHorizontal" class="col-sm-2 col-form-label">File</label>
                                <div class="col-sm-10">
                                    <div class="input-group flex-nowrap">
                                        <input class="form-control @error('file') is-invalid @enderror" type="file"
                                            name="file" accept="image/*, application/pdf" required>
                                    </div>
                                    @error('file')
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
