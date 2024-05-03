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
                    Laporan Keuangan Pertahun 
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
                        <a href="" class="btn btn-primary"><i class="fas fa-plus"> Tambah Laporan</i></a>
                    </div>
                </div>
            </div>
                <div class="row">
                        <div class="col-12 col-md-6 col-lg-6 d-flex">
                            <div class="card flex-fill bg-white">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="mb-0 ms-4">PT. Visdat Teknik Utama</h6>
                                        </div>
                                        <div class="col">
                                            <p class="text-end">26 April 2024 | 22:00</p>

                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <p> Nama : PT.PLN Persero <br>
                                            Tahun : 2024
                                        </p>
                                      
                                        <div class="scrollbar" id="scrollbar2">
                                            <div class="table-responsive">
                                                <table class="table border-0 star-student table-hover table-center mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa voluptates iusto adipisci architecto inventore! Voluptates quae magni iusto sed id.</td>
                                                            <td class="text-end">
                                                                <a href="#" class="btn btn-sm bg-primary-light me-2">
                                                                    <i class="fa fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa voluptates iusto adipisci architecto inventore! Voluptates quae magni iusto sed id.</td>
                                                            <td class="text-end">
                                                                <a href="#" class="btn btn-sm bg-primary-light me-2">
                                                                    <i class="fa fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa voluptates iusto adipisci architecto inventore! Voluptates quae magni iusto sed id.</td>
                                                            <td class="text-end">
                                                                <a href="#" class="btn btn-sm bg-primary-light me-2">
                                                                    <i class="fa fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa voluptates iusto adipisci architecto inventore! Voluptates quae magni iusto sed id.</td>
                                                            <td class="text-end">
                                                                <a href="#" class="btn btn-sm bg-primary-light me-2">
                                                                    <i class="fa fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                       
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 d-flex">
                            <div class="card flex-fill bg-white">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="mb-0 ms-4">PT. Visdat Teknik Utama</h6>
                                        </div>
                                        <div class="col">
                                            <p class="text-end">26 April 2024 | 21:00</p>

                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <p> Nama : PT.PLN Persero <br>
                                            Tahun : 2024
                                        </p>
                                      
                                        <div class="scrollbar" id="scrollbar2">
                                            <div class="table-responsive">
                                                <table class="table border-0 star-student table-hover table-center mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa voluptates iusto adipisci architecto inventore! Voluptates quae magni iusto sed id.</td>
                                                            <td class="text-end">
                                                                <a href="#" class="btn btn-sm bg-primary-light me-2">
                                                                    <i class="fa fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa voluptates iusto adipisci architecto inventore! Voluptates quae magni iusto sed id.</td>
                                                            <td class="text-end">
                                                                <a href="#" class="btn btn-sm bg-primary-light me-2">
                                                                    <i class="fa fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa voluptates iusto adipisci architecto inventore! Voluptates quae magni iusto sed id.</td>
                                                            <td class="text-end">
                                                                <a href="#" class="btn btn-sm bg-primary-light me-2">
                                                                    <i class="fa fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa voluptates iusto adipisci architecto inventore! Voluptates quae magni iusto sed id.</td>
                                                            <td class="text-end">
                                                                <a href="#" class="btn btn-sm bg-primary-light me-2">
                                                                    <i class="fa fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                       
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 d-flex">
                            <div class="card flex-fill bg-white">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="mb-0 ms-4">PT. Visdat Teknik Utama</h6>
                                        </div>
                                        <div class="col">
                                            <p class="text-end">26 April 2024</p>

                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <p> Nama : PT.PLN Persero <br>
                                            Tahun : 2024
                                        </p>
                                      
                                        <div class="scrollbar" id="scrollbar2">
                                            <div class="table-responsive">
                                                <table class="table border-0 star-student table-hover table-center mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa voluptates iusto adipisci architecto inventore! Voluptates quae magni iusto sed id.</td>
                                                            <td class="text-end">
                                                                <a href="#" class="btn btn-sm bg-primary-light me-2">
                                                                    <i class="fa fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa voluptates iusto adipisci architecto inventore! Voluptates quae magni iusto sed id.</td>
                                                            <td class="text-end">
                                                                <a href="#" class="btn btn-sm bg-primary-light me-2">
                                                                    <i class="fa fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa voluptates iusto adipisci architecto inventore! Voluptates quae magni iusto sed id.</td>
                                                            <td class="text-end">
                                                                <a href="#" class="btn btn-sm bg-primary-light me-2">
                                                                    <i class="fa fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa voluptates iusto adipisci architecto inventore! Voluptates quae magni iusto sed id.</td>
                                                            <td class="text-end">
                                                                <a href="#" class="btn btn-sm bg-primary-light me-2">
                                                                    <i class="fa fa-download"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                       
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>