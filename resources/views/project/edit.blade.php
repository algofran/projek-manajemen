
@extends('layouts.layout') @section('content')
<div class="div">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Edit Project</h5>
                       
        
                    </div>
                    <div class="card-body">
                        <form action="{{ route('project.update', $project->id) }}" method="post">
                            @csrf
                           
        
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Project:</label>
                                        <input type="text" class="form-control rounded-pill border" name="name" value="{{ $project->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label>No.Kontak/PO Project:</label>
                                        <input type="text" class="form-control rounded-pill border" name="po_number" value="{{ $project->po_number }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Project Manager</label>
                                        <select class="select form-control" name="user_id">
                                            <option></option>
                                            @foreach ($managers as $manager)
                                                <option value="{{ $manager->id }}" {{ $project->user_id == $manager->id ? 'selected' : '' }}>
                                                    {{ ucwords($manager->username) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nilai Project</label>
                                                <input type="number" value="{{ $project->payment }}" class="form-control rounded-pill border" name="payment">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Bank</label>
                                        <div class="border">
                                            <select class="select" name="pembayaran">
                                                <option value="BRI">BRI</option>
                                                <option value="MANDIRI">MANDIRI</option>
                                                <option value="BCA">BCA</option>
                                                <option value="BTN">BTN</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>No.Invoice</label>
                                                <input type="text" class="form-control rounded-pill border" name="invoice" value="{{ $project->invoice }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tgl.Invoice</label>
                                                <input type="date" class="form-control rounded-pill border" name="invoice_date" value="{{ $project->inv_date }}">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Project Owner</label>
                                                <select class="select form-control" name="pembayaran">
                                                    <option value="1" {{ $project->pembayaran == 1 ? 'selected' : '' }}>PT. PLN (PERSERO)</option>
                                                    <option value="2" {{ $project->pembayaran == 2 ? 'selected' : '' }}>PT. INDONESIA COMMNENTS PLUS</option>
                                                    <option value="3" {{ $project->pembayaran == 3 ? 'selected' : '' }}>PT. TELKOM AKSES</option>
                                                    <option value="4" {{ $project->pembayaran == 4 ? 'selected' : '' }}>LAIN2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Project Vendor</label>
                                                <select class="select form-control" name="vendor">
                                                    <option value="1" {{ $project->vendor == 1 ? 'selected' : '' }}>PT. VISDAT TEKNIK UTAMA</option>
                                                    <option value="2" {{ $project->vendor == 2 ? 'selected' : '' }}>PT. CORDOVA BERKAH NUSATAMA</option>
                                                    <option value="3" {{ $project->vendor == 3 ? 'selected' : '' }}>CV. VISDAT TEKNIK UTAMA</option>
                                                    <option value="4" {{ $project->vendor == 4 ? 'selected' : '' }}>CV. VISUAL DATA KOMPUTER</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label>Tanggal Project</label>
                                        <div class="col-md">
                                            <div class="input-group mb-3">
                                                <input type="date" class="form-control" placeholder="Username" aria-label="Username" name="start_date" value="{{ $project->start_date }}">
                                                <span class="input-group-text">s/d</span>
                                                <input type="date" class="form-control" placeholder="Server" aria-label="Server" name="end_date" value="{{ $project->end_date }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label text-bold">Team Members</label>
                                        <select multiple class="form-control populate" name="user_ids[]">
                                            <option></option>
                                            @foreach($employees as $employee)
                                                <option value="{{ $employee->id }}" {{ in_array($employee->id, explode(',', $project->user_ids)) ? 'selected' : '' }}>
                                                    {{ ucwords($employee->username) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Payment Status</label>
                                                <select class="select form-control" name="payment_status">
                                                    <option value="0" {{ $project->payment_status == 0 ? 'selected' : '' }}>Belum Ditagih</option>
                                                    <option value="1" {{ $project->payment_status == 1 ? 'selected' : '' }}>Sudah Ditagih</option>
                                                    <option value="2" {{ $project->payment_status == 2 ? 'selected' : '' }}>Sudah Terbayar</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Project Status</label>
                                                <select class="select form-control" name="status">
                                                    <option value="1" {{ $project->status == 1 ? 'selected' : '' }}>Pending</option>
                                                    <option value="2" {{ $project->status == 2 ? 'selected' : '' }}>On-Progress</option>
                                                    <option value="5" {{ $project->status == 3 ? 'selected' : '' }}>Finish</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>No.Faktur Pajak</label>
                                                <input type="text" class="form-control rounded-pill border" name="fakturpajak" value="{{ $project->fakturpajak }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tgl. faktur Pajak</label>
                                                <input type="date" class="form-control rounded-pill border" name="fp_date" data-date-format="yyyy-mm-dd" data-plugin-datepicker="" value="{{ $project->fp_date }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea rows="5" cols="5" class="form-control rounded border"
                                    placeholder="-"  name="description">{{ $project->description }}</textarea>
                                </div>
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