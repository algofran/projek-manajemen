<x-app-layout>
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
    
                <div class="card-header fw-bolder fs-6 bg-info text-white">
                    Detail Projek
                </div>
    
            </div>
            <div class="mb-4">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                        Report Detail Laporan Keuangan
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                      <li><button class="dropdown-item" type="button">Material</button></li>
                      <li><button class="dropdown-item" type="button">Tools</button></li>
                      <li><button class="dropdown-item" type="button">Operasional</button></li>
                      <li><button class="dropdown-item" type="button">Gaji</button></li>  
                      <li><button class="dropdown-item" type="button">Service</button></li>  
                      <li><button class="dropdown-item" type="button">BBM</button></li>  
                    </ul>
                  </div>
            </div>
            <div class="card card-table">
                <div class="card-body my-3">
                    <div class="row container">
                        <div class="col-md-6 col-sm-4 col-12">                            
                            <h6 class="invoice-name">Project Manager</h6>
                            <p class="justify-content-center bg-secondary border rounded-pill d-flex text-white ">
                               hallo hallo
                            </p>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6">                            
                            <h6 class="invoice-name">Tgl.Mulai</h6>
                            <p class="justify-content-center bg-secondary border rounded-pill d-flex text-white">
                               hallo hallo
                            </p>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6">                            
                            <h6 class="invoice-name">Tgl.Berakhir</h6>
                            <p class="justify-content-center bg-secondary border rounded-pill d-flex text-white">
                               hallo hallo
                            </p>
                        </div>
                    </div>
                    <div class="row container">
                        <div class="col-md-6 col-sm-4 col-12">                            
                            <h6 class="invoice-name">Project Name</h6>
                            <p class="justify-content-center bg-secondary border rounded-pill d-flex text-white">
                               hallo hallo
                            </p>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6">                            
                            <h6 class="invoice-name">Project Status</h6>
                            <p class="justify-content-center bg-secondary border rounded-pill d-flex text-white">
                               hallo hallo
                            </p>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6">                            
                            <h6 class="invoice-name">Status Pembayaran</h6>
                            <p class="justify-content-center bg-secondary border rounded-pill d-flex text-white">
                               hallo hallo
                            </p>
                        </div>
                    </div>
                    <div class="row container">
                        <div class="col-md-3 col-sm-4 col-6">                            
                            <h6 class="invoice-name">No.PO/Kontrak</h6>
                            <p class="justify-content-center bg-secondary border rounded-pill d-flex text-white">
                               hallo hallo
                            </p>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6">                            
                            <h6 class="invoice-name">Nilai Kontrak</h6>
                            <p class="justify-content-center bg-secondary border rounded-pill d-flex text-white">
                               hallo hallo
                            </p>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6">                            
                            <h6 class="invoice-name">Nama Bank</h6>
                            <p class="justify-content-center bg-secondary border rounded-pill d-flex text-white">
                               hallo hallo
                            </p>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="card card-table">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                            <thead class="student-thread">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Jenis Aktivitas</th>
                                    <th>Keterangan</th>
                                    <th>Biaya</th>
                                    {{-- <th class="text-end">Action</th> --}}
                                </tr>
                            </thead>
                                {{-- @foreach($tasks as $task) --}}
                                <tbody>
                                    <tr id="">
                                        <td class="text-center"></td>
                                        <td class=" text-info">
                                        </td>
                                            
                                        <td>
                                           
                                        </td>
                                        <td></td>
                                       
                                        <td>
                                           
                                        </td>
                                        {{-- <td class="text-end">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="{{ '#EditTask'.$task->id }}" class="d-flex btn btn-sm bg-danger-light me-2">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <a href="{{ route('_del.task', ['id' => $task->id]) }}" onclick="return confirm('Are you sure want to delete this task?')" class="btn btn-sm bg-success-light me-2 "> <i class="feather-trash-2"></i></i></a>
                                            </div>
                                            
                                        </td> --}}
                                    </tr>
                                </tbody>

                               
                                {{-- @endforeach --}}
                        </table>
                    </div>
                </div>
            </div>
    
            
        </div>
    </div>
</x-app-layout>