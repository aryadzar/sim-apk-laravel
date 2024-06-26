
@include('admin.layout.header-admin')


<body>

  @include('admin.layout.nav-admin')

 @include('admin.layout.sidebar-admin')
<!-- ======= Sidebar ======= -->
{{-- <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item" class="active">
        <a class="nav-link " href="/admin">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#data-users-nav" data-bs-toggle="collapse" href="#">
          <i class=" ri-account-box-fill"></i><span>Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="data-users-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/admin/data-users">
              <i class="bi bi-circle"></i><span>Data Users</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/">
            <i class="bi bi-airplane"></i>
          <span>Data Pesawat</span>
        </a>
      </li><!-- End Dashboard Nav -->
    </aside><!-- End Sidebar--> --}}

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

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">


                <div class="card-body">
                  <h5 class="card-title">Manager </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class=" ri-user-2-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6> {{ $manager}} </h6>
                      <a href="" class="text-muted">View Details > </a>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

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

              <div class="card info-card customers-card">


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
            <div class="col">
                <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Data Users Chart</h5>

                      <div class="table-responsive">
                          <div id="dataChart" style="width: 600px; height: 400px; margin: auto;"></div>

                      </div>

                      <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            var chartDom = document.getElementById('dataChart');
                            var myChart = echarts.init(chartDom);

                            var option = {
                                title: {
                                    text: 'Data Users Chart',
                                    left: 'center'
                                },
                                tooltip: {
                                    trigger: 'item'
                                },
                                legend: {
                                    orient: 'vertical',
                                    left: 'left',
                                },
                                series: [
                                    {
                                        name: 'Users',
                                        type: 'pie',
                                        radius: '50%',
                                        data: [
                                            { value: {{ $manager }}, name: 'Managers' },
                                            { value: {{ $teknisi }}, name: 'Teknisi' },
                                            { value: {{ $admin }}, name: 'Admin'},
                                            { value: {{ $pesawat }}, name: 'Pesawat'},
                                        ],
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

                            option && myChart.setOption(option);
                        });
                    </script>
                  </div>
              </div>
              </div>

      </div>
    </section>

  </main><!-- End #main -->



  @include('admin.layout.footer-admin')


</body>

</html>
