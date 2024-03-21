<x-app-layout>
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
                                    <input type="text" class="form-control rounded-pill border" name="name">
                                </div>
                                <div class="form-group">
                                    <label>No.Kontak/PO Project:</label>
                                    <input type="text" class="form-control rounded-pill border" name="po_number">
                                </div>
                                
                                <div class="form-group">
                                    <label>Project Manager</label>
                                        <select class="select" name="manager_id">
                                            <option></option>
                                           
                                                @foreach ($managers as $manager)
                                                    <option value="{{ $manager->id }}">{{ ucwords($manager->username) }}</option>
                                                @endforeach
                                        </select>
                                   
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>No.Invoice</label>
                                            <input type="text" class="form-control rounded-pill border" name="invoice">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tgl.Invoice</label>
                                            <input type="date" class="form-control rounded-pill border" name="invoice_date">
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
                                                <select class="select" name="pembayaran">
                                                    <option value="1">PT. PLN (PERSERO)</option>
                                                    <option value="2">PT. INDONESIA COMMNENTS PLUS</option>
                                                    <option value="3">PT. TELKOM AKSES</option>
                                                    <option value="4">LAIN2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Project Vendor</label>
                                            <div class="border">
                                                <select class="select" name="vendor">
                                                    <option value="1">PT. VISDAT TEKNIK UTAMA</option>
                                                    <option value="2">PT. CORDOVA BERKAH NUSATAMA</option>
                                                    <option value="3">CV. VISDAT TEKNIK UTAMA</option>
                                                    <option value="4">CV. VISUAL DATA KOMPUTER</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Tanggal Project</label>
                                    <div class="col-md">
                                        <div class="input-group mb-3">
                                            <input type="date" class="form-control" placeholder="Username" aria-label="Username" name="start_date">
                                            <span class="input-group-text">s/d</span>
                                            <input type="date" class="form-control" placeholder="Server" aria-label="Server" name="end_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label text-bold">Team Members</label>
                                    <select multiple class="form-control populate" name="user_ids[]">
                                        <option></option>
                                        @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}" {{ isset($user_ids) && in_array($employee->id, explode(',', $user_ids)) ? 'selected' : '' }}>
                                                {{ ucwords($employee->username) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Payment Status</label>
                                            <div class="border">
                                                <select class="select" name="payment_status">
                                                    <option value="0">Belum Ditagih</option>
                                                    <option value="1">Sudah Ditagih</option>
                                                    <option value="2">Sudah Terbayar</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Project Status</label>
                                            <div class="border">
                                                <select class="select" name="status">
                                                    <option value="0">Pending </option>
                                                    <option value="1">On-Progress</option>
                                                    <option value="3">Finish</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>No.Faktur Pajak</label>
                                            <input type="text" class="form-control rounded-pill border" name="fakturpajak">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tgl. faktur Pajak</label>
                                            <input type="date" class="form-control rounded-pill border" name="fp_date" data-date-format="yyyy-mm-dd" data-plugin-datepicker="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea rows="5" cols="5" class="form-control rounded border
                                placeholder="-"  name="description"></textarea>
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
</x-app-layout>