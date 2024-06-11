<style>
  .scrollbar {
          height: 160px;
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



@extends('layouts.layout') @section('content')
<div class="div">
      <div class="row">
          <div class="col-sm-12">
              <div class="card card-table">
                  <div class="card-header fw-bolder fs-6 bg-danger bg-gradient text-white">
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
                                <li><a class="dropdown-item" href="{{ route('_laporan.tahun.perusahaan',[ 'id' => $mitra->id] )}}">ALL</a></li>
                                @foreach ($listtahun as $item)
                                <li><a class="dropdown-item" href="{{ route('_laporan.tahun.perusahaan', [ 'id' => $mitra->id, 'tahun' => $item->tahun ]) }}">{{ $item->tahun }}</a></li>
                                @endforeach
                            </ul>
                          </div>
                      </div>
                      <div class="col-auto text-end float-end ms-auto download-grp">
                          <a href="#" data-bs-toggle="modal" data-bs-target="#bank_details" class="btn btn-outline-danger"><i class="fas fa-plus"> </i> Tambah Laporan</a>
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
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                
                @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                
      
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
                                    @role(['admin', 'manager'])
                                        <div class="col-auto text-end float-end ms-auto download-grp">
                                          <a href="#" data-bs-toggle="modal" data-bs-target="{{ '#addpdf'.$item->id }}" class="btn btn-info text-white"><i class="fas fa-plus"> PDF</i></a>
                                      </div>
                                @endrole
                                </div>
                              </div>
      
                                <div class="scrollbar" id="scrollbar2">
                                  <table class="table star-student table-hover table-responsive table-center mb-0 table-striped">
                                      <thead>
                                        <th>Dokumen</th>
                                        <th class="text-end">Action</th>
                                      </thead>
                                      <tbody>
                                      @foreach ($dokumen->where('id_dokumen', $item->id) as $data)
                                      <tr>
                                      <td>
                                        {{ $data->file_path }}
                                      </td>
                                      <td class="text-end">  
                                        <a href="{{ route('_download.pdf.laporan', $data->id) }}" class="btn btn-sm btn-outline-info">
                                          <i class="fa fa-download text-dark"></i>
                                        </a>
                                        @role(['admin', 'manager'])
                                        <a href="{{ route('_del.pdf.laporan', ['id' => $data->id, 'periode' => $item->periode]) }}" class="btn btn-sm btn-outline-danger">
                                          <i class="feather-trash-2 text-dark"></i>
                                        </a>
                                @endrole
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
                
                
                @role(['admin', 'manager'])
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
                                  <input type="hidden" name="id_dokumen" value="{{ $item->id }}">
                                  <div class="modal-body">
                                      <div class="form-group row">
                                          <label class="col-form-label col-md-2">Attachment</label>
                                          <div class="col-md-10">
                                              <input type="file" name="file_path" class="form-control @error('file_path') is-invalid @enderror" value="{{ old('file_path') }}" placeholder="" required>
                                              @error('file_path')
                                                  <div class="invalid-feedback">{{ $message }}</div>
                                              @enderror
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-form-label col-md-2">Choose License</label>
                                          <div class="col-md-10">
                                              <select class="form-control mb-md @error('license') is-invalid @enderror" name="license" required>
                                                  <option value="Public Domain" {{ old('license') == 'Public Domain' ? 'selected' : '' }}>Public Domain</option>
                                                  <option value="Private Domain" {{ old('license') == 'Private Domain' ? 'selected' : '' }}>Private Domain</option>
                                                  <option value="Permissive Domain" {{ old('license') == 'Permissive Domain' ? 'selected' : '' }}>Permissive Domain</option>
                                              </select>
                                              @error('license')
                                                  <div class="invalid-feedback">{{ $message }}</div>
                                              @enderror
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
                @endrole
                @endforeach
              </div>
              @role(['admin', 'manager'])
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
                            <input type="hidden" name="id_inst" value="{{ $mitra->id }}">
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Author</label>
                                    <div class="col-md-10">
                                        <select class="form-control form-select @error('user_id') is-invalid @enderror" name="user_id" required>
                                            <option>Pilih Author</option>
                                            @foreach ($employees as $manager)
                                                <option value="{{ $manager->id }}" {{ old('user_id') == $manager->id ? 'selected' : '' }}>
                                                    {{ ucwords($manager->username) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Project {{ $mitra->mitra }}</label>
                                    <div class="col-md-10">
                                        <select class="form-control mb-md @error('deskripsi') is-invalid @enderror" name="deskripsi" required>
                                            @if ($mitra->id == 2)
                                                <option value="">Pilih Paket Untuk Serpo</option>
                                                <option value="1" {{ old('deskripsi') == '1' ? 'selected' : '' }}>Paket 2 - Serpo SBU Sulawesi & IBT 2022-2025</option>
                                                <option value="2" {{ old('deskripsi') == '2' ? 'selected' : '' }}>Paket 3 - Serpo SBU Sulawesi & IBT 2022-2025</option>
                                                <option value="3" {{ old('deskripsi') == '3' ? 'selected' : '' }}>Paket 7 - Serpo SBU Sulawesi & IBT 2022-2025</option>
                                                <option value="4" {{ old('deskripsi') == '4' ? 'selected' : '' }}>Serpo URC Papua 1 - SBU Sulawesi & IBT 2022-2025</option>
                                                <option value="5" {{ old('deskripsi') == '5' ? 'selected' : '' }}>Serpo URC Papua 2 - SBU Sulawesi & IBT 2022-2025</option>
                                                <option value="6" {{ old('deskripsi') == '6' ? 'selected' : '' }}>Serpo URC Konawe - SBU Sulawesi & IBT 2022-2025</option>
                                            @else
                                                @foreach ($projek as $item)
                                                    <option value="{{ $item->keterangan }}" {{ old('deskripsi') == $item->keterangan ? 'selected' : '' }}>
                                                        {{ $item->keterangan }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Tahun</label>
                                    <div class="col-md-10">
                                        <input type="number" name="tahun" class="form-control @error('tahun') is-invalid @enderror" value="{{ old('tahun') }}" placeholder="" required>
                                        @error('tahun')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="bank-details-btn">
                                    <button type="submit" class="btn save-invoice-btn btn-primary"> Save</button>
                                    <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-danger me-2">Cancel</a>
                                </div>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
              @endrole
      
      
          </div>
      </div>
  
  </div>
  @endsection @section('script')
  <script>
      feather.replace();
  </script>
  @endsection