
@extends('layouts.layout') @section('content')
<div class="div">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Tambah Tugas</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('_add.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="project_id" value="{{ $project_id->id }}">
                                <input type="hidden" name="id_inst" value="{{ $project_id->id_inst }}">
                                <div class="form-group">
                                    <label>Project Status</label>
                                    <div class="border">
                                        <select class="select @error('subject') is-invalid @enderror" name="subject">
                                            <option value="Biaya Operasional" {{ isset($subject) && $subject == "Biaya Operasional" ? 'selected' : '' }}>Biaya Operasional</option>
                                            <option value="Biaya Material" {{ isset($subject) && $subject == "Biaya Material" ? 'selected' : '' }}>Biaya Material</option>
                                            <option value="Biaya Tools" {{ isset($subject) && $subject == "Biaya Tools" ? 'selected' : '' }}>Biaya Tools</option>
                                            <option value="Biaya Gaji" {{ isset($subject) && $subject == "Biaya Gaji" ? 'selected' : '' }}>Biaya Gaji</option>
                                            <option value="Biaya Lainnya" {{ isset($subject) && $subject == "Biaya Lainnya" ? 'selected' : '' }}>Biaya Lainnya</option>
                                        </select>
                                        @error('subject')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nama Pengguna</label>
                                    <select class="select @error('user_id') is-invalid @enderror" name="user_id">
                                        <option>Pilih Pengguna</option>
                                        @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ ucwords($employee->firstname.' '.$employee->lastname) }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <div class="col-md">
                                        <div class="input-group mb-3">
                                            <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" required>
                                            @error('date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Activity Cost</label>
                                    <input type="number" class="form-control @error('cost') is-invalid @enderror" name="cost" value="{{ old('cost') }}" required>
                                    @error('cost')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea rows="5" cols="5" class="form-control rounded border border-dark @error('comment') is-invalid @enderror" name="comment" placeholder="Keterangan...">{{ old('comment') }}</textarea>
                            @error('comment')
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
    @endsection @section('script')
    <script>
        feather.replace();
    </script>
    @endsection
