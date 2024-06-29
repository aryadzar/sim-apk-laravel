
@include('manager.layout.header-admin')


<body>

  @include('manager.layout.nav-admin')
  @include('manager.layout.sidebar-admin')


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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah_jadwal">
                Tambah Jadwal
              </button>
              <a href="{{ route('export_excel_pesawat')}}" class="btn btn-success" style="margin-right: 20px;" >Export Excel</a>
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
                                    <th scope="col">Jenis Pesawat</th>
                                    <th scope="col">Tipe Pesawat</th>
                                    <th scope="col">Kapasitas Penumpang</th>
                                    <th scope="col">Jadwal Pemeliharaan</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($jadwal_pemeliharaan as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->pesawat->no_registrasi}}</td>
                                    <td>
                                        <img src="{{asset("foto_pesawat/".$data->pesawat->foto_pesawat)}}" alt="foto" height="30px">
                                    </td>
                                    <td> {{$data->pesawat->nama_maskapai}} </td>
                                    <td> {{$data->pesawat->jenis_pesawat}} </td>
                                    <td> {{$data->pesawat->tipe_pesawat}} </td>
                                    <td> {{$data->pesawat->kapasitas_penumpang}} </td>
                                    <td> {{$data->jadwal_pemeliharaan}} </td>
                                    <td width="50%"> {!!  $data->deskripsi  !!} </td>

                                    <td>
                                        @if ($data->status == 'Sedang Diperbaiki')
                                            <span class="badge bg-warning">{{$data->status}}</span>

                                        @elseif($data->status == "Belum Diperbaiki")
                                        <span class="badge bg-danger">{{$data->status}}</span>

                                        @else
                                        <span class="badge bg-primary">{{$data->status}}</span>

                                        @endif

                                    </td>

                                    <td width="20%">
                                        <a href="{{route('detail_pesawat_manager', $data->id)}}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"><i class="ri-eye-line"></i></a>
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

            <div class="modal fade" id="tambah_jadwal" data-bs-backdrop="static" tabindex="-1">
            <div class="modal-dialog modal-xl" >
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Jadwal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row table-responsive mt-5">
                        <div class="col table-responsive">
                            <table class="table table-hover datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">No Registrasi</th>
                                        <th scope="col">Foto Pesawat</th>
                                        <th scope="col">Nama Maskapai</th>
                                        <th scope="col">Jenis Pesawat</th>
                                        <th scope="col">Tipe Pesawat</th>
                                        <th scope="col">Kapasitas Penumpang</th>
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
                                            <img src="{{asset("foto_pesawat/".$data->foto_pesawat)}}" alt="foto" height="30px">
                                        </td>
                                        <td> {{$data->nama_maskapai}} </td>
                                        <td> {{$data->jenis_pesawat}} </td>
                                        <td> {{$data->tipe_pesawat}} </td>
                                        <td> {{$data->kapasitas_penumpang}} </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="col" style="margin-left: 50px">
                            <form action="{{route('tambah_jadwal_pemeliharaan')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="id_pesawat" name="id_pesawat" required>
                                                <option disabled {{ old('id_pesawat') ? '' : 'selected' }}>Pilih Pesawat</option>
                                                @foreach ( $data_pesawat as $data )

                                                <option value="{{$data->id}}" {{ old('id_pesawat') == $data->id ? 'selected' : '' }}>{{$data->no_registrasi }} - {{ $data->nama_maskapai}}</option>
                                                @endforeach
                                            </select>
                                            <label for="id_pesawat">Silahkan Pilih Pesawat Yang Ingin Dijadwalkan</label>
                                            @error('id_pesawat')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="datetime-local" name="jadwal_pemeliharaan" class="form-control @error('jadwal_pemeliharaan') is-invalid @enderror" id="jadwal_pemeliharaan" placeholder="Jadwal Pemeliharaan" value="{{ old('jadwal_pemeliharaan') }}" required>
                                            <label for="jadwal_pemeliharaan">Jadwal Pemeliharaan </label>
                                            @error('jadwal_pemeliharaan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <label for="deskripsi">Nama Maskapai</label>
                                            <textarea name="deskripsi" id="" class="tinymce-editor"></textarea>
                                            @error('deskripsi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        var tipePesawatData = {
            'Boeing': ['737', '747', '767', '777', '787'],
            'Airbus': ['A320', 'A330', 'A340', 'A350', 'A380']
        };

        var oldJenisPesawat = "{{ old('jenis_pesawat') }}";
        var oldTipePesawat = "{{ old('tipe_pesawat') }}";

        function populateTipePesawat(jenisPesawat, selectedTipe) {
            var tipePesawatSelect = $('#tipe_pesawat');
            tipePesawatSelect.empty();
            tipePesawatSelect.append('<option disabled>Pilih Tipe Pesawat</option>');
            if (jenisPesawat in tipePesawatData) {
                tipePesawatData[jenisPesawat].forEach(function(tipe) {
                    tipePesawatSelect.append('<option value="' + tipe + '">' + tipe + '</option>');
                });
            }
            if (selectedTipe) {
                tipePesawatSelect.val(selectedTipe);
            }
        }

        if (oldJenisPesawat) {
            $('#jenis_pesawat').val(oldJenisPesawat);
            populateTipePesawat(oldJenisPesawat, oldTipePesawat);
        }

        $('#jenis_pesawat').change(function() {
            var jenisPesawat = $(this).val();
            populateTipePesawat(jenisPesawat);
        });
    });
</script>

<script>
    document.querySelector('form').addEventListener('submit', function(e) {
        tinymce.triggerSave(); // Pastikan TinyMCE menyimpan konten textarea
    });
</script>
  @include('manager.layout.footer-admin')


</body>

</html>
