
@include('admin.layout.header-admin')


<body>

  @include('admin.layout.nav-admin')
  @include('admin.layout.sidebar-admin')


{{-- <!-- ======= Sidebar ======= -->
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
      <li class="nav-item ">
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
          <li class="breadcrumb-item">Data</li>
          <li class="breadcrumb-item active">Data Pesawat</li>

        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="d-flex flex-row-reverse mb-5">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah_user">
                Tambah Pesawat
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
                    <h5 class="card-title">Data Pesawat</h5>
                    @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <!-- Table with hoverable rows -->
                    <div class="table-responsive">
                        <table class="table table-hover datatable table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">No Registrasi</th>
                                    <th scope="col">Foto Pesawat</th>
                                    <th scope="col">Nama Maskapai</th>
                                    <th scope="col">Tipe Pesawat</th>
                                    <th scope="col">Jenis Pesawat</th>
                                    <th scope="col">Kapasitas Penumpang</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data_pesawat as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->no_registrasi}}</td>
                                    <td>
                                        <img src="{{asset("foto_pesawat/".$data->foto_pesawat)}}" alt="foto" height="100px">
                                    </td>
                                    <td> {{$data->nama_maskapai}} </td>
                                    <td> {{$data->tipe_pesawat}} </td>
                                    <td> {{$data->jenis_pesawat}} </td>
                                    <td> {{$data->kapasitas_penumpang}} </td>
                                    <td width="15%">
                                        <a href="{{route('detail_pesawat', $data->id)}}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"><i class="ri-eye-line"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_pesawat{{$data->id}}" data-bs-placement="top" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="delete_pesawat{{$data->id}}" tabindex="-1" aria-labelledby="deleteModalLabel{{$data->id}}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{$data->id}}">Delete User</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Mau Menghapus Data pesawat {{ $data->no_registrasi}}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <form action="{{route('delete_pesawat', $data->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal -->

                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- End Table with hoverable rows -->

                </div>
            </div>
        </div>
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
            <!-- Basic Modal -->

            <div class="modal fade" id="tambah_user" data-bs-backdrop="static" tabindex="-1">
            <div class="modal-dialog" >
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('tambah_pesawat')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" name="no_registrasi" class="form-control @error('no_registrasi') is-invalid @enderror" id="no_registrasi" placeholder="No Registrasi" value="{{ old('no_registrasi') }}" required>
                                    <label for="no_registrasi">Nomor Registrasi </label>
                                    @error('no_registrasi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('nama_maskapai') is-invalid @enderror" name="nama_maskapai" id="name" placeholder="Nama User" value="{{ old('nama_maskapai') }}" required>
                                    <label for="nama_maskapai">Nama Maskapai</label>
                                    @error('nama_maskapai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="jenis_pesawat" name="jenis_pesawat" required>
                                        <option disabled selected>Pilih Jenis Pesawat</option>
                                        <option value="Komersial">Komersial</option>
                                        <option value="Militer">Militer</option>
                                    </select>
                                    <label for="jenis_pesawat">Silahkan Pilih Jenis Pesawat</label>
                                    @error('jenis_pesawat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-select" id="tipe_pesawat" name="tipe_pesawat" required>
                                        <option disabled selected>Pilih Tipe Pesawat</option>
                                    </select>
                                    <label for="tipe_pesawat">Silahkan Pilih Tipe Pesawat</label>
                                    @error('tipe_pesawat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-select" id="jenis_body_pesawat" name="jenis_body_pesawat" required>
                                        <option disabled selected>Pilih Jenis Body Pesawat</option>
                                    </select>
                                    <label for="jenis_body_pesawat">Silahkan Pilih Jenis Body Pesawat</label>
                                    @error('jenis_body_pesawat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" name="kapasitas_penumpang" class="form-control @error('kapasitas_penumpang') is-invalid @enderror" id="kapasitas_penumpang" placeholder="No Registrasi" value="{{ old('kapasitas_penumpang') }}" required>
                                <label for="kapasitas_penumpang">Kapasitas Penumpang</label>
                                @error('kapasitas_penumpang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control @error('foto_pesawat') is-invalid @enderror" name="foto_pesawat" id="foto_pesawat" accept=".jpg, .jpeg, .png" placeholder="Pilih Foto Pesawat" required>
                                <label for="foto_pesawat">Pilih Foto Pesawat</label>
                                @error('foto_pesawat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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

  <script>
document.addEventListener('DOMContentLoaded', function () {
    // Data tipe pesawat berdasarkan jenis pesawat
    const tipePesawatData = {
        Komersial: [
            { value: 'Airbus', label: 'Airbus' },
            { value: 'Boeing', label: 'Boeing' }
        ],
        Militer: [
            { value: 'F16', label: 'F16' },
            { value: 'Sukhoi', label: 'Sukhoi' }
        ]
    };

    // Data jenis body pesawat berdasarkan tipe pesawat
    const jenisBodyPesawatData = {
        Airbus: [
            { value: 'A220', label: 'A220' },
            { value: 'A320', label: 'A320' },
            { value: 'A380', label: 'A380' },
            { value: 'A350', label: 'A350' },
        ],
        Boeing: [
            { value: '737', label: '737' },
            { value: '747', label: '747' },
            { value: '767', label: '767' },
            { value: '777', label: '777' },
        ],
        F16: [
            { value: 'Block 50', label: 'Block 50' },
            { value: 'Block 60', label: 'Block 60' }
        ],
        Sukhoi: [
            { value: 'Su-27', label: 'Su-27' },
            { value: 'Su-30', label: 'Su-30' }
        ]
    };

    // Referensi ke elemen HTML
    const jenisPesawatSelect = document.getElementById('jenis_pesawat');
    const tipePesawatSelect = document.getElementById('tipe_pesawat');
    const jenisBodyPesawatSelect = document.getElementById('jenis_body_pesawat');

    // Event listener untuk perubahan pada dropdown jenis pesawat
    jenisPesawatSelect.addEventListener('change', function () {
        const jenisPesawat = this.value;
        const tipePesawatOptions = tipePesawatData[jenisPesawat] || [];

        // Hapus opsi sebelumnya
        tipePesawatSelect.innerHTML = '<option disabled selected>Pilih Tipe Pesawat</option>';
        jenisBodyPesawatSelect.innerHTML = '<option disabled selected>Pilih Jenis Body Pesawat</option>';

        // Tambah opsi baru
        tipePesawatOptions.forEach(function (tipe) {
            const option = document.createElement('option');
            option.value = tipe.value;
            option.textContent = tipe.label;
            tipePesawatSelect.appendChild(option);
        });
    });

    // Event listener untuk perubahan pada dropdown tipe pesawat
    tipePesawatSelect.addEventListener('change', function () {
        const tipePesawat = this.value;
        const jenisBodyPesawatOptions = jenisBodyPesawatData[tipePesawat] || [];

        // Hapus opsi sebelumnya
        jenisBodyPesawatSelect.innerHTML = '<option disabled selected>Pilih Jenis Body Pesawat</option>';

        // Tambah opsi baru
        jenisBodyPesawatOptions.forEach(function (jenis) {
            const option = document.createElement('option');
            option.value = jenis.value;
            option.textContent = jenis.label;
            jenisBodyPesawatSelect.appendChild(option);
        });
    });
});
  </script>
  @include('admin.layout.footer-admin')


</body>

</html>
