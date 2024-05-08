<style>
  .scrollbar {
          height: 165px;
          width: 100%;
          overflow: auto;
          padding: 0 10px;
          background-color: #f1f1f1;
          border-radius: 10px;
      }
  #scrollbar2::-webkit-scrollbar {
          width: 10px;
      }
      
      #scrollbar2::-webkit-scrollbar-track {
          background-color: #e7e7e7;
          border: 1px solid #cacaca;
          box-shadow: inset 0 0 6px rgba(223, 251, 255, 0.3);
      }
      
      #scrollbar2::-webkit-scrollbar-thumb {
          border-radius: 3px;
          background-color: #008cff;
      }
</style>
<x-app-layout>
  <div class="row">
      <div class="col-sm-12">
          <div class="card card-table">
              <div class="card-header fw-bolder fs-6 bg-info text-white">
                  Laporan Keuangan Pertahun {{ $mitra->mitra }}
              </div>
          </div>
          <div class="page-header">
              <div class="row align-items-center">
                  
                  
                  <div class="col">
                      <div class="dropdown">
                          <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                              Tahun
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                              <li><a class="dropdown-item" href="">2021</a></li>
                              <li><a class="dropdown-item" href="">2022</a></li>
                              <li><a class="dropdown-item" href="">2023</a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-auto text-end float-end ms-auto download-grp">
                      <a href="#" data-bs-toggle="modal" data-bs-target="#bank_details" class="btn btn-primary"><i class="fas fa-plus"> Tambah Laporan</i></a>
                  </div>
              </div>
              @if ($laporantahun == "[]")
              <div class="my-5">
                  <div class="alert alert-primary">
                      Tidak Ada Data
                  </div>
              </div>
              @endif
          </div>
          <div class="row">

            @foreach ($laporantahun as $item)
            <div class="col-12 col-md-6 col-lg-6 d-flex">
                <div class="card flex-fill bg-white">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h4 class="mb-0 ms-4">
                                  {{-- {{ $item->id }} --}}
                                  
                                  @foreach ($employees->where('id', $item->user_id) as $data)
                                  {{ $data->firstname .' '.$data->lastname}}
                                  
                              @endforeach
                                </h4>
                            </div>
                            <div class="col">
                                <p class="text-end">{{ $item->created_at }}</p>

                            </div>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <div class="container">
                          <div class="row">
                            <div class="col">
                              <p> Nama : {{ $item->deskripsi }} <br>
                                Tahun : {{ $item->tahun }}
                              </p>
                            </div>
                            <div class="col">
                              <div class="col-auto text-end float-end ms-auto download-grp">
                                <a href="#" data-bs-toggle="modal" data-bs-target="{{ '#addpdf'.$item->id }}" class="btn btn-info text-white"><i class="fas fa-plus"> PDF</i></a>
                            </div>
                            </div>
                          </div>
                          
                            
                          
                            <div class="scrollbar" id="scrollbar2">
                                <div class="table-responsive">
                                    <table class="table border-0 star-student table-hover table-center mb-0">
                                        <tbody>
                                        
                                          @foreach ($dokumen->where('id_dokumen', $item->id) as $data)
                                                <td>
                                                  {{ $data->file_path }}
                                                </td>
                                                <td class="text-end">
                                                  <a href="#" class="btn btn-sm bg-primary-light me-2">
                                                    <i class="fa fa-download"></i>
                                                  </a>
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
            </div>
            
            
          <div class="modal custom-modal fade bank-details" id="{{ 'addpdf'.$item->id }}" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="form-header text-start mb-0">
                            <h4 class="mb-0">Add PDF {{ $item->deskripsi }}</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('_add.pdf.laporan') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="id_inst" value="{{ $item->id_inst }}">
                      <input type="" name="id_dokumen" value="{{ $item->id }}">
                      <div class="modal-body">
                          <div class="form-group row">
                              <label class="col-form-label col-md-2">Attachment</label>
                              <div class="col-md-10">
                                  <input type="file" name="file_path" class="form-control" value="{{ old('file_path') }}" placeholder="">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-form-label col-md-2">Choose License</label>
                              <div class="col-md-10">
                                  <select class="form-control mb-md" name="license">
                                      <option value="Public Domain">Public Domain</option>
                                      <option value="Private Domain">Private Domain</option>
                                      <option value="Permissive Domain">Permissive Domain</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <div class="bank-details-btn">
                              <button type="submit" class="btn save-invoice-btn btn-primary">Save</button>
                              <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-danger me-2">Cancel</a>
                          </div>
                      </div>
                  </form>
                </div>
            </div>
          </div>
            @endforeach
          </div>
            
          <div class="modal custom-modal fade bank-details" id="bank_details" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="form-header text-start mb-0">
                            <h4 class="mb-0">Add item {{ $mitra->mitra }}</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('_add.list.laporan') }}" method="post">
                        @csrf
                        <input type="hidden" name="id_inst" value="{{ $mitra->id}}">
                    <div class="modal-body">
                      <div class="form-group row">
                        <label class="col-form-label col-md-2">Author</label>
                        <div class="col-md-10">
                            <select class="form-control form-select" name="user_id">
                                <option>Pilih Author</option>
                               
                                    @foreach ($employees as $manager)
                                        <option value="{{ $manager->id }}">{{ ucwords($manager->username) }}</option>
                                    @endforeach
                            </select>
                        </div>
                       
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Project {{ $mitra->mitra }}</label>
                        <div class="col-md-10">
                            <select class="form-control mb-md" name="deskripsi">
                                @if ($mitra->id == 2)
                                    <option value="">Pilih Paket Untuk Serpo</option>
                                    <option value="1" {{ old('deskripsi', $paket) == 1 ? 'selected' : '' }}>Paket 2 - Serpo SBU Sulawesi & IBT 2022-2025</option>
                                    <option value="2" {{ old('deskripsi', $paket) == 2 ? 'selected' : '' }}>Paket 3 - Serpo SBU Sulawesi & IBT 2022-2025</option>
                                    <option value="3" {{ old('deskripsi', $paket) == 3 ? 'selected' : '' }}>Paket 7 - Serpo SBU Sulawesi & IBT 2022-2025</option>
                                    <option value="4" {{ old('deskripsi', $paket) == 4 ? 'selected' : '' }}>Serpo URC Papua 1 - SBU Sulawesi & IBT 2022-2025</option>
                                    <option value="5" {{ old('deskripsi', $paket) == 5 ? 'selected' : '' }}>Serpo URC Papua 2 - SBU Sulawesi & IBT 2022-2025</option>
                                    <option value="6" {{ old('deskripsi', $paket) == 6 ? 'selected' : '' }}>Serpo URC Konawe - SBU Sulawesi & IBT 2022-2025</option>
                                @elseif ($mitra->id != 2)
                                    @foreach ($projek as $item)
                                        <option value="{{ $item->keterangan }}">{{ $item->keterangan }}</option>
                                    @endforeach
                                @else
                                    <option value="">Tidak Memiliki Paket</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    
                        
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Tahun</label>
                            <div class="col-md-10">
                                <input type="number" name="tahun" class="form-control" value="{{ old('tahun') }}" placeholder="" required>
                              
                            </div>
                        </div>
                        
                       
                        <div class="form-group row">
                          <label class="col-form-label col-md-2">Attachment</label>
                          <div class="col-md-10">
                              <input type="file" name="file_path" class="form-control" value="{{ old('file_path') }}" placeholder="">
                              
                          </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-form-label col-md-2">Choose License</label>
                          <div class="col-md-10">
                            <select class="form-control mb-md" name="license">
                              <option value="0">Public Domain</option>
                              <option value="1">Private Domain</option>
                              <option value="1">Permissive Domain</option>
                            </select>
                        </div>
                      </div>
                    </div>

                    <div class="modal-footer">
                        <div class="bank-details-btn">

                            <button type="submit" class="btn save-invoice-btn btn-primary"> Save</button>
                                
                            </a>
                            <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-danger me-2">Cancel</a>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>


      </div>
  </div>
</x-app-layout>