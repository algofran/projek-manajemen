@extends('layouts.layout') 
@section('content')
<div class="div">
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
                                <input type="hidden" name="project_id" value="{{ old('project_id', $project_id->id) }}">
                                
                                <div class="form-group">
                                    <label>Nama Pekerjaan</label>
                                    <input type="text" class="form-control @error('task') is-invalid @enderror" name="task" value="{{ old('task') }}" required>
                                    @error('task')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Penanggung jawab</label>
                                    <select class="form-control @error('user_id') is-invalid @enderror" name="user_id">
                                        <option value="">Pilih Penanggunjawab</option>
                                        @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}" {{ old('user_id') == $employee->id ? 'selected' : '' }}>
                                                {{ ucwords($employee->firstname.' '.$employee->lastname) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jadwal Pelaksana</label>
                                    <div class="col-md">
                                        <div class="input-group mb-3">
                                            <input type="date" class="form-control @error('date_created') is-invalid @enderror" placeholder="Mulai" name="date_created" value="{{ old('date_created') }}" required>
                                            <span class="input-group-text">s/d</span>
                                            <input type="date" class="form-control @error('due_date') is-invalid @enderror" placeholder="Selesai" name="due_date" value="{{ old('due_date') }}" required>
                                            @error('date_created')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            @error('due_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Project Status</label>
                                    <div class="border">
                                        <select class="form-control @error('status') is-invalid @enderror" name="status">
                                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Belum Dikerjakan</option>
                                            <option value="2" {{ old('status') == '2' ? 'selected' : '' }}>Sedang Dikerjakan</option>
                                            <option value="3" {{ old('status') == '3' ? 'selected' : '' }}>Sudah Selesai</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea rows="5" cols="5" class="form-control rounded border border-dark @error('description') is-invalid @enderror" name="description" placeholder="Keterangan..." required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
</div>
@endsection 
@section('script')
<script>
    feather.replace();
</script>
@endsection
