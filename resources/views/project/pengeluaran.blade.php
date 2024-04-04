<x-app-layout>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Tambah Tugas</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('pengeluaran.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="project_id" value="{{ $project_id->id }}">
                                <div class="form-group">
                                    <label>Project Status</label>
                                    <div class="border">
                                        <select class="select" name="subject">
                                            <option value="Biaya Operasional" {{ isset($subject) && $subject == "Biaya Operasional" ? 'selected' : '' }}>Biaya Operasional</option>
                                            <option value="Biaya Material" {{ isset($subject) && $subject == "Biaya Material" ? 'selected' : '' }}>Biaya Material</option>
                                            <option value="Biaya Tools" {{ isset($subject) && $subject == "Biaya Tools" ? 'selected' : '' }}>Biaya Tools</option>
                                            <option value="Biaya Gaji/Fee" {{ isset($subject) && $subject == "Biaya Gaji/Fee" ? 'selected' : '' }}>Biaya Gaji/Fees</option>
                                            <option value="Biaya Lainnya" {{ isset($subject) && $subject == "Biaya Lainnya" ? 'selected' : '' }}>Biaya Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nama Pengguna</label>
                                    <select class="select" name="user_id">
                                        <option>Pilih Pengguna</option>
                                        @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ ucwords($employee->firstname.' '.$employee->lastname) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <div class="col-md">
                                        <div class="input-group mb-3">
                                            <input type="date" class="form-control" name="date" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Activity Cost</label>
                                    <input type="number" class="form-control" name="cost" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea rows="5" cols="5" class="form-control rounded border border-dark" name="comment" placeholder="Keterangan..." required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mx-2">Submit</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
