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
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{url('admin/pengambilan')}}">Pengambilan Keputusan</a>
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">

          </div>
        </form>
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

        </div>
      </div>
    </div>


    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>Keputusan Pembukaan Pintu Air
            </div>
           <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="dataTable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Id Pintu Air</th>
                    <th scope="col">Tanggal, Waktu</th>
                    <th scope="col">Nama Pintu Air</th>
                    <th scope="col">Tinggi Permukaan air (cm) </th>
                    <th scope="col">Curah Hujan </th>
                    <th scope="col">Hasil Keputusan Bukaan Pintu Air (%)</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th scope="col">Id Pintu Air</th>
                    <th scope="col">Tanggal, Waktu</th>
                   <th scope="col">Nama Pintu Air</th>
                    <th scope="col">Tinggi Permukaan air (cm) </th>
                    <th scope="col">Curah Hujan </th>
                    <th scope="col">Hasil Keputusan Bukaan Pintu Air (%)</th>
                  </tr>
                </tfoot>

                <tbody>
                    @foreach($data_laporan as $laporan)
                    <tr>
                      <td>{{$laporan->id_pintu_air}}</td>
                      <td>{{$laporan->tanggal}}</td>
                      <td>{{$laporan->nama_pintu_air}}</td>
                      <td>{{$laporan->tinggi_permukaan_air}}</td>
                     
                     <?php 

                    $input_ch = $laporan->curah;
                    $input_pa = $laporan->tinggi_permukaan_air; 
                  
                  

                      
                    
            
                      $curah_hujan = $input_ch;
                      $permukaan_air = $input_pa;
                      $bukaan_pintu_air = 0;


                      $air_aman = 0;
                      $air_waspada = 0;
                      $air_kritis = 0;
                      $air_bencana = 0;

                      $hujan_rendah = 0;
                      $hujan_menengah = 0;
                      $hujan_tinggi = 0;


                      //========================================//
                      //aman
                      
                     if ($permukaan_air <= 0) {
                          $permukaan_air = 1;
                          $air_aman = $permukaan_air;
                         /* echo $air_aman;*/

                        }
                        elseif ($permukaan_air >0 && $permukaan_air < $laporan->interval1a) {
                          $permukaan_air = ( $laporan->interval1a - $permukaan_air)/( $laporan->interval1a-0);
                          $air_aman = $permukaan_air;
                          /*echo $air_aman;*/
                        }
                        elseif ($permukaan_air >=  $laporan->interval1a) {
                          $permukaan_air = 0;
                          $air_aman = $permukaan_air;
                          /*echo $air_aman;*/
                        }


                        /*echo "<br>";*/
                        $permukaan_air = $input_pa;

                        //waspada
                        /*echo "Air Waspada = ";*/
                        if ($permukaan_air ==  $laporan->interval1a) {
                          $permukaan_air = 1;
                          $air_waspada = $permukaan_air;
                          /*echo $air_waspada;*/
                        }
                        elseif ($permukaan_air >0 && $permukaan_air < $laporan->interval1a) {
                          $permukaan_air = ($permukaan_air - 0)/( $laporan->interval1a-0);
                          $air_waspada = $permukaan_air;
                          /*echo $air_waspada;*/
                        }
                        elseif ($permukaan_air > $laporan->interval1a && $permukaan_air < $laporan->interval2a) {
                          $permukaan_air = ( $laporan->interval2a-$permukaan_air)/( $laporan->interval2a- $laporan->interval1a);
                          $air_waspada = $permukaan_air;
                          /*echo $air_waspada;*/
                        }
                        elseif ($permukaan_air >=  $laporan->interval2a) {
                          $permukaan_air = 0;
                          $air_waspada = $permukaan_air;
                          /*echo $air_waspada;*/
                        }

                        /*echo "<br>";*/
                        $permukaan_air = $input_pa;
                        //kritis
                        /*echo "Air Kritis = ";*/
                        if ($permukaan_air ==  $laporan->interval2a) {
                          $permukaan_air = 1;
                          $air_kritis = $permukaan_air;
                          /*echo $air_kritis;*/
                        }
                        elseif ($permukaan_air > $laporan->interval1a && $permukaan_air < $laporan->interval2a) {
                          $permukaan_air = ($permukaan_air -  $laporan->interval1a)/( $laporan->interval2a- $laporan->interval1a);
                          $air_kritis = $permukaan_air;
                          /*echo $air_kritis;*/
                        }
                        elseif ($permukaan_air > $laporan->interval2a && $permukaan_air < $laporan->interval2b) {
                          $permukaan_air = ( $laporan->interval2b-$permukaan_air)/( $laporan->interval2b- $laporan->interval2a);
                          $air_kritis = $permukaan_air;
                          /*echo $air_kritis;*/
                        }
                        elseif ($permukaan_air >=  $laporan->interval2b ||$permukaan_air <=  $laporan->interval1a) {
                          $permukaan_air = 0;
                          $air_kritis = $permukaan_air;
                          /*echo $air_kritis;*/
                        }

                        /*echo "<br>";*/
                        $permukaan_air = $input_pa;
                        //bencana
                        // echo "Air Bencana = ";
                        if ($permukaan_air >=  $laporan->interval2b) {
                          $permukaan_air = 1;
                          $air_bencana = $permukaan_air;
                          //echo $air_bencana;
                        }
                        elseif ($permukaan_air > $laporan->interval2a && $permukaan_air < $laporan->interval2b) {
                          $permukaan_air = ($permukaan_air -  $laporan->interval2a)/( $laporan->interval2b- $laporan->interval2a);
                          $air_bencana = $permukaan_air;
                         // echo $air_bencana;
                        }
                        elseif ($permukaan_air <=  $laporan->interval2a) {
                          $permukaan_air = 0;
                          $air_bencana = $permukaan_air;
                          //echo $air_bencana;
                        }
                        //echo "<br>";
                       // echo "<br>";
                        //=================================//

                        //Hujan Rendah
                        //echo "Curah Hujan Rendah = ";
                        if ($curah_hujan <= 0) {
                          $curah_hujan = 1;
                          $hujan_rendah = $curah_hujan;
                        //  echo $hujan_rendah;
                        }
                        elseif ($curah_hujan >0 && $curah_hujan <100) {
                          $curah_hujan = (100-$curah_hujan)/(100-0);
                          $hujan_rendah = $curah_hujan;
                         // echo $hujan_rendah;
                        }
                        elseif ($curah_hujan >= 100) {
                          $curah_hujan = 0;
                          $hujan_rendah = $curah_hujan;
                          //echo $hujan_rendah;
                        }

                        //echo "<br>";
                        $curah_hujan = $input_ch;
                        //Hujan Menengah
                       // echo "Curah Hujan Menengah = ";
                        if ($curah_hujan == 100) {
                          $curah_hujan = 1;
                          $hujan_menengah = $curah_hujan;
                          //echo $hujan_menengah;
                        }
                        elseif ($curah_hujan >0 && $curah_hujan <100) {
                          $curah_hujan = ($curah_hujan - 0)/(100-0);
                          $hujan_menengah = $curah_hujan;
                         // echo $hujan_menengah;
                        }
                        elseif ($curah_hujan >100 && $curah_hujan <300) {
                          $curah_hujan = (300-$curah_hujan)/(300-100);
                          $hujan_menengah = $curah_hujan;
                          //echo $hujan_menengah;
                        }
                        elseif ($curah_hujan >= 300 || $curah_hujan <= 0) {
                          $curah_hujan = 0;
                          $hujan_menengah = $curah_hujan;
                         // echo $hujan_menengah;
                        }

                       // echo "<br>";
                        $curah_hujan = $input_ch;
                        //Hujan Tinggi
                      //  echo "Curah Hujan Tinggi = ";
                        if ($curah_hujan >= 300) {
                          $curah_hujan = 1;
                          $hujan_tinggi = $curah_hujan;
                        // echo $hujan_tinggi;
                        }
                        elseif ($curah_hujan >200 && $curah_hujan <300) {
                          $curah_hujan = ($curah_hujan - 200)/(300-200);
                          $hujan_tinggi = $curah_hujan;
                         // echo $hujan_tinggi;
                        }
                        elseif ($curah_hujan <= 200) {
                          $curah_hujan = 0;
                          $hujan_tinggi = $curah_hujan;
                         // echo $hujan_tinggi;
                        }

                       // echo "<br>";
                       // echo "<br>";

                       // echo "Rule 1"."<br>";
                        if ($air_aman < $hujan_rendah) {
                          $a1 = $air_aman;
                        }
                        elseif ($hujan_rendah < $air_aman) {
                          $a1 = $hujan_rendah;
                        }
                        else{
                          $a1 = $air_aman;
                        }

                        //z1
                        $z1 = $a1*(100-0)+0; 

                        /*echo "a1 = ".$a1."<br>";
                        echo "z1 = ".$z1;

                        echo "<br>";
                        echo "<br>";

                        echo "Rule 2"."<br>";
*/
                        //a2
                        if ($air_aman < $hujan_menengah) {
                          $a2 = $air_aman;
                        }
                        elseif ($hujan_menengah < $air_aman) {
                          $a2 = $hujan_menengah;
                        }
                        else{
                          $a2 = $air_aman;
                        }

                        //z2
                        $z2 = $a2*(100-0)+0;

                       /* echo "a3 = ".$a2."<br>";
                        echo "z3 = ".$z2;

                        echo "<br>";
                        echo "<br>";


                        echo "Rule 3"."<br>";*/
                        //a3
                        if ($air_aman < $hujan_tinggi) {
                          $a3 = $air_aman;
                        }
                        elseif ($hujan_tinggi < $air_aman) {
                          $a3 = $hujan_tinggi;
                        }
                        else{
                          $a3 = $air_aman;
                        }

                        //z3
                        $z3 = 100-$a3*(100-0);

                        /*echo "a3 = ".$a3."<br>";
                        echo "z3 = ".$z3;

                        echo "<br>";
                        echo "<br>";

                        echo "Rule 4"."<br>";*/
                        //a4
                        if ($air_waspada < $hujan_rendah) {
                          $a4 = $air_waspada;
                        }
                        elseif ($hujan_rendah < $air_waspada) {
                          $a4 = $hujan_rendah;
                        }
                        else{
                          $a4 = $air_waspada;
                        }

                        //z4
                        $z4 = 100-$a4*(100-0);

                        /*echo "a4 = ".$a4."<br>";
                        echo "z4 = ".$z4;

                        echo "<br>";
                        echo "<br>";

                        echo "Rule 5"."<br>";*/
                        //a5
                        if ($air_waspada < $hujan_menengah) {
                          $a5 = $air_waspada;
                        }
                        elseif ($hujan_menengah < $air_waspada) {
                          $a5 = $hujan_menengah;
                        }
                        else{
                          $a5 = $air_waspada;
                        }

                        //z5
                        $z5 = 100-$a5*(100-0);

                       /* echo "a5 = ".$a5."<br>";
                        echo "z5 = ".$z5;

                        echo "<br>";
                        echo "<br>";

                        echo "Rule 6"."<br>";*/
                        //a6
                        if ($air_waspada < $hujan_tinggi) {
                          $a6 = $air_waspada;
                        }
                        elseif ($hujan_tinggi < $air_waspada) {
                          $a6 = $hujan_tinggi;
                        }
                        else{
                          $a6 = $air_waspada;
                        }

                        //z6
                        $z6 = 100-$a6*(100-0);

                        /*echo "a6 = ".$a6."<br>";
                        echo "z6 = ".$z6;

                        echo "<br>";
                        echo "<br>";

                        echo "Rule 7"."<br>";*/
                        //a7
                        if ($air_kritis < $hujan_rendah) {
                          $a7 = $air_kritis;
                        }
                        elseif ($hujan_rendah < $air_kritis) {
                          $a7 = $hujan_rendah;
                        }
                        else{
                          $a7 = $air_kritis;
                        }

                        //z7
                        $z7 = 100-$a7*(100-0);

                        /*echo "a7 = ".$a7."<br>";
                        echo "z7 = ".$z7;

                        echo "<br>";
                        echo "<br>";

                        echo "Rule 8"."<br>";*/
                        //a8
                        if ($air_kritis < $hujan_menengah) {
                          $a8 = $air_kritis;
                        }
                        elseif ($hujan_menengah < $air_kritis) {
                          $a8 = $hujan_menengah;
                        }
                        else{
                          $a8 = $air_kritis;
                        }

                        //z8
                        $z8 = 100-$a8*(100-0);

                       /* echo "a8 = ".$a8."<br>";
                        echo "z8 = ".$z8;

                        echo "<br>";
                        echo "<br>";

                        echo "Rule 9"."<br>";*/
                        //a9
                        if ($air_kritis < $hujan_tinggi) {
                          $a9 = $air_kritis;
                        }
                        elseif ($hujan_tinggi < $air_kritis) {
                          $a9 = $hujan_tinggi;
                        }
                        else{
                          $a9 = $air_kritis;
                        }

                        //z9
                        $z9 = 100-$a9*(100-0);

                        /*echo "a9 = ".$a9."<br>";
                        echo "z9 = ".$z9;

                        echo "<br>";
                        echo "<br>";

                        echo "Rule 10"."<br>";*/
                        //a10
                        if ($air_bencana < $hujan_rendah) {
                          $a10 = $air_bencana;
                        }
                        elseif ($hujan_rendah < $air_bencana) {
                          $a10 = $hujan_rendah;
                        }
                        else{
                          $a10 = $air_bencana;
                        }

                        //z10
                        $z10 = 100-$a10*(100-0);

                       /* echo "a10 = ".$a10."<br>";
                        echo "z10 = ".$z10;

                        echo "<br>";
                        echo "<br>";

                        echo "Rule 11"."<br>";*/
                        //a11

                        if ($air_bencana< $hujan_menengah) {
                          $a11 = $air_bencana;
                        }
                        elseif ($hujan_menengah < $air_bencana) {
                          $a11 = $hujan_menengah;
                        }
                        else{
                          $a11 = $air_bencana;
                        }
                        //echo "A = ".$a11."<br>";

                        //z11
                        $z11 = 100-$a11*(100-0);

                       /* echo "a11 = ".$a11."<br>";
                        echo "z11 = ".$z11;

                        echo "<br>";
                        echo "<br>";

                        echo "Rule 12"."<br>";*/
                        //a1
                        if ($air_bencana < $hujan_tinggi) {
                          $a12 = $air_bencana;
                        }
                        elseif ($hujan_tinggi < $air_bencana) {
                          $a12 = $hujan_tinggi;
                        }
                        else{
                          $a12 = $air_bencana;
                        }

                        //z12
                        $z12 = 100-$a12*(100-0);

                        /*echo "a12 = ".$a12."<br>";
                        echo "z12 = ".$z12;


                        echo "<br>";
                        echo "<br>";*/

                        $z_akhir = (($a1*$z1)+($a2*$z2)+($a3*$z3)+($a4*$z4)+($a5*$z5)+($a6*$z6)+($a7*$z7)+($a8*$z8)+($a9*$z9)+($a10*$z10)+($a11*$z11)+($a12*$z12))/($a1+$a2+$a3+$a4+$a5+$a6+$a7+$a8+$a9+$a10+$a11+$a12);
                        /*echo "<br>";
                        echo "Nilai Terbobot = ";*/
                        $bulat = ceil($z_akhir);
                        /*echo $bulat;
                        echo "%";*/
                     

                      ?>
                      <td> {{$input_ch}}</td>
                      <td> {{$bulat}} %</td>
              
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
    