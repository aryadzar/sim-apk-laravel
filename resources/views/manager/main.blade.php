
@include('manager.layout.header-admin')


<body>

  @include('manager.layout.nav-admin')

 @include('manager.layout.sidebar-admin')

  <main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section dashboard">
        <div class="row">

          <!-- Left side columns -->
          <div class="col">
            <div class="row">

              <!-- Revenue Card -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">


                  <div class="card-body">
                    <h5 class="card-title">Teknisi</h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class=" ri-user-settings-fill"></i>
                      </div>
                      <div class="ps-3">
                        <h6> {{$teknisi}} </h6>
                        <a href="" class="text-muted">View Details > </a>

                      </div>
                    </div>
                  </div>

                </div>
              </div><!-- End Revenue Card -->

              <!-- Customers Card -->
              <div class="col-xxl-4 col-xl-12">

                <div class="card info-card sales-card">


                  <div class="card-body">
                    <h5 class="card-title">Pesawat </h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class=" ri-plane-line"></i>
                      </div>
                      <div class="ps-3">
                        <h6> {{$pesawat}} </h6>
                          <a href="" class="text-muted">View Details > </a>
                      </div>
                    </div>

                  </div>
                </div>

              </div><!-- End Customers Card -->

              <!-- Customers Card -->
              <div class="col-xxl-4 col-xl-12">

                <div class="card info-card customers-card">


                  <div class="card-body">
                    <h5 class="card-title">Pesawat </h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-airplane"></i>
                      </div>
                      <div class="ps-3">
                        <h6> {{$jadwal}} </h6>
                          <a href="" class="text-muted">View Details > </a>
                      </div>
                    </div>

                  </div>
                </div>

              </div><!-- End Customers Card -->

                <div class="col">
                  <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Pesawat Chart</h5>

                        <div class="table-responsive">
                              <div id="kapasitasPenumpangChart" style="width: 600px; height: 400px;"></div>
                              <div id="jenisPesawatChart" style="width: 600px; height: 400px; margin-top:50px;"></div>
                        </div>
                        <script>
                              document.addEventListener('DOMContentLoaded', function () {
                                      var kapasitasPenumpangChartDom = document.getElementById('kapasitasPenumpangChart');
                                      var jenisPesawatChartDom = document.getElementById('jenisPesawatChart');

                                      var kapasitasPenumpangChart = echarts.init(kapasitasPenumpangChartDom);
                                      var jenisPesawatChart = echarts.init(jenisPesawatChartDom);

                                      var pesawatData = @json($data_pesawat); // Assuming you pass $pesawatData from your controller

                                      // Data preparation for Kapasitas Penumpang per Maskapai
                                      var kapasitasPenumpangData = pesawatData.map(function (item) {
                                          return { name: item.nama_maskapai, value: item.kapasitas_penumpang };
                                      });

                                      // Data preparation for Jenis Pesawat
                                      var jenisPesawatCount = {};
                                      pesawatData.forEach(function (item) {
                                          if (jenisPesawatCount[item.jenis_pesawat]) {
                                              jenisPesawatCount[item.jenis_pesawat]++;
                                          } else {
                                              jenisPesawatCount[item.jenis_pesawat] = 1;
                                          }
                                      });

                                      var jenisPesawatData = Object.keys(jenisPesawatCount).map(function (key) {
                                          return { name: key, value: jenisPesawatCount[key] };
                                      });

                                      var kapasitasPenumpangOption = {
                                          title: {
                                              text: 'Kapasitas Penumpang per Maskapai',
                                              left: 'center'
                                          },
                                          tooltip: {
                                              trigger: 'item'
                                          },
                                          legend: {
                                              orient: 'vertical',
                                              left: 'left'
                                          },
                                          series: [
                                              {
                                                  name: 'Kapasitas Penumpang',
                                                  type: 'pie',
                                                  radius: '50%',
                                                  data: kapasitasPenumpangData,
                                                  emphasis: {
                                                      itemStyle: {
                                                          shadowBlur: 10,
                                                          shadowOffsetX: 0,
                                                          shadowColor: 'rgba(0, 0, 0, 0.5)'
                                                      }
                                                  }
                                              }
                                          ]
                                      };

                                      var jenisPesawatOption = {
                                          title: {
                                              text: 'Jumlah Jenis Pesawat',
                                              left: 'center'
                                          },
                                          tooltip: {
                                              trigger: 'item'
                                          },
                                          legend: {
                                              orient: 'vertical',
                                              left: 'left'
                                          },
                                          series: [
                                              {
                                                  name: 'Jenis Pesawat',
                                                  type: 'pie',
                                                  radius: '50%',
                                                  data: jenisPesawatData,
                                                  emphasis: {
                                                      itemStyle: {
                                                          shadowBlur: 10,
                                                          shadowOffsetX: 0,
                                                          shadowColor: 'rgba(0, 0, 0, 0.5)'
                                                      }
                                                  }
                                              }
                                          ]
                                      };

                                      kapasitasPenumpangOption && kapasitasPenumpangChart.setOption(kapasitasPenumpangOption);
                                      jenisPesawatOption && jenisPesawatChart.setOption(jenisPesawatOption);
                                  });
                        </script>
                    </div>
                </div>
                </div>
        </div>
      </section>
  </main><!-- End #main -->



  @include('manager.layout.footer-admin')


</body>

</html>
