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
                        <a href="{{ route('download.exel.rekappendapatan', request()->only(['data', 'start_date', 'end_date'])) }}" class="btn btn-success me-2"><i class="fas fa-download"></i> Excel</a>
                    </div>
                    <form method="GET" action="{{ route('rekapdatapendapatan') }}">
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
                    

                       <div class="table-responsive col-4 col-sm-12 mb-5">
                        <table class="table star-student table-hover table-striped">
                            <p class="fw-bolder">Keterangan Laporan</p>
                    <tr>
                        <td><h6>Dokumen</h6></td><td>:</td><td>
                           @switch($dataFilter)
                               @case(1)
                                   Iconnet
                                   @break
                               @case(2)
                                   Serpo
                                   @break
                                @case(3)
                                   Telkom Akses
                                   @break
                                @case(4)
                                   PLN (Persero)
                                   @break
                               @default
                                   Projek Lainnya
                           @endswitch
                        </td>
                    </tr>
                    @if($startDate && $endDate)
                    <tr>
                        <td><h6>Tanggal Mulai</h6></td><td>:</td><td>{{ $startDate }}</td>
                    </tr>
                    <tr>
                        <td><h6>Tanggal Selesai</h6></td><td>:</td><td>{{ $endDate }}</td>
                    </tr>
                    @endif
                    <tr>
                        @php
                            if ($dataFilter == 'projek'){
                                $cost = 'payment';
                            } else {
                                $cost = 'tagihan';
                            }
                       
                        @endphp
                        <td><h6>Total Dana</h6></td><td>:</td><td>{{ 'Rp'. number_format($pendapatan->sum($cost), 0, ',', '.') }}</td>
                    </tr>
                    </table>
                   </div>
                    <div class="table-responsive">
                        <table class="table border-0 star-student table-hover mb-0 datatable table-striped">
                            <thead class="student-thread">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    @if (request('data') == 'projek' || request('data') == '')
                                        <th>Nama Projek</th>
                                        <th>Biaya</th>
                                    @else
                                        <th>Biaya</th>
                                        <th>Sektor</th>
                                        <th>Paket</th>
                                    @endif
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendapatan as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->start_date }}</td>
                                        <td>{{ $item->end_date }}</td>
                                        @if (request('data') == 'projek' || request('data') == '')
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->payment }}</td>
                                            <td>{{ $item->description }}</td>
                                        @else
                                            @php
                                                $tagIndex = $item->paket;
                                                $paket = isset($paket_tag[$tagIndex]) ? $paket_tag[$tagIndex] : "";
                                            @endphp
                                            <td>{{ $item->tagihan }}</td>
                                            <td>{{ $item->sektor }}</td>
                                            <td>{{ $paket }}</td>
                                        @endif
                                        <td>{{ $item->keterangan }}</td>
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
