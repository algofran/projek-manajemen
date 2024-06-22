
@extends('layouts.layout') @section('content')
<div class="div">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">ADD Aktivitas</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('add.store') }}" method="post">
                            @csrf
                        
                            <input type="hidden" name="id_inst" value="{{ $mitra->id }}">
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Periode</label>
                                <div class="col-md-10">
                                    <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" value="{{ old('periode') }}" placeholder="Periode (Contoh : JANUARI 2024)..." required>
                                    @error('periode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Sektor</label>
                                <div class="col-md-10">
                                    <input type="text" name="sektor" class="form-control @error('sektor') is-invalid @enderror" value="{{ old('sektor') }}" placeholder="Sektor/Area" required>
                                    @error('sektor')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Keterangan</label>
                                <div class="col-md-10">
                                    <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" value="{{ old('keterangan') }}" placeholder="Keterangan.." required>
                                    @error('keterangan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Jumlah PA</label>
                                <div class="col-md-10">
                                    <input type="text" name="PA" class="form-control @error('PA') is-invalid @enderror" value="{{ old('PA') }}" placeholder="Jumlah Aktivasi (PA)..." required>
                                    @error('PA')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Paket Serpo</label>
                                <div class="col-md-10">
                                    <select class="form-control mb-md @error('paket') is-invalid @enderror" name="paket">
                                        <option value="">Pilih Paket Untuk Serpo</option>
                                        <option value="0" {{ old('paket') == 0 ? 'selected' : '' }}>Tidak menggunakan paket</option>
                                        <option value="1" {{ old('paket') == 1 ? 'selected' : '' }}>Paket 2 - Serpo SBU Sulawesi & IBT 2022-2025</option>
                                        <option value="2" {{ old('paket') == 2 ? 'selected' : '' }}>Paket 3 - Serpo SBU Sulawesi & IBT 2022-2025</option>
                                        <option value="3" {{ old('paket') == 3 ? 'selected' : '' }}>Paket 7 - Serpo SBU Sulawesi & IBT 2022-2025</option>
                                        <option value="4" {{ old('paket') == 4 ? 'selected' : '' }}>Serpo URC Papua 1 - SBU Sulawesi & IBT 2022-2025</option>
                                        <option value="5" {{ old('paket') == 5 ? 'selected' : '' }}>Serpo URC Papua 2 - SBU Sulawesi & IBT 2022-2025</option>
                                        <option value="6" {{ old('paket') == 6 ? 'selected' : '' }}>Serpo URC Konawe - SBU Sulawesi & IBT 2022-2025</option>
                                    </select>
                                    @error('paket')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Tagihan</label>
                                <div class="col-md-10">
                                    <input type="number" name="tagihan" class="form-control @error('tagihan') is-invalid @enderror" value="{{ old('tagihan') }}" placeholder="Jumlah tagihan...">
                                    @error('tagihan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Start Date</label>
                                <div class="col-md-10">
                                    <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date', now()->format('Y-m-d')) }}" required>
                                    @error('start_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">End Date</label>
                                <div class="col-md-10">
                                    <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}">
                                    @error('end_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Status Pekerjaan</label>
                                <div class="col-md-10">
                                    <select class="form-control form-select @error('status') is-invalid @enderror" name="status" required>
                                        <option value="">Pilih Status Pekerjaan</option>
                                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Pending</option>
                                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>On-Progress</option>
                                        <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Complete</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Status Pembayaran</label>
                                <div class="col-md-10">
                                    <select class="form-control form-select @error('payment') is-invalid @enderror" name="payment" required>
                                        <option value="">Pilih Status Pembayaran</option>
                                        <option value="0" {{ old('payment') == 0 ? 'selected' : '' }}>Belum Ditagih</option>
                                        <option value="1" {{ old('payment') == 1 ? 'selected' : '' }}>Proses Penagihan</option>
                                        <option value="2" {{ old('payment') == 2 ? 'selected' : '' }}>Sudah Terbayar</option>
                                    </select>
                                    @error('payment')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">BANK</label>
                                <div class="col-md-10">
                                    <select class="form-control form-select @error('bank') is-invalid @enderror" name="bank" required>
                                        <option value="">Pilih Bank</option>
                                        <option value="BRI" {{ old('bank') == 'BRI' ? 'selected' : '' }}>BRI</option>
                                        <option value="MANDIRI" {{ old('bank') == 'MANDIRI' ? 'selected' : '' }}>MANDIRI</option>
                                        <option value="BCA" {{ old('bank') == 'BCA' ? 'selected' : '' }}>BCA</option>
                                        <option value="BTN" {{ old('bank') == 'BTN' ? 'selected' : '' }}>BTN</option>
                                        <option value="Lainnya" {{ old('bank') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                    @error('bank')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Manager</label>
                                <div class="col-md-10">
                                    <select class="form-control form-select @error('manager_id') is-invalid @enderror" name="manager_id" required>
                                        <option value="">Pilih Manager</option>
                                        @foreach ($managers as $manager)
                                            <option value="{{ $manager->id }}" {{ old('manager_id') == $manager->id ? 'selected' : '' }}>
                                                {{ ucwords($manager->username) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('manager_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <footer class="panel-footer">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                        <button class="btn btn-danger">Cancel</button>
                                    </div>
                                </div>
                            </footer>
                        </form>
                        
                    </div>
                </div>
        
            </div>
        </div>
    
    </div>
    @endsection @section('script')
    <script>
        feather.replace();
    </script>
    @endsection