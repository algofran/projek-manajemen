@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row mb-5">
        <div class="col-sm-12 mb-5">
            <div class="card card-table mb-4">
                <div class="card-header fw-bolder fs-6 bg-danger bg-gradient text-white">
                    Menu Perusahaan
                </div>
            </div> <!-- End of card-table -->
                <div class="row mt-3 mb-4">
                    @foreach ($perusahaan as $item)
                    <div class="col-12 col-lg-4 col-xl-4 mb-3">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <a href="{{ route('mitra.menu', ['id' => $item->id, 'name' => $item->mitra]) }}">
                                        <div class="ms-4 mt-3">
                                            <h5 class="card-title">{{ $item->mitra }}</h5>
                                            <div class="db-icon bg-gradient bg-danger mt-3">
                                                <i class="fa fa-tags"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <!-- Content if any -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div> <!-- End of row -->
           
        </div> <!-- End of col-sm-12 -->
    </div> <!-- End of row -->
</div> <!-- End of container -->
@endsection

@section('script')
<script>
    feather.replace();
</script>
@endsection
