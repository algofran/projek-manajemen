<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">ADD Aktivitas</h5>
                    <!-- Tampilkan pesan kesalahan jika ada -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Tampilkan pesan sukses jika ada -->
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <!-- Tampilkan pesan gagal jika ada -->
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                        <ul>
                            <li>Paket: {{ $paket }}</li>
                            <li>Periode: {{ $periode }}</li>
                            <li>Tagihan: {{ $tagihan }}</li>
                            <li>Status: {{ $status }}</li>
                            <li>Payment: {{ $payment }}</li>
                        </ul>
                    </div>
                    @endif

                </div>
                <div class="card-body">
                    <form action="{{ route('add.store') }}" method="post">
                        @csrf
                        
                        @foreach ($mitra as $item)
                        <input type="hidden" name="id_inst" value="{{ $item->id_inst}}">
                        @endforeach
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Periode</label>
                            <div class="col-md-10">
                                <input type="text" name="periode" class="form-control" value="{{ old('periode') }}" placeholder="Periode (Contoh : JANUARI 2024)..." required>
                                @if ($errors->has('periode'))
                                    <span class="text-danger">{{ $errors->first('periode') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Sektor</label>
                            <div class="col-md-10">
                                <input type="text" name="sektor" class="form-control" value="{{ old('sektor') }}" placeholder="Sektor/Area" required>
                                @if ($errors->has('sektor'))
                                    <span class="text-danger">{{ $errors->first('sektor') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Jumlah PA</label>
                            <div class="col-md-10">
                                <input type="text" name="PA" class="form-control" value="{{ old('PA') }}" placeholder="Jumlah Aktivasi (PA)..." required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Paket Serpo</label>
                            <div class="col-md-10">
                                <select class="form-control mb-md" name="paket">
                                    <option value="">Pilih Paket Untuk Serpo</option>
                                    <option value="0" {{ old('paket', $paket) == 0 ? 'selected' : '' }}>Tidak menggunkan paket</option>
                                    <option value="1" {{ old('paket', $paket) == 1 ? 'selected' : '' }}>Paket 2 - Serpo SBU Sulawesi & IBT 2022-2025</option>
                                    <option value="2" {{ old('paket', $paket) == 2 ? 'selected' : '' }}>Paket 3 - Serpo SBU Sulawesi & IBT 2022-2025</option>
                                    <option value="3" {{ old('paket', $paket) == 3 ? 'selected' : '' }}>Paket 7 - Serpo SBU Sulawesi & IBT 2022-2025</option>
                                    <option value="4" {{ old('paket', $paket) == 4 ? 'selected' : '' }}>Serpo URC Papua 1 - SBU Sulawesi & IBT 2022-2025</option>
                                    <option value="5" {{ old('paket', $paket) == 5 ? 'selected' : '' }}>Serpo URC Papua 2 - SBU Sulawesi & IBT 2022-2025</option>
                                    <option value="6" {{ old('paket', $paket) == 6 ? 'selected' : '' }}>Serpo URC Konawe - SBU Sulawesi & IBT 2022-2025</option>
                                    <!-- Tambahkan opsi lainnya di sini -->
                                </select>
                                @if ($errors->has('paket'))
                                    <span class="text-danger">{{ $errors->first('paket') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Tagihan</label>
                            <div class="col-md-10">
                                <input type="number" name="tagihan" class="form-control" value="{{ old('tagihan') }}" placeholder="Jumlah tagihan..." required>
                                @if ($errors->has('tagihan'))
                                    <span class="text-danger">{{ $errors->first('tagihan') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Status Perkerjaan</label>
                            <div class="col-md-10">
                                <select class="form-control form-select" name="status" required>
                                    <option value="">Pilih Status Perkerjaan</option>
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Pending</option>
                                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>On-Progress</option>
                                    <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Complete</option>
                                </select>
                                @if ($errors->has('status'))
                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Status Pembayaran</label>
                            <div class="col-md-10">
                                <select class="form-control form-select"  name="payment" required>
                                    <option value="">Pilih Status Pembayaran</option>
                                    <option value="0" {{ old('payment') == 0 ? 'selected' : '' }}>Belum Ditagih</option>
                                    <option value="1" {{ old('payment') == 1 ? 'selected' : '' }}>Proses Penagihan</option>
                                    <option value="2" {{ old('payment') == 2 ? 'selected' : '' }}>Sudah Terbayar</option>
                                </select>
                                @if ($errors->has('payment'))
                                    <span class="text-danger">{{ $errors->first('payment') }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Manager</label>
                            <div class="col-md-10">
                                <select class="form-control form-select" name="manager_id">
                                    <option>Pilih Manager</option>
                                   
                                        @foreach ($managers as $manager)
                                            <option value="{{ $manager->id }}">{{ ucwords($manager->username) }}</option>
                                        @endforeach
                                </select>
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
</x-app-layout>