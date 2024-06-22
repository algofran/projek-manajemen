@extends('layouts.layout')
@section('content')
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
                                    <input type="text" class="form-control rounded-pill border @error('name') is-invalid @enderror" name="name" value="{{ old('name', $project->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>No.Kontak/PO Project:</label>
                                    <input type="text" class="form-control rounded-pill border @error('po_number') is-invalid @enderror" name="po_number" value="{{ old('po_number', $project->po_number) }}">
                                    @error('po_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Project Manager</label>
                                    <select class="select form-control @error('user_id') is-invalid @enderror" name="user_id">
                                        <option>Pilih Manager</option>
                                        @foreach ($managers as $manager)
                                            <option value="{{ $manager->id }}" {{ old('user_id', $project->user_id) == $manager->id ? 'selected' : '' }}>{{ ucwords($manager->username) }}</option>
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
                                            <input type="text" class="form-control rounded-pill border @error('invoice') is-invalid @enderror" name="invoice" value="{{ old('invoice', $project->invoice) }}">
                                            @error('invoice')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tgl.Invoice</label>
                                            <input type="date" class="form-control rounded-pill border @error('invoice_date') is-invalid @enderror" name="invoice_date" value="{{ old('invoice_date', $project->inv_date) }}">
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
                                            <input type="number" class="form-control rounded-pill border @error('payment') is-invalid @enderror" name="payment" value="{{ old('payment', $project->payment) }}">
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
                                                <option value="BRI" {{ old('bank', $project->bank) == 'BRI' ? 'selected' : '' }}>BRI</option>
                                                <option value="MANDIRI" {{ old('bank', $project->bank) == 'MANDIRI' ? 'selected' : '' }}>MANDIRI</option>
                                                <option value="BCA" {{ old('bank', $project->bank) == 'BCA' ? 'selected' : '' }}>BCA</option>
                                                <option value="BTN" {{ old('bank', $project->bank) == 'BTN' ? 'selected' : '' }}>BTN</option>
                                                <option value="Lainnya" {{ old('bank', $project->bank) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
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
                                                    <option value="1" {{ old('pembayaran', $project->pembayaran) == '1' ? 'selected' : '' }}>PT. PLN (PERSERO)</option>
                                                    <option value="2" {{ old('pembayaran', $project->pembayaran) == '2' ? 'selected' : '' }}>PT. INDONESIA COMNET PLUS</option>
                                                    <option value="3" {{ old('pembayaran', $project->pembayaran) == '3' ? 'selected' : '' }}>TELKOM AKSES</option>
                                                    <option value="4" {{ old('pembayaran', $project->pembayaran) == '4' ? 'selected' : '' }}>LAIN2</option>
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
                                                    <option value="1" {{ old('vendor', $project->vendor) == '1' ? 'selected' : '' }}>PT. VISDAT TEKNIK UTAMA</option>
                                                    <option value="2" {{ old('vendor', $project->vendor) == '2' ? 'selected' : '' }}>PT. CORDOVA BERKAH NUSATAMA</option>
                                                    <option value="3" {{ old('vendor', $project->vendor) == '3' ? 'selected' : '' }}>CV. VISDAT TEKNIK UTAMA</option>
                                                    <option value="4" {{ old('vendor', $project->vendor) == '4' ? 'selected' : '' }}>CV. VISUAL DATA KOMPUTER</option>
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
                                            <input type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date', $project->start_date) }}">
                                            <span class="input-group-text">s/d</span>
                                            <input type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date', $project->end_date) }}">
                                            @error('start_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            @error('end_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label text-bold @error('user_ids') is-invalid @enderror">Team Members</label>
                                    <select multiple class="form-control populate" name="user_ids[]">
                                        <option></option>
                                        @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}" {{ in_array($employee->id, old('user_ids', explode(',', $project->user_ids))) ? 'selected' : '' }}>
                                                {{ ucwords($employee->username) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_ids')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Payment Status</label>
                                            <div class="border">
                                                <select class="select form-control @error('payment_status') is-invalid @enderror" name="payment_status">
                                                    <option value="0" {{ old('payment_status', $project->payment_status) == '0' ? 'selected' : '' }}>Belum Ditagih</option>
                                                    <option value="1" {{ old('payment_status', $project->payment_status) == '1' ? 'selected' : '' }}>Sudah Ditagih</option>
                                                    <option value="2" {{ old('payment_status', $project->payment_status) == '2' ? 'selected' : '' }}>Sudah Terbayar</option>
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
                                                    <option value="1" {{ old('status', $project->status) == '1' ? 'selected' : '' }}>Pending </option>
                                                    <option value="2" {{ old('status', $project->status) == '2' ? 'selected' : '' }}>On-Progress</option>
                                                    <option value="3" {{ old('status', $project->status) == '3' ? 'selected' : '' }}>Finish</option>
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
                                            <input type="text" class="form-control rounded-pill border @error('fakturpajak') is-invalid @enderror" value="{{ old('fakturpajak', $project->fakturpajak) }}" name="fakturpajak">
                                            @error('fakturpajak')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tgl. Faktur Pajak</label>
                                            <input type="date" class="form-control rounded-pill border @error('fp_date') is-invalid @enderror" name="fp_date" value="{{ old('fp_date', $project->fp_date) }}" data-date-format="yyyy-mm-dd" data-plugin-datepicker="">
                                            @error('fp_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea rows="5" cols="5" class="form-control rounded border @error('description') is-invalid @enderror" placeholder="-" name="description">{{ old('description', $project->description) }}</textarea>
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

<style>
        .selectMultiple {
    width: 350px;
    position: relative;
}

.selectMultiple select {
    display: none;
}

.selectMultiple>div {
    position: relative;
    z-index: 2;
    padding: 8px 12px 2px 12px;
    border-radius: 10px;
    background: #fff;
    font-size: 14px;
    min-height: 44px;
    box-shadow: 0 4px 16px 0 rgba(22, 42, 90, 0.12);
    transition: box-shadow 0.3s ease;
}

.selectMultiple>div:hover {
    box-shadow: 0 4px 24px -1px rgba(22, 42, 90, 0.16);
}

.selectMultiple>div .arrow {
    right: 1px;
    top: 0;
    bottom: 0;
    cursor: pointer;
    width: 28px;
    position: absolute;
}

.selectMultiple>div .arrow:before,
.selectMultiple>div .arrow:after {
    content: "";
    position: absolute;
    display: block;
    width: 2px;
    height: 8px;
    border-bottom: 8px solid #99A3BA;
    top: 43%;
    transition: all 0.3s ease;
}

.selectMultiple>div .arrow:before {
    right: 12px;
    transform: rotate(-130deg);
}

.selectMultiple>div .arrow:after {
    left: 9px;
    transform: rotate(130deg);
}

.selectMultiple>div span {
    color: #99A3BA;
    display: block;
    position: absolute;
    left: 12px;
    cursor: pointer;
    top: 8px;
    line-height: 28px;
    transition: all 0.3s ease;
}

.selectMultiple>div span.hide {
    opacity: 0;
    visibility: hidden;
    transform: translate(-4px, 0);
}

.selectMultiple>div a {
    position: relative;
    padding: 0 24px 6px 8px;
    line-height: 28px;
    color: #1E2330;
    display: inline-block;
    vertical-align: top;
    margin: 0 6px 0 0;
}

.selectMultiple>div a em {
    font-style: normal;
    display: block;
    white-space: nowrap;
}

.selectMultiple>div a:before {
    content: "";
    left: 0;
    top: 0;
    bottom: 6px;
    width: 100%;
    position: absolute;
    display: block;
    background: rgba(228, 236, 250, 0.7);
    z-index: -1;
    border-radius: 4px;
}

.selectMultiple>div a i {
    cursor: pointer;
    position: absolute;
    top: 0;
    right: 0;
    width: 24px;
    height: 28px;
    display: block;
}

.selectMultiple>div a i:before,
.selectMultiple>div a i:after {
    content: "";
    display: block;
    width: 2px;
    height: 10px;
    position: absolute;
    left: 50%;
    top: 50%;
    background: #4D18FF;
    border-radius: 1px;
}

.selectMultiple>div a i:before {
    transform: translate(-50%, -50%) rotate(45deg);
}

.selectMultiple>div a i:after {
    transform: translate(-50%, -50%) rotate(-45deg);
}

.selectMultiple>div a.notShown {
    opacity: 0;
    transition: opacity 0.3s ease;
}

.selectMultiple>div a.notShown:before {
    width: 28px;
    transition: width 0.45s cubic-bezier(0.87, -0.41, 0.19, 1.44) 0.2s;
}

.selectMultiple>div a.notShown i {
    opacity: 0;
    transition: all 0.3s ease 0.3s;
}

.selectMultiple>div a.notShown em {
    opacity: 0;
    transform: translate(-6px, 0);
    transition: all 0.4s ease 0.3s;
}

.selectMultiple>div a.notShown.shown {
    opacity: 1;
}

.selectMultiple>div a.notShown.shown:before {
    width: 100%;
}

.selectMultiple>div a.notShown.shown i {
    opacity: 1;
}

.selectMultiple>div a.notShown.shown em {
    opacity: 1;
    transform: translate(0, 0);
}

.selectMultiple>div a.remove:before {
    width: 28px;
    transition: width 0.4s cubic-bezier(0.87, -0.41, 0.19, 1.44) 0s;
}

.selectMultiple>div a.remove i {
    opacity: 0;
    transition: all 0.3s ease 0s;
}

.selectMultiple>div a.remove em {
    opacity: 0;
    transform: translate(-12px, 0);
    transition: all 0.4s ease 0s;
}

.selectMultiple>div a.remove.disappear {
    opacity: 0;
    transition: opacity 0.5s ease 0s;
}

.selectMultiple>ul {
    margin: 0;
    padding: 0;
    list-style: none;
    font-size: 16px;
    z-index: 1;
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    visibility: hidden;
    opacity: 0;
    border-radius: 8px;
    transform: translate(0, 20px) scale(0.8);
    transform-origin: 0 0;
    filter: drop-shadow(0 12px 20px rgba(22, 42, 90, 0.08));
    transition: all 0.4s ease, transform 0.4s cubic-bezier(0.87, -0.41, 0.19, 1.44), filter 0.3s ease 0.2s;
}

.selectMultiple>ul li {
    color: #1E2330;
    background: #fff;
    padding: 12px 16px;
    cursor: pointer;
    overflow: hidden;
    position: relative;
    transition: background 0.3s ease, color 0.3s ease, transform 0.3s ease 0.3s, opacity 0.5s ease 0.3s, border-radius 0.3s ease 0.3s;
}

.selectMultiple>ul li:first-child {
    border-radius: 8px 8px 0 0;
}

.selectMultiple>ul li:first-child:last-child {
    border-radius: 8px;
}

.selectMultiple>ul li:last-child {
    border-radius: 0 0 8px 8px;
}

.selectMultiple>ul li:last-child:first-child {
    border-radius: 8px;
}

.selectMultiple>ul li:hover {
    background: #4D18FF;
    color: #fff;
}

.selectMultiple>ul li:after {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    width: 6px;
    height: 6px;
    background: rgba(0, 0, 0, 0.4);
    opacity: 0;
    border-radius: 100%;
    transform: scale(1, 1) translate(-50%, -50%);
    transform-origin: 50% 50%;
}

.selectMultiple>ul li.beforeRemove {
    border-radius: 0 0 8px 8px;
}

.selectMultiple>ul li.beforeRemove:first-child {
    border-radius: 8px;
}

.selectMultiple>ul li.afterRemove {
    border-radius: 8px 8px 0 0;
}

.selectMultiple>ul li.afterRemove:last-child {
    border-radius: 8px;
}

.selectMultiple>ul li.remove {
    transform: scale(0);
    opacity: 0;
}

.selectMultiple>ul li.remove:after {
    -webkit-animation: ripple 0.4s ease-out;
    animation: ripple 0.4s ease-out;
}

.selectMultiple>ul li.notShown {
    display: none;
    transform: scale(0);
    opacity: 0;
    transition: transform 0.35s ease, opacity 0.4s ease;
}

.selectMultiple>ul li.notShown.show {
    transform: scale(1);
    opacity: 1;
}

.selectMultiple.open>div {
    box-shadow: 0 4px 20px -1px rgba(22, 42, 90, 0.12);
}

.selectMultiple.open>div .arrow:before {
    transform: rotate(-50deg);
}

.selectMultiple.open>div .arrow:after {
    transform: rotate(50deg);
}

.selectMultiple.open>ul {
    transform: translate(0, 12px) scale(1);
    opacity: 1;
    visibility: visible;
    filter: drop-shadow(0 16px 24px rgba(22, 42, 90, 0.16));
}

@-webkit-keyframes ripple {
    0% {
        transform: scale(0, 0);
        opacity: 1;
    }
    25% {
        transform: scale(30, 30);
        opacity: 1;
    }
    100% {
        opacity: 0;
        transform: scale(50, 50);
    }
}

@keyframes ripple {
    0% {
        transform: scale(0, 0);
        opacity: 1;
    }
    25% {
        transform: scale(30, 30);
        opacity: 1;
    }
    100% {
        opacity: 0;
        transform: scale(50, 50);
    }
}

</style>
@endsection
@section('script')
<script>
    feather.replace();
</script>
@endsection
