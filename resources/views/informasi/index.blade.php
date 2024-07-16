@extends('layouts.layout') @section('content')
<style>
    .content-box {
    width: 300px;
    height: 200px;
    overflow: hidden; /* untuk menyembunyikan konten yang meluap */
}

</style>
<div class="div">
    <div class="row">
        <div class="col-md-9">
            <h3>Daftar Panduan</h2>
        </div>
        <div class="col-md-3 text-md-end">
            <a href="{{ route('informasi.create') }}" class="btn btn-danger btn-blog mb-3"><i class="feather-plus-circle me-1"></i> Tambah informasi</a>
        </div>
    </div>
    <div class="row">
        @foreach ($guides as $item)
        <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
            <div class="blog grid-blog flex-fill">
                <div class="blog-image">
                    <a href="{{ route('informasi.detail', ['id' => $item->id]) }}"><img class="img-fluid" src="data:image/jpeg;base64,{{ $item->image }}" alt="Post Image" style="width: 100%; height: 200px;"></a>
                </div>
                <div class="blog-content">
                    <ul class="entry-meta meta-item">
                        <li>
                            <div class="post-author">
                                <a href="{{ route('informasi.detail', ['id' => $item->id]) }}">
                                    <img src="assets/img/profiles/avatar-01.jpg" alt="Post Author">
                                    <span>
                                        <span class="post-date"><i class="far fa-clock"></i>
                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->format('j M Y') }}
                                        </span>
                                        <h6 class="post-title">{{ $item->user }}</h6>
                                    </span>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <h3 class="blog-title mb-4"><a href="{{ route('informasi.detail', ['id' => $item->id]) }}">{{ $item->title }}</a></h3>
                    {{-- <p>Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p> --}}
                </div>
                <div class="row">
                    <div class="edit-options">
                        <div class="edit-delete-btn">
                            <a href="{{ route('informasi.edit', $item->id) }}" class="text-success"><i class="feather-edit-3 me-1"></i> Edit</a>
                            <a href="{{ route("informasi.delete", $item->id) }}" class="text-danger" onclick="return confirm('Are you sure want to delete this item?')"><i class="feather-trash-2 me-1"></i> Delete</a>
                        </div>
                        {{-- <div class="text-end inactive-style">
                            <a href="" class="text-danger"><i class="feather-eye-off me-1"></i> Inactive</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection @section('script')
<script>
    feather.replace();
</script>
@endsection