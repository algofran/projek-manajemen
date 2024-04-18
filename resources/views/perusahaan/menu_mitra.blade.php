<x-app-layout>
    <div class="row">
        <div class="col-sm-12">
            @foreach($mitra as $item)
            <div class="card card-table">
                <div class="card-header fw-bolder fs-6 bg-info text-white">
                    Menu Mitra {{ $item->mitra }} 
                </div>
            </div>
                <div class="row">
                    
                    <div class="col-12 col-lg-4 col-xl-4">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="ms-4 mt-3">
                                        <h5 class="card-title">List {{ $item->mitra }}</h5>
                                        <div class="db-icon bg-info mt-3">
                                            <i class="fa fa-table"></i>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="mt-3 d-grid gap-2 mx-auto">
                                    <a href="{{ route('list.proyeks', ['id' => $item->id]) }}" class="btn btn-info mx-4 text-white">+ KLIKS</a>
                                </div>
                            </div>
                            <div class="card-body text-center">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-xl-4">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="ms-4 mt-3">
                                        <h5 class="card-title">Tambah Aktivitas</h5>
                                        <div class="db-icon bg-info mt-3">
                                            <i class="fa fa-plus-square"></i>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="mt-3 d-grid gap-2 mx-auto">
                                    <a href="{{ route('add.proyek', ['id' => $item->id]) }}" class="btn btn-info mx-4 text-white">+ KLIKS</a>
                                </div>
                            </div>
                            <div class="card-body text-center">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-xl-4">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="ms-4 mt-3">
                                        <h5 class="card-title">Laporan Keuangan</h5>
                                        <div class="db-icon bg-info mt-3">
                                            <i class="fa fa-tasks"></i>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="mt-3 d-grid gap-2 mx-auto">
                                    <button class="btn btn-info text-white mx-4" type="button">+ KLIK</button>
                                </div>
                            </div>
                            <div class="card-body text-center">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>