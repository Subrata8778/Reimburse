@extends('layouts.home')

@section('breadcrumb')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Karyawan</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted">Beranda</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Laporan</li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Karyawan</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-end">
                    @if (Auth::user()->jabatan == 'Direktur')
                        <a href="{{ route('karyawan.create') }}" class="btn btn-primary btn-rounded"><i
                                class="fas fa-plus"></i>Tambah Karyawan</a>
                    @endif
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
                    <div class="table-responsive">
                        <table id="multi_col_order" class="table border table-striped table-bordered text-nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Password</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}.</td>
                                        <td class="text-center">{{ $user->nip }}</td>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->jabatan }}</td>
                                        @if (Auth::user()->jabatan == 'Direktur')
                                            <td>
                                                <a href="{{ route('karyawan.edit', $user) }}" type="button"
                                                    class="btn btn-warning btn-rounded"><i class="far fa-edit"></i> Edit</a>
                                                <button type="button" class="btn btn-danger btn-rounded"
                                                    data-bs-toggle="modal" data-bs-target="#delModal"
                                                    data-user="{{ json_encode($user) }}" onclick="deleteSelected(this)"><i
                                                        class="far fa-trash-alt"></i>
                                                    Hapus</button>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Danger Header Modal -->
    <div id="delModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-danger">
                    <h4 class="modal-title" id="danger-header-modalLabel">Hapus Karyawan</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <form action="{{ route('karyawan.destroy', $user->nip) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btnDel">Hapus</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('jquery')
    <script>
        function deleteSelected(button) {
            var data = $(button).data('user');

            $('#delModal .modal-body p').html('Apakah Anda yakin ingin menghapus <b>' + data.nama +
                '</b> dari daftar karyawan?');

            $('#delModal form').attr('action', '/karyawan/' + data.nip);
        }
    </script>
@endsection
