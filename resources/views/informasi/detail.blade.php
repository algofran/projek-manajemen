@extends('layouts.layout') @section('content')
{{-- <style>
    .blog-content img {
        width: auto !important; /* Menetapkan lebar gambar menjadi otomatis */
        height: auto !important; /* Menetapkan tinggi gambar menjadi otomatis */
        max-width: 100% !important; /* Membatasi lebar maksimum gambar agar tidak melebihi konten yang menampilkannya */
        height: auto !important; /* Menetapkan tinggi gambar menjadi otomatis */
    }

    .table {
        overflow-x: auto; /* Menambahkan scroll horizontal jika konten melebihi lebar kontainer */
        margin-bottom: 1em; /* Menambahkan margin bawah */
        width: 100%; /* Pastikan lebar pembungkus adalah 100% */
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid #ddd; /* Menambahkan border */
        padding: 12px; /* Menambahkan padding */
    }

    thead {
        background-color: #f2f2f2;
    }

    th {
        background-color: #4CAF50; /* Warna latar belakang header */
        color: white; /* Warna teks header */
    }

    tbody tr:nth-child(even) {
        background-color: #f9f9f9; /* Warna latar belakang baris genap */
    }

    tbody tr:hover {
        background-color: #f1f1f1; /* Warna latar belakang saat hover */
    }

    th, td {
        border: 1px solid #ddd; /* Border untuk sel */
        padding: 8px; /* Padding untuk sel */
        text-align: left; /* Penyesuaian teks */
    }

    th {
        padding-top: 12px; /* Padding atas untuk header */
        padding-bottom: 12px; /* Padding bawah untuk header */
        background-color: #4CAF50; /* Warna latar belakang header */
        color: white; /* Warna teks header */
    }

    tbody tr:nth-child(even) {
        background-color: #f2f2f2; /* Warna latar belakang baris genap */
    }

    tbody tr:hover {
        background-color: #ddd; /* Warna latar belakang saat hover */
    }
</style> --}}

