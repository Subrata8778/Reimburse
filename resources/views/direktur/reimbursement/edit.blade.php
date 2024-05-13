@extends('layouts.home')

@section('breadcrumb')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit Status Reimburse</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted">Beranda</a></li>
                            <li class="breadcrumb-item">Pengajuan Reimburse</li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Edit Status Reimburse</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="mt-3 form-horizontal" method="POST" enctype="multipart/form-data"
                        action="{{ route('reimbursement.update') }}">
                        @csrf
                        <div class="mt-4 form-horizontal">
                            <div class="form-body">
                                @if (Auth::user()->jabatan == 'Direktur')
                                    <div class="form-group mb-3 row">
                                        <label for="inputHorizontal" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="status" id="status">
                                                <option value="Diproses" {{ $app->status == 'Diproses' ? 'selected' : '' }}>
                                                    Diproses</option>
                                                <option value="Menunggu" {{ $app->status == 'Menunggu' ? 'selected' : '' }}>
                                                    Diteruskan ke Finance</option>
                                                <option value="Ditolak" {{ $app->status == 'Ditolak' ? 'selected' : '' }}>
                                                    Ditolak</option>
                                            </select>
                                        </div>
                                    </div>
                                @endif
                                @if (Auth::user()->jabatan == 'Finance')
                                    <div class="form-group mb-3 row">
                                        <label for="inputHorizontal" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="status" id="status">
                                                <option value="Menunggu" {{ $app->status == 'Menunggu' ? 'selected' : '' }}>
                                                    Menunggu Finance</option>
                                                <option value="Disetujui"
                                                    {{ $app->status == 'Disetujui' ? 'selected' : '' }}>
                                                    Disetujui</option>
                                                <option value="Ditolak" {{ $app->status == 'Ditolak' ? 'selected' : '' }}>
                                                    Ditolak</option>
                                            </select>
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group mb-3 row">
                                    <label for="inputHorizontal" class="col-sm-2 col-form-label">ID</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="id" readonly value="{{ $app->id }}">
                                    </div>
                                </div>
                                <div class="form-group mb-3 row">
                                    <label for="inputHorizontal" class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-10">
                                        <label class="form-control">{{ $app->tanggal }}</label>
                                    </div>
                                </div>
                                <div class="form-group mb-3 row">
                                    <label for="inputHorizontal" class="col-sm-2 col-form-label">Pengajuan</label>
                                    <div class="col-sm-10">
                                        <label class="form-control">{{ $app->nama }}</label>
                                    </div>
                                </div>
                                <div class="form-group mb-3 row">
                                    <label for="inputHorizontal" class="col-sm-2 col-form-label">Deskripsi</label>
                                    <div class="col-sm-10">
                                        <label class="form-control">{{ $app->deskripsi }}</label>
                                    </div>
                                </div>
                                <div class="form-group mb-3 row">
                                    <label for="inputHorizontal" class="col-sm-2 col-form-label">Diajukan oleh</label>
                                    <div class="col-sm-10">
                                        <label class="form-control">{{ $app->user_nip }}</label>
                                    </div>
                                </div>
                                <div id="photos" class="form-group mb-3 row">
                                    <div class="input-group flex-nowrap preview border rounded">
                                        <div class="custom-file w-100">
                                            <img id="photoPreview" class="img-fluid mx-auto d-block"
                                                src="{{ asset('storage/' . $app->url_file) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-end">
                                    <a href="{{ URL::previous() }}" type="reset"
                                        class="btn btn-outline-danger btn-rounded">Batal</a>
                                    <button type="submit" class="btn btn-primary btn-rounded">Simpan Perubahan</button>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
