<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Pengeluaran</h5>
                </div>
                <div class="card-body">
                    <form action="#">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Pengguna</label>
                                    <select class="form-control input-sm mb-md" name="project_id">
                                        <option></option>
    
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Project:</label>
                                    <select class="form-control input-sm mb-md" name="project_id">
                                        <option></option>
    
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="text" name="date" data-date-format="yyyy-mm-dd" data-plugin-datepicker="" class="form-control"></input>
                                </div>
    
    
                            </div>
                            <div class="col-md-6">
                                <div class="row">
    
                                    <div class="form-group">
                                        <label>Pilih Projek</label>
    
                                        <select class="select">
                                            <option></option>
                                        </select>
    
                                    </div>
    
                                </div>
                                <div class="row">
                                    <label>Tanggal Project</label>
    
                                    <div class="form-group">
                                        <input type="number" name="cost" class="form-control" value="" placeholder="Nilai Pengeluaran..." required="">
    
                                    </div>
    
                                </div>
    
    
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea rows="5" cols="5" class="form-control rounded border border-dark" placeholder="-"></textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mx-2">Submit</button>
                            <button type="submit" class="btn btn-danger">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>