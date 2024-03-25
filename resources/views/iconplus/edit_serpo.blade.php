<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Edit SERPO</h5>
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
                </div>
                <div class="card-body">
                    <form action="{{ route('serpo.update', $serpo->id) }}" method="post">
                        @csrf
                        @method('PUT') <!-- Ubah ini menjadi PATCH jika Anda menggunakan PATCH -->
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Paket Serpo</label>
                            <div class="col-md-10">
                                <select class="form-control mb-md" name="paket" required>
                                    <option value="">Pilih Paket Serpo</option>
                                    <option value="1" {{ old('paket', $serpo->paket) == 1 ? 'selected' : '' }}>Paket 2 - Serpo SBU Sulawesi & IBT 2022-2025</option>
                                    <option value="2" {{ old('paket', $serpo->paket) == 2 ? 'selected' : '' }}>Paket 3 - Serpo SBU Sulawesi & IBT 2022-2025</option>
                                    <option value="3" {{ old('paket', $serpo->paket) == 3 ? 'selected' : '' }}>Paket 7 - Serpo SBU Sulawesi & IBT 2022-2025</option>
                                    <option value="4" {{ old('paket', $serpo->paket) == 4 ? 'selected' : '' }}>Serpo URC Papua 1 - SBU Sulawesi & IBT 2022-2025</option>
                                    <option value="5" {{ old('paket', $serpo->paket) == 5 ? 'selected' : '' }}>Serpo URC Papua 2 - SBU Sulawesi & IBT 2022-2025</option>
                                    <option value="6" {{ old('paket', $serpo->paket) == 6 ? 'selected' : '' }}>Serpo URC Konawe - SBU Sulawesi & IBT 2022-2025</option>
                                    <!-- Tambahkan opsi lainnya di sini -->
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Periode</label>
                            <div class="col-md-10">
                                <input type="text" name="periode" class="form-control" value="{{ old('periode', $serpo->periode) }}" placeholder="Periode (Contoh : JANUARI 2024)..." required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Tagihan</label>
                            <div class="col-md-10">
                                <input type="number" name="tagihan" class="form-control" value="{{ old('tagihan', $serpo->tagihan) }}" placeholder="Jumlah tagihan..." required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Status Perkerjaan</label>
                            <div class="col-md-10">
                                <select class="form-control form-select" name="status" required>
                                    <option value="">Pilih Status Perkerjaan</option>
                                    <option value="0" {{ old('status', $serpo->status) == 0 ? 'selected' : '' }}>Pending</option>
                                    <option value="1" {{ old('status', $serpo->status) == 1 ? 'selected' : '' }}>On-Progress</option>
                                    <option value="2" {{ old('status', $serpo->status) == 2 ? 'selected' : '' }}>Complete</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Status Pembayaran</label>
                            <div class="col-md-10">
                                <select class="form-control form-select" name="payment" required>
                                    <option value="">Pilih Status Pembayaran</option>
                                    <option value="0" {{ old('payment', $serpo->payment) == 0 ? 'selected' : '' }}>Belum Ditagih</option>
                                    <option value="1" {{ old('payment', $serpo->payment) == 1 ? 'selected' : '' }}>Proses Penagihan</option>
                                    <option value="2" {{ old('payment', $serpo->payment) == 2 ? 'selected' : '' }}>Sudah Terbayar</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Serpo Manager</label>
                            <div class="col-md-10">
                                <select class="form-control form-select" name="manager_id">
                                    <option value="">Pilih Serpo Manager</option>
                                    @foreach ($managers as $manager)
                                    <option value="{{ $manager->id }}" {{ old('manager_id', $serpo->manager_id) == $manager->id ? 'selected' : '' }}>{{ ucwords($manager->username) }}</option>
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
