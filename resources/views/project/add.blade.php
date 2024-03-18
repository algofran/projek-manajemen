<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Add Project</h5>
                </div>
                <div class="card-body">
                    <form action="#">
                        <div class="row">
                            <div class="col-md-6">
    
                                <div class="form-group">
                                    <label>Nama Project:</label>
                                    <input type="text" class="form-control rounded-pill border">
                                </div>
                                <div class="form-group">
                                    <label>No.Kontak/PO Project:</label>
                                    <input type="text" class="form-control rounded-pill border">
                                </div>
                                <div class="form-group">
                                    <label>Project Manager</label>
                                    <div class="div border">
                                        <select class="select">
                                            <option>Select State</option>
                                            <option value="1">California</option>
                                            <option value="2">Texas</option>
                                            <option value="3">Florida</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>No.Invoice</label>
                                            <input type="text" class="form-control rounded-pill border">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tgl.Invoice</label>
                                            <input type="date" class="form-control rounded-pill border">
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
                                                <select class="select">
                                                    <option>Select Owner</option>
                                                    <option value="1">USA</option>
                                                    <option value="2">France</option>
                                                    <option value="3">India</option>
                                                    <option value="4">Spain</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Project Vendor</label>
                                            <div class="border">
                                                <select class="select">
                                                    <option>Select Vendor</option>
                                                    <option value="1">USA</option>
                                                    <option value="2">France</option>
                                                    <option value="3">India</option>
                                                    <option value="4">Spain</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Tanggal Project</label>
                                    <div class="col-md-5">
                                        <div class="form-group">
    
                                            <input type="date" class="form-control rounded-pill border">
                                        </div>
    
                                    </div>
                                    <div class="col-md-2">
                                        <div class="btn btn-outline-dark">S/D</div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <input type="date" class="form-control rounded-pill border">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Payment Status</label>
                                            <div class="border">
                                                <select class="select">
                                                    <option>Select Payment</option>
                                                    <option value="1">USA</option>
                                                    <option value="2">France</option>
                                                    <option value="3">India</option>
                                                    <option value="4">Spain</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Project Status</label>
                                            <div class="border">
                                                <select class="select">
                                                    <option>Select Status</option>
                                                    <option value="1">USA</option>
                                                    <option value="2">France</option>
                                                    <option value="3">India</option>
                                                    <option value="4">Spain</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>No.Faktur Pajak</label>
                                            <input type="text" class="form-control rounded-pill border">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tgl. faktur Pajak</label>
                                            <input type="date" class="form-control rounded-pill border">
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea rows="5" cols="5" class="form-control rounded border" placeholder="-"></textarea>
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