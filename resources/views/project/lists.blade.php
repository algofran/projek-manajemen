<x-app-layout> 
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
    
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">List Project</h3>
                            </div>
                            <div class="col-auto text-end float-end ms-auto download-grp">
                                <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a>
                                <a href="#" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="btn btn-primary me-2">Active</div>
                                    <div class="btn btn-warning me-2">On-Hold</div>
                                    <div class="btn btn-success me-2">Complete</div>
                                    <div class="btn btn-danger me-2">Finish</div>
                                </div>
                            </div>
                        </div>
                    </div>
    
    
                    <div class="table-responsive">
                        <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                            <thead class="student-thread">
                                <tr>
                                    <th>No</th>
                                    <th>Project</th>
                                    <th>No.Kontak/PO</th>
                                    <th>Progres</th>
                                    <th>Status</th>
                                    <th>Pembayaran</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lists as $key => $data)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col">{{ $data->name }}</div>
                                            <div class="col"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col text-danger">PT. INDONESIA COMNET PLUS</div>
                                        </div>
                                        <div class="row">
                                            <div class="col text-info">CV. VISDAT TEKNIK UTAMA</div>
                                        </div>
                                    </td>
                                    <td>{{ $data->po_number }}</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">100%</div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">Complate</span><br>
                                        <span class="badge badge-warning">On-Hold</span><br>
                                        <span class="badge badge-info">On-Progress</span><br>
                                        <span class="badge badge-danger">Finish</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">Sudah Dibayar</span><br>
                                        <span class="badge badge-primary">Belum Ditagih</span><br>
                                        <span class="badge badge-info">Sudah Ditagih</span>
                                    </td>
                                    <td class="text-end">
                                        <div class="actions ">
                                            <a href="javascript:;" class="btn btn-sm bg-success-light me-2 ">
                                                <i class="feather-eye"></i>
                                            </a>
                                            <a href="edit-sports.html" class="btn btn-sm bg-danger-light me-2">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <a href="edit-sports.html" class="btn btn-sm bg-danger-light">
                                                <i class="feather-trash-2"></i>
                                            </a>
    
    
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>