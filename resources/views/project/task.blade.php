<x-app-layout>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Tambah Tugas</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('task.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="project_id" value="{{ $project_id->id }}">
                                
                                <div class="form-group">
                                    <label>Nama Pekerjaan</label>
                                    <input type="text" class="form-control" name="task" required>
                                </div>
                                <div class="form-group">
                                    <label>Penanggung jawab</label>
                                    <select class="select" name="user_id">
                                        <option>Pilih Penanggunjawab</option>
                                        @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ ucwords($employee->firstname.' '.$employee->lastname) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jadwal Pelaksana</label>
                                    <div class="col-md">
                                        <div class="input-group mb-3">
                                            <input type="date" class="form-control" placeholder="Mulai" name="date_created" required>
                                            <span class="input-group-text">s/d</span>
                                            <input type="date" class="form-control" placeholder="Selesai" name="due_date" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Project Status</label>
                                    <div class="border">
                                        <select class="select" name="status">
                                            <option value="0">Belum Dikerjakan</option>
                                            <option value="1">Sedang Dikerjakan</option>
                                            <option value="3">Sudah Selesai</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea rows="5" cols="5" class="form-control rounded border border-dark" name="description" placeholder="Keterangan..." required></textarea>
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
