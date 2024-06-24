
@include('admin.layout.header-admin')


<body>

  @include('admin.layout.nav-admin')


<!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed " href="/admin">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#data-users-nav" data-bs-toggle="collapse" href="#">
          <i class=" ri-account-box-fill"></i><span>Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="data-users-nav" class="nav-content " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/admin/data-users" class="active">
              <i class="bi bi-circle"></i><span>Data Users</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

    </aside><!-- End Sidebar-->


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Home</a></li>
          <li class="breadcrumb-item">Data Users</li>
          <li class="breadcrumb-item active">Data Users</li>

        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="d-flex flex-row-reverse mb-5">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah_user">
                Tambah User
              </button>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Data Manager</h5>

                  <!-- Table with hoverable rows -->
                  <div class="table-responsive">
                      <table class="table table-hover datatable">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Username</th>
                            <th scope="col">Nama</th>
                            <th scope="col">action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data_manager as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->nip}}</td>
                                <td>
                                    <img src="{{asset("foto_manager/".$data->foto)}}" alt="foto" width="50px" height="50px">
                                </td>
                                <td> {{$data->username}} </td>
                                <td> {{$data->name}} </td>
                                <td width="15%">
                                    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail" ><i class=" ri-eye-line"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" ><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>

                        @endforeach
                      </table>
                      <!-- End Table with hoverable rows -->

                  </div>

                </div>
              </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Data Teknisi</h5>

                  <!-- Table with hoverable rows -->
                  <div class="table-responsive">
                      <table class="table table-hover datatable table-responsive">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Username</th>
                            <th scope="col">Nama</th>
                            <th scope="col">action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data_teknisi as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->nip}}</td>
                                <td>
                                    <img src="{{asset("foto_teknisi/".$data->foto)}}" alt="foto" width="50%" height="50%">
                                </td>
                                <td> {{$data->username}} </td>
                                <td> {{$data->name}} </td>
                                <td>

                                </td>
                            </tr>
                        </tbody>

                        @endforeach
                      </table>

                  </div>
                  <!-- End Table with hoverable rows -->

                </div>
              </div>
        </div>

            <!-- Basic Modal -->

            <div class="modal fade" id="tambah_user" data-bs-backdrop="static" tabindex="-1">
            <div class="modal-dialog" >
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
                </div>
                </div>
            </div>
            </div><!-- End Basic Modal-->


      </div>
    </section>

  </main><!-- End #main -->



  @include('admin.layout.footer-admin')


</body>

</html>
