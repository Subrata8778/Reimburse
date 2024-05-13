@extends('layouts.home')

@section('breadcrumb')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Detail Reimburse</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted">Beranda</a></li>
                            <li class="breadcrumb-item">Pengajuan Reimburse</li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Detail Reimburse</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-end">
                    <a href="{{ route('reimbursement.edit', $app->id) }}" type="button"
                        class="btn btn-warning btn-rounded"><i class="far fa-edit"></i> Edit</a>
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
                    <div class="mt-4 form-horizontal">
                        <div class="form-body">
                            <div class="form-group mb-3 row">
                                <label for="inputHorizontal" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <label
                                        class="form-control 
                                    {{ $app->status == 'Diproses'
                                        ? 'bg-warning text-dark'
                                        : ($app->status == 'Disetujui'
                                            ? 'bg-success text-white'
                                            : ($app->status == 'Menunggu'
                                                ? 'bg-info text-white'
                                                : 'bg-danger text-white')) }}">
                                        {{ $app->status == 'Diproses'
                                            ? 'Diproses'
                                            : ($app->status == 'Disetujui'
                                                ? 'Disetujui'
                                                : ($app->status == 'Menunggu'
                                                    ? 'Menunggu Finance'
                                                    : 'Ditolak')) }}
                                    </label>
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label for="inputHorizontal" class="col-sm-2 col-form-label">ID</label>
                                <div class="col-sm-10">
                                    <label class="form-control">{{ $app->id }}</label>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
