@extends('layouts.layout') 
@section('content')
<div class="div">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Add Project</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('project.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Project:</label>
                                    <input type="text" class="form-control rounded-pill border @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>No.Kontak/PO Project:</label>
                                    <input type="text" class="form-control rounded-pill border @error('po_number') is-invalid @enderror" name="po_number" value="{{ old('po_number') }}">
                                    @error('po_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label>Project Manager</label>
                                    <select class="select form-control @error('user_id') is-invalid @enderror" name="user_id">
                                        <option>Pilih Manager</option>
                                        @foreach ($managers as $manager)
                                            <option value="{{ $manager->id }}" {{ old('user_id') == $manager->id ? 'selected' : '' }}>{{ ucwords($manager->username) }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>No.Invoice</label>
                                            <input type="text" class="form-control rounded-pill border @error('invoice') is-invalid @enderror" name="invoice" value="{{ old('invoice') }}">
                                            @error('invoice')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tgl.Invoice</label>
                                            <input type="date" class="form-control rounded-pill border @error('invoice_date') is-invalid @enderror" name="invoice_date" value="{{ old('invoice_date') }}">
                                            @error('invoice_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nilai Project</label>
                                            <input type="number" class="form-control rounded-pill border @error('payment') is-invalid @enderror" name="payment" value="{{ old('payment') }}">
                                            @error('payment')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Bank</label>
                                        <div class="border">
                                            <select class="select form-control @error('bank') is-invalid @enderror" name="bank">
                                                <option value="">Pilih Bank</option>
                                                <option value="BRI" {{ old('bank') == 'BRI' ? 'selected' : '' }}>BRI</option>
                                                <option value="MANDIRI" {{ old('bank') == 'MANDIRI' ? 'selected' : '' }}>MANDIRI</option>
                                                <option value="BCA" {{ old('bank') == 'BCA' ? 'selected' : '' }}>BCA</option>
                                                <option value="BTN" {{ old('bank') == 'BTN' ? 'selected' : '' }}>BTN</option>
                                                <option value="Lainnya" {{ old('bank') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                            </select>
                                            @error('bank')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Project Owner</label>
                                            <div class="border">
                                                <select class="select form-control @error('pembayaran') is-invalid @enderror" name="pembayaran">
                                                    <option value="1" {{ old('pembayaran') == '1' ? 'selected' : '' }}>PT. PLN (PERSERO)</option>
                                                    <option value="2" {{ old('pembayaran') == '2' ? 'selected' : '' }}>PT. INDONESIA COMMNETS PLUS</option>
                                                    <option value="3" {{ old('pembayaran') == '3' ? 'selected' : '' }}>PT. TELKOM AKSES</option>
                                                    <option value="4" {{ old('pembayaran') == '4' ? 'selected' : '' }}>LAIN2</option>
                                                </select>
                                                @error('pembayaran')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Project Vendor</label>
                                            <div class="border">
                                                <select class="select form-control @error('vendor') is-invalid @enderror" name="vendor">
                                                    <option value="1" {{ old('vendor') == '1' ? 'selected' : '' }}>PT. VISDAT TEKNIK UTAMA</option>
                                                    <option value="2" {{ old('vendor') == '2' ? 'selected' : '' }}>PT. CORDOVA BERKAH NUSATAMA</option>
                                                    <option value="3" {{ old('vendor') == '3' ? 'selected' : '' }}>CV. VISDAT TEKNIK UTAMA</option>
                                                    <option value="4" {{ old('vendor') == '4' ? 'selected' : '' }}>CV. VISUAL DATA KOMPUTER</option>
                                                </select>
                                                @error('vendor')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Tanggal Project</label>
                                    <div class="col-md">
                                        <div class="input-group mb-3">
                                            <input type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date') }}">
                                            <span class="input-group-text">s/d</span>
                                            <input type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date') }}">
                                            @error('start_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            @error('end_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label text-bold @error('user_ids') is-invalid @enderror">Team Members</label>
                                            <select multiple class="form-control populate" name="user_ids[]">
                                                <option></option>
                                                @foreach($employees as $employee)
                                                    <option value="{{ $employee->id }}" {{ in_array($employee->id, old('user_ids', [])) ? 'selected' : '' }}>
                                                        {{ ucwords($employee->username) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('user_ids')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div> 
                                    </div>
                                </div>                               
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Payment Status</label>
                                            <div class="border">
                                                <select class="select form-control @error('payment_status') is-invalid @enderror" name="payment_status">
                                                    <option value="0" {{ old('payment_status') == '0' ? 'selected' : '' }}>Belum Ditagih</option>
                                                    <option value="1" {{ old('payment_status') == '1' ? 'selected' : '' }}>Sudah Ditagih</option>
                                                    <option value="2" {{ old('payment_status') == '2' ? 'selected' : '' }}>Sudah Terbayar</option>
                                                </select>
                                                @error('payment_status')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Project Status</label>
                                            <div class="border">
                                                <select class="select form-control @error('status') is-invalid @enderror" name="status">
                                                    <option value="1">Pending </option>
                                                    <option value="2">On-Progress</option>
                                                    <option value="3">Finish</option>
                                                </select>
                                                @error('status')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>No.Faktur Pajak</label>
                                            <input type="text" class="form-control rounded-pill border @error('fakturpajak') is-invalid @enderror" value="{{ old('fakturpajak')}}" name="fakturpajak" >
                                            @error('fakturpajak')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tgl. faktur Pajak</label>
                                            <input type="date" class="form-control rounded-pill border @error('fp_date') is-invalid @enderror" name="fp_date"  value="{{ old('fp_date')}}" data-date-format="yyyy-mm-dd" data-plugin-datepicker="">
                                            @error('fp_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea rows="5" cols="5" class="form-control rounded border @error('description') is-invalid @enderror" placeholder="-"  name="description">{{ old('description')}}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
@endsection 
@section('script')
<script>
    feather.replace();
</script>
@endsection
