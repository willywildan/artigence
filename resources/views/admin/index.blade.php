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
  <!-- Page level plugin CSS-->
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

</head>
<body>
  @include('/admin/partials/sidebar')
   <!-- Main content -->
 <div class="main-content">
    
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{url('admin/informasi')}}">Informasi Seluruh Pintu Air</a> 
        <!-- Form -->
               <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">

          </div>
        </form>
        <!-- User -->

      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          
        </div>
      </div>
    </div>


    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->


          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>Pintu Air Kawasan DKI Jakarta
            </div>
           <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="dataTable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">nama pintu air</th>
                    <th scope="col">Tinggi permukaan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aman</th>
                    <th scope="col">siaga iii</th>
                    <th scope="col">siaga ii</th>
                    <th scope="col">siaga i</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                   <th scope="col">nama pintu air</th>
                   <th scope="col">Tinggi permukaan</th>
                   <th scope="col">Status</th>
                    <th scope="col">Aman</th>
                    <th scope="col">siaga iii</th>
                    <th scope="col">siaga ii</th>
                    <th scope="col">siaga i</th>
                  </tr>
                </tfoot>
                
                <tbody>
                 @foreach($data_laporan as $laporan)
              <tr>
                <td>{{$laporan->nama_pintu_air}}</td>
                <td>{{$laporan->tinggi_permukaan_air}}</td>
                <td>{{$laporan->status}}</td>
                <td><p><</p>{{$laporan->interval1a}}</td>
                <td>{{$laporan->interval1a}}<p>-</p>{{$laporan->interval1b}} </td>
                <td>{{$laporan->interval2a}} <p>-</p>{{$laporan->interval2b}}</td>
                <td><p>></p>{{$laporan->interval2b}}</td>
                
                
              </tr>
              @endforeach
                </tbody>


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
<script src="./assets/vendor/jquery/jquery.min.js"></script>
<script src="./js/demo/datatables-demo.js"></script>
<script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="./assets/vendor/datatables/jquery.dataTables.js"></script>
<script src="./assets/vendor/datatables/dataTables.bootstrap4.js"></script>
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="./assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="./assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="./assets/js/argon.js?v=1.0.0"></script>    
</body>
</html>



 