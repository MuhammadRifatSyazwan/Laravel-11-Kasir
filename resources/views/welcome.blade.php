<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('admin-assets/css/styles.css') }}">

        <!-- Styles -->
       
    </head>
    
    <body> 
        
                 
                 <!-- Header-->
        <header class="masthead d-flex align-items-center ">
            
                
            <div class="container px-4 px-lg-5">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="mb-1 text-warning">KELOMPOK 5 </h1>
                        <h3 class="mb-5"><em> Sistem Kasir Berbasis Web dengan Laravel 11 </em></h3>
                        <a class="btn btn-primary btn-xl" href="{{ route('login') }}">LOGIN</a>
                    </div>
                    <div class="col-md-4 text-center">
                        <img class="img-fluid " src="{{ asset('admin-assets/img/kasir.jpg') }}" alt="">
                    </div>
                </div>
            </div>
              
          
        </header>
        <!-- artikel kasir
        <section class="content-section bg-light" id="about">
            <div class="container px-4 px-lg-5 text-center">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-10">
                        <h2>Stylish Portfolio is the perfect theme for your next project!</h2>
                        <p class="lead mb-5">
                            This theme features a flexible, UX friendly sidebar menu and stock photos from our friends at
                            <a href="https://unsplash.com/">Unsplash</a>
                            !
                        </p>
                        <a class="btn btn-dark btn-xl" href="https://github.com/MuhammadRifatSyazwan/Workshop-Kasir" target="_blank">What We Offer</a>
                    </div>
                </div>
            </div>
        </section>
        {{-- end kair --}}
        <!-- Services-->
       <section class="content-section bg-primary  text-center" id="services">
    <div class="container px-4 px-lg-5">
        <div class="content-section-heading">
            <h3 class="text-secondary mb-0">Kelompok 5</h3>
            <h2 class="mb-5">ABOUT US</h2>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
                <div class="card border-light bg-light rounded-3 shadow">
                    <a href="https://drive.google.com/file/d/1ofdQDwJ6YCwZUiEY1xHvBSIEo82nA8OG/view?usp=drive_link" target="_blank">
                        <img class="card-img-top mx-auto d-block mb-3" src="{{ asset('admin-assets/img/rifat-rgi.png') }}" width="170" alt="">
                        <div class="overlay">
                            <div class="overlay-text">CLICK CV</div>
                        </div>
                    </a>
                    <div class="card-body">
                        <h4 class="card-title"><strong>Muhammad Rifat Syazwan</strong></h4>
                        <p class="card-text text-muted">"Bersinar lah tanpa meredup kan <br>orang lain"</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
                <div class="card border-light bg-light rounded-3 shadow">
                    <a href="https://drive.google.com/file/d/1upO5lG8ltSg2AxABxL05t3s38bQYp45p/view?usp=drive_link" target="_blank">
                        <img class="card-img-top mx-auto d-block mb-3" src="{{ asset('admin-assets/img/santir-r.png') }}" width="170" alt="">
                        <div class="overlay">
                            <div class="overlay-text">CLICK CV</div>
                        </div>
                    </a>
                    <div class="card-body">
                        <h4 class="card-title"><strong>Santi Apriyanti</strong></h4>
                        <p class="card-text text-muted">"Ilmu tanpa amal adalah gila dan amal tanpa ilmu adalah sia sia"</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
                <div class="card border-light bg-light rounded-3 shadow">
                    <a href="https://drive.google.com/file/d/1Zt37ORbR1p9XIfL64FYasOd_8ZXL9EQx/view?usp=drive_link" target="_blank">
                        <img class="card-img-top mx-auto d-block mb-3" src="{{ asset('admin-assets/img/lutfi.png') }}" width="170" alt="">
                        <div class="overlay">
                            <div class="overlay-text">CLICK CV</div>
                        </div>
                    </a>
                    <div class="card-body">
                        <h4 class="card-title"><strong>Lutfi Ahmad Rahmawan</strong></h4>
                        <p class="card-text text-muted">"Perjalanan seribu mill <i class="fas fa-heart"></i> di mulai dengan satu langkah"</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
                    
        <!-- Callout-->
     
        </section>
        <!-- Portfolio-->
        <section class="content-section" id="portfolio" ">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading text-center">
                    <h3 class="text-secondary mb-0">portofolio</h3>
                    <h2 class="mb-5">Recent Projects</h2>
                </div>
                <div class="row gx-0">
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Halaman admin</div>
                                    <p class="mb-0">"Selamat datang di halaman admin2 Kelola akun dan pengaturanmu di sini."</p>
                                </div>
                            </div>
                            <img id="loginBtn" class="img-fluid" src="{{ asset('admin-assets/img/pengguna.png') }}" alt="..." />
                        </a>
                    </div>
                    <!-- Menambahkan class col-lg-6 agar lebar foto sama -->
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="" id="loginBtn">
                            <div class="caption" id="loginBtn">
                                <div class="caption-content" id="loginBtn" >
                                    <div class="h2">halaman login</div>
                                    <p class="mb-0">"Ini halaman login buat akses akun kamu. Masukkan username dan password untuk masuk."</p>
                                </div>
                            </div>
                            <img  class="img-fluid" src="{{ asset('admin-assets/img/login1.png') }}" alt="..." />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Import barang</div>
                                    <p class="mb-0">"Selamat datang di halaman kasir! Impor barang dan kelola stok dengan praktis di sini."</p>
                                </div>
                            </div>
                            <img id="loginBtn" class="img-fluid" src="{{ asset('admin-assets/img/produk.png') }}" alt="..." />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a id="loginBtn" class="portfolio-item" href="">
                            <div class="caption">
                                <div class="caption-content " >
                                    <div class="h2">Tambah stok</div>
                                    <p class="mb-0" >"Selamat datang di halaman admin! Tambah stok barang dan kelola inventaris di sini."






                                    </p>
                                </div>
                            </div>
                            
                          
                                <img  class="img-fluid" src="{{ asset('admin-assets/img/admin.png') }}" alt="..." />
                            
                        </a>
                    </div>
                </div>
            </div>
        </section>
        
    
                <script src="{{ asset('admin-assets/scripts.js') }}"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
            
    </body>
</html>