<div class="div">
  <div class="row justify-content-center mb-4">
    <div class="col-11">

        <div class="blog-view">
            <div class="blog-single-post">
                <a href="javascript:history.back()" class="back-btn"><i class="feather-chevron-left"></i> Back</a>
                <div class="blog-info bg-white pt-3 px-3 rounded-3">
                   
                    <div class="row">
                        <div class="col-10">
                            <h3 class="blog-title">{{ $guide->title }}</h3>
                        </div>
                        <div class="col-auto">
                            <i class="feather-clock"></i> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $guide->created_at)->format('j M Y') }}
                        </div>
                    </div>
                   
                    <div class="post-list">
                        
                    </div>
                </div>
                <div class="blog-image">
                    <a href="javascript:void(0);"><img alt="" src="data:image/jpeg;base64,{{ $guide->image }}"></a>
                </div>
            
                <div class=" p-4 p-xl-5 rounded rounded-3 bg-white">
                    <div class="post-author">
                        <h4>by {{ $guide->user }} </h4>
                                
                            </div>
                    <hr>
                    {!! $guide->description !!}
                  {{-- @php
                      dd($guide->description);
                  @endphp --}}
                </div>
            </div>

            {{-- <div class="card author-widget clearfix">
                <div class="card-header">
                    <h4 class="card-title">About Author</h4>
                </div>
                <div class="card-body">
                    <div class="about-author">
                        <div class="about-author-img">
                            <div class="author-img-wrap">
                                <a href="profile.html"><img class="img-fluid" alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                            </div>
                        </div>
                        <div class="author-details">
                            <a href="profile.html" class="blog-author-name">Prof. Darren Elder <span>Biologist, Male, 40 Years Old</span></a>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                        </div>
                    </div>
                </div>
            </div> --}}


            {{-- <div class="card blog-comments">
                <div class="card-header">
                    <h4 class="card-title">Comments (5)</h4>
                </div>
                <div class="card-body pb-0">
                    <ul class="comments-list">
                        <li>
                            <div class="comment">
                                <div class="comment-author">
                                    <img class="avatar" alt="" src="assets/img/profiles/avatar-13.jpg">
                                </div>
                                <div class="comment-block">
                                    <div class="comment-by">
                                        <h5 class="blog-author-name">Michelle Fairfax <span class="blog-date"> <i class="feather-clock me-1"></i>Dec 6, 2017</span></h5>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae. Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit.</p>
                                    <a class="comment-btn" href="#">
                                        <i class="fa fa-reply me-2"></i> Reply
                                    </a>
                                </div>
                            </div>
                            <ul class="comments-list reply">
                                <li>
                                    <div class="comment">
                                        <div class="comment-author">
                                            <img class="avatar" alt="" src="assets/img/profiles/avatar-06.jpg">
                                        </div>
                                        <div class="comment-block">
                                            <div class="comment-by">
                                                <h5 class="blog-author-name">Gina Moore <span class="blog-date"> <i class="feather-clock me-1"></i> 6 Dec 2022</span></h5>
                                            </div>
                                            <p>gravida pellentesque urna varius vitae. Lorem ipsum dolor sit amet, consectetur</p>
                                            <a class="comment-btn" href="#">
                                                <i class="fa fa-reply me-2"></i> Reply
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="comment">
                                        <div class="comment-author">
                                            <img class="avatar" alt="" src="assets/img/profiles/avatar-05.jpg">
                                        </div>
                                        <div class="comment-block">
                                            <div class="comment-by">
                                                <h5 class="blog-author-name">Carl Kelly <span class="blog-date"> <i class="feather-clock me-1"></i> 7 Dec 2022</span></h5>
                                            </div>
                                            <p> pellentesque urna varius vitae, gravida pellentesque urna consectetur adipiscing elit. Nam viverra euismod.</p>
                                            <a class="comment-btn" href="#">
                                                <i class="fa fa-reply me-2"></i> Reply
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="comment">
                                <div class="comment-author">
                                    <img class="avatar" alt="" src="assets/img/profiles/avatar-09.jpg">
                                </div>
                                <div class="comment-block">
                                    <div class="comment-by">
                                        <h5 class="blog-author-name">Elsie Gilley <span class="blog-date"> <i class="feather-clock me-1"></i> 7 Dec 2022</span></h5>
                                    </div>
                                    <p>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                    <a class="comment-btn" href="#">
                                        <i class="fa fa-reply me-2"></i> Reply
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="comment">
                                <div class="comment-author">
                                    <img class="avatar" alt="" src="assets/img/profiles/avatar-11.jpg">
                                </div>
                                <div class="comment-block">
                                    <div class="comment-by">
                                        <h5 class="blog-author-name">Joan Gardner <span class="blog-date"> <i class="feather-clock me-1"></i> 12 Dec 2022</span></h5>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <a class="comment-btn" href="#">
                                        <i class="fa fa-reply me-2"></i> Reply
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div> --}}


            {{-- <div class="card new-comment clearfix">
                <div class="card-header">
                    <h4 class="card-title">Leave Comment</h4>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Enter your name">
                            <label for="floatingInput">Name<span class="text-danger">*</span></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Your Email address<span class="text-danger">*</span></label>
                        </div>
                        <div class="form-group">
                            <textarea rows="4" class="form-control bg-grey" placeholder="Comments"></textarea>
                        </div>
                        <div class="submit-section">
                            <button class="submit-btn btn-primary btn-blog" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div> --}}
{{-- 
            <div class="card blog-share clearfix">
                <div class="card-header">
                    <h4 class="card-title">Share the post</h4>
                </div>
                <div class="card-body">
                    <ul class="social-share">
                        <li><a href="#"><i class="feather-twitter"></i></a></li>
                        <li><a href="#"><i class="feather-facebook"></i></a></li>
                        <li><a href="#"><i class="feather-linkedin"></i></a></li>
                        <li><a href="#"><i class="feather-instagram"></i></a></li>
                        <li><a href="#"><i class="feather-youtube"></i></a></li>
                    </ul>
                </div>
            </div> --}}
        </div>
    </div>
</div>
    </div>
</div>
@endsection @section('script')
<script>
    feather.replace();
</script>
@endsection