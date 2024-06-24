
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
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
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
                                    <img src="{{asset("foto_user/".$data->foto)}}" alt="foto" width="50px" height="50px">
                                </td>
                                <td> {{$data->username}} </td>
                                <td> {{$data->name}} </td>
                                <td width="15%">
                                    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail" ><i class=" ri-eye-line"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-confirm-delete="true" data-bs-placement="top" title="Delete" ><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
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
                                    <img src="{{asset("foto_user/".$data->foto)}}" alt="foto"  height="100px">
                                </td>
                                <td> {{$data->username}} </td>
                                <td> {{$data->name}} </td>
                                <td width="15%">
                                    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail" ><i class=" ri-eye-line"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-bs-target="#delete_user{{$data->id}}" data-bs-toggle="modal">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="delete_user{{$data->id}}" data-bs-backdrop="static" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('delete_user', $data->id) }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$data->id}}">
                                                        <p>Apakah Anda yakin ingin menghapus pengguna ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal -->
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
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
                    <form action="/admin/data-users/tambah-user" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="number" name="nip" class="form-control @error('nip') is-invalid @enderror" id="nip" placeholder="NIP (Nomor Induk Pegawai)" value="{{ old('nip') }}" required>
                                    <label for="nip">NIP (Nomor Induk Pegawai)</label>
                                    @error('nip')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nama User" value="{{ old('name') }}" required>
                                    <label for="name">Nama User</label>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username" value="{{ old('username') }}" required>
                                    <label for="username">Username</label>
                                    @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                                    <label for="password">Password</label>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" id="foto" accept=".jpg, .jpeg, .png" placeholder="Pilih Foto Profile" required>
                                    <label for="foto">Pilih Foto Profile</label>
                                    @error('foto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="role" aria-label="Floating label select example" name="role" required>
                                        <option disabled {{ old('role') ? '' : 'selected' }}>Role</option>
                                        <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>Manager</option>
                                        <option value="teknisi" {{ old('role') == 'teknisi' ? 'selected' : '' }}>Teknisi</option>
                                    </select>
                                    <label for="role">Silahkan Pilih Role</label>
                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
                </div>
                </div>
            </div>
            </div><!-- End Basic Modal-->
            <!-- Basic Modal -->




      </div>
    </section>

  </main><!-- End #main -->


  @include('admin.layout.footer-admin')


</body>

</html>
