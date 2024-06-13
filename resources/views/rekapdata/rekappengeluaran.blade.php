@extends('layouts.layout')

@section('content')
<div class="div">
    <div class="row">
        <div class="col-sm-12 container">
            <div class="card-header fw-bolder fs-6 bg-danger bg-gradient text-white mb-4">
                Laporan Rekap
            </div>

            <div class="card card-table">
                <div class="card-body">
                    <div class="download-grp text-end ms-auto mb-3">
                        <a href="{{ route('download.exel.rekappengeluaran', request()->only(['data', 'start_date', 'end_date'])) }}" class="btn btn-success me-2"><i class="fas fa-download"></i> Excel</a>
                    </div>
                    <form method="GET" action="{{ route('rekapdatapengeluaran') }}">
                        <div class="row">
                            <div class="col-12 col-md-2 col-lg-2 col-xl-2 mb-3">
                                <select name="data" class="form-select">
                                    <option value="">Pilih Data</option>
                                    @foreach ($mitra as $item)
                                        <option value="{{ $item->id }}" {{ request('data') == $item->id ? 'selected' : '' }}>
                                            {{ $item->mitra }}
                                        </option>
                                    @endforeach
                                    <option value="projek" {{ request('data') == 'projek' ? 'selected' : '' }}>
                                        Projek Lain-lain
                                    </option>
                                </select>
                            </div>
                            <div class="col-12 col-xl-5 col-lg-5 col-md-8 mb-3">
                                <div class="input-group">
                                    <input type="date" class="form-control" name="start_date" value="{{ request('start_date') }}">
                                    <span class="input-group-text">Sampai</span>
                                    <input type="date" class="form-control" name="end_date" value="{{ request('end_date') }}">
                                    <button type="submit" class="btn btn-primary ms-2">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title"></h3>
                            </div>
                        </div>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                        <button type="button" class="btn-close me-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table border-0 star-student table-hover mb-0 datatable table-striped">
                            <thead class="student-thread">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Jenis Aktivitas</th>
                                    <th>Biaya</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengeluaran as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->subject }}</td>
                                    <td>{{ $item->cost }}</td>
                                    <td>{{ $item->comment }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    feather.replace();
</script>
@endsection
