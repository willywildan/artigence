<!DOCTYPE html>
<html>
<head>
  @include('/admin/partials/header')
     <link href="{{URL::asset('assets/img/brand/favicon.png')}}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{URL::asset('assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="{{URL::asset('assets/css/argon.css?v=1.0.0')}}" rel="stylesheet">
</head>
<body>
  @include('/admin/partials/sidebar')


  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{url('admin/pintuair')}}">Informasi Pintu Air</a>
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">

          </div>
        </form>
        @include('/admin/Pintu/dropdown')
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <div class="media-body ml-2 d-none d-lg-block">
                </div>
              </div>
            </a>

          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">

          </div>
        </div>
      </div>
    </div>


    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Pintu Air {{$data_pintu->nama_pintu_air}}</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                      <div class="container-fluid">
                                <!-- @if(session('sukses'))
        <div class="alert alert-success" role="alert">
          {{session('sukses')}}
        </div>
        @endif -->
                        <div class="header-body">
                          <!-- Card stats -->
                          <div class="row">

                            <div class="col-xl-6 col-lg-6">
                              <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col">
                                      <h5 class="card-title text-uppercase text-muted mb-0">Nama Penjaga</h5>
                                      <span class="h2 font-weight-bold mb-0">{{$data_pintu-> nama_penjaga}}</span>
                                    </div>
                                    <div class="col-auto">
                                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="ni ni-single-02"></i>
                                      </div>
                                    </div>
                                  </div>
                                  <p class="mt-3 mb-0 text-muted text-sm">
                                    
                                    <span class="text-nowrap"></span>
                                  </p>
                                </div>
                              </div>
                            </div>
                              <div class="col-xl-6 col-lg-6">
                              <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col">
                                      <h5 class="card-title text-uppercase text-muted mb-0">No. Telepon</h5>
                                      <span class="h2 font-weight-bold mb-0">{{$data_pintu-> telfon_penjaga}}</span>
                                    </div>
                                    <div class="col-auto">
                                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fa fa-phone"></i>
                                      </div>
                                    </div>
                                  </div>
                                  <p class="mt-3 mb-0 text-muted text-sm">
                                  
                                  </p>
                                </div>
                              </div>
                            </div>



                            <div class="col-xl-6 col-lg-6">
                              <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col">
                                      <h5 class="card-title text-uppercase text-muted mb-0">Alamat Penjaga</h5>
                                      <span class="h2 font-weight-bold mb-0">{{$data_pintu-> alamat_penjaga}}</span>
                                    </div>
                                    <div class="col-auto">
                                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa-home"></i>
                                      </div>
                                    </div>
                                  </div>
                                  <p class="mt-3 mb-0 text-muted text-sm">
                                  
                                  </p>
                                </div>
                              </div>
                            </div>

                                                        <div class="col-xl-6 col-lg-6">
                              <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col">
                                      <h5 class="card-title text-uppercase text-muted mb-0">Lokasi Pintu Air</h5>
                                      <span class="h2 font-weight-bold mb-0">{{$data_pintu-> alamat_pintu_air}}</span>
                                    </div>
                                    <div class="col-auto">
                                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="ni ni-square-pin"></i>
                                      </div>
                                    </div>
                                  </div>
                                  <p class="mt-3 mb-0 text-muted text-sm">
                                   
                                  </p>
                                </div>
                              </div>
                            </div>


                             <div class="col-xl-6 col-lg-6">
                              <div class="card card-stats mb-4 mb-xl-0"> 
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col">
                                      <h5 class="card-title text-uppercase text-muted mb-0">Interval Pintu Air {{$data_pintu-> nama_pintu_air}}</h5>
                                      <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> Aman </span>
                                    <span class="text-nowrap">< {{$data_pintu->interval1a}}</span>
                                  </p>
                                  <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> Waspada </span>
                                    <span class="text-nowrap"> {{$data_pintu->interval1b}} - {{$data_pintu->interval2a}} </span>
                                  </p>
                                  <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> Kritis </span>
                                    <span class="text-nowrap">{{$data_pintu->interval2a}} - {{$data_pintu->interval2b}}</span>
                                  </p>
                                    </div>
                                    <div class="col-auto">
                                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fas fa-water"></i>
                                      </div>
                                    </div>
                                  </div>
                                  <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> Bencana</span>
                                    <span class="text-nowrap"> > {{$data_pintu->interval2b}}</span>
                                  </p>
                                </div>
                              {{-- </div> --}}
                            {{-- </div> --}}
                          </div>
                        </div>



                      </div>
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                
              </nav>
            </div>
          </div>
        </div>
      </div>
  @include('/admin/partials/footer')
  <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="./assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="./assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="./assets/js/argon.js?v=1.0.0"></script>          

</body>
</html>

