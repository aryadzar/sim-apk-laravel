
@include('admin.layout.header-admin')


<body>

  @include('admin.layout.nav-admin')

  @include('admin.layout.sidebar-admin')



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Home</a></li>
          <li class="breadcrumb-item active">Detail Pesawat : {{ $target_pesawat->nama_maskapai}}</li>

        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
          <div class="col-xl-4">

            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <img src="{{asset('foto_pesawat/'. $target_pesawat->foto_pesawat)}}" alt="Profile" id="currentProfileImage1">
                <h2>{{ $target_pesawat->nama_maskapai }}</h2>
              </div>
            </div>

          </div>

          <div class="col-xl-8">

            <div class="card">
              <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">

                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Pesawat</button>
                  </li>


                </ul>
                <div class="tab-content pt-2">

                  <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <h5 class="card-title">Profile Details</h5>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">No Registrasi Pesawat </div>
                      <div class="col-lg-9 col-md-8">{{$target_pesawat->no_registrasi}}</div>
                    </div>


                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Nama Masakapai</div>
                      <div class="col-lg-9 col-md-8">{{$target_pesawat->nama_maskapai}}</div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Jenis Pesawat</div>
                      <div class="col-lg-9 col-md-8">{{$target_pesawat->jenis_pesawat}}</div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Tipe Pesawat</div>
                      <div class="col-lg-9 col-md-8">{{$target_pesawat->tipe_pesawat}}</div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Kapasitas Penumpang</div>
                      <div class="col-lg-9 col-md-8">{{$target_pesawat->kapasitas_penumpang}}</div>
                    </div>



                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Dibuat </div>
                        @php
                            setLocale(LC_TIME,'id');
                      @endphp
                      <div class="col-lg-9 col-md-8">{{$target_pesawat->created_at->diffForHumans()}}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Update Terakhir</div>
                      <div class="col-lg-9 col-md-8">{{  $target_pesawat->updated_at->diffForHumans()  }}</div>
                    </div>

                  </div>

                  <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                    <form id="updateProfileForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto Profil</label>
                            <div class="col-md-8 col-lg-9">
                                <img src="{{ asset('foto_pesawat/'.$target_pesawat->foto_pesawat) }}" alt="Profile" id="currentProfileImage2">
                                <div class="pt-2">
                                    <input type="file" name="profile_image" id="profileImage" style="display: none;" accept=".jpg, .jpeg, .png">
                                    <label for="profileImage" class="btn btn-primary btn-sm" title="Upload new profile image" id="uploadProfileImage">
                                        <i class="bi bi-upload"></i>
                                    </label>
                                    <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image" id="removeProfileImage">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form action="{{ route('edit_detail_pesawat', $target_pesawat->id) }}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label for="nip" class="col-md-4 col-lg-3 col-form-label">No Registrasi Pesawat</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="no_registrasi" type="text" class="form-control" id="nip" value="{{ $target_pesawat->no_registrasi }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama Maskapai</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="nama_maskapai" type="text" class="form-control" id="nama" value="{{ $target_pesawat->nama_maskapai }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-lg-3 col-form-label">Jenis Pesawat</label>
                            <div class="col-md-8 col-lg-9">
                                <select class="form-select" id="jenis_pesawat" name="jenis_pesawat" required>
                                    <option disabled {{ $target_pesawat->jenis_pesawat ? '' : 'selected' }}>Pilih Jenis Pesawat</option>
                                    <option value="Boeing" {{ $target_pesawat->jenis_pesawat == 'Boeing' ? 'selected' : '' }}>Boeing</option>
                                    <option value="Airbus" {{ $target_pesawat->jenis_pesawat == 'Airbus' ? 'selected' : '' }}>Airbus</option>
                                </select>
                                @error('jenis_pesawat')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-lg-3 col-form-label">Tipe Pesawat</label>
                            <div class="col-md-8 col-lg-9">
                                <select class="form-select" id="tipe_pesawat" name="tipe_pesawat" required>
                                    <option disabled {{ old('tipe_pesawat') ? '' : 'selected' }}>Pilih Tipe Pesawat</option>
                                    <!-- Options will be populated by AJAX -->
                                </select>
                                @error('tipe_pesawat')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kapasitas_penumpang" class="col-md-4 col-lg-3 col-form-label">Kapasitas Penumpang</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="kapasitas_penumpang" type="text" class="form-control" id="kapasitas_penumpang" value="{{ $target_pesawat->kapasitas_penumpang }}">
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>

                </div>
          </div>
        </div>
      </section>

  </main><!-- End #main -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
      $(document).ready(function() {
          // Event untuk tombol Upload
          $('#uploadProfileImage').click(function(e) {
              e.preventDefault();
              $('#profileImage').trigger('click'); // Trigger input file tersembunyi
          });

          // Event saat input file diubah (file dipilih)
          $('#profileImage').change(function() {
            var formData = new FormData();
            formData.append('profile_image', $(this)[0].files[0]);
            formData.append('_token', '{{ csrf_token() }}'); // Sertakan token CSRF

            $.ajax({
                url: "{{ route('update_foto_pesawat', ['id' => $target_pesawat->id]) }}",
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#currentProfileImage1').attr('src', response.path); // Update gambar profil
                    $('#currentProfileImage2').attr('src', response.path); // Update gambar profil
                    alert('Profile image updated successfully');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Error updating profile image');
                }
            });
        });

          // Event untuk tombol Remove
          $('#removeProfileImage').click(function(e) {
              e.preventDefault();
              if (confirm('Are you sure you want to remove your profile image?')) {
                  $.ajax({
                      url: "{{ route('delete_foto_pesawat', ['id' => $target_pesawat->id]) }} ",
                      method: 'POST',
                      data: {_method: 'DELETE', _token: "{{ csrf_token() }}"},
                      success: function(response) {
                          $('#currentProfileImage1').attr('src', ''); // Kosongkan gambar profil
                          $('#currentProfileImage2').attr('src', ''); // Kosongkan gambar profil
                          alert('Profile image removed successfully');
                      },
                      error: function(xhr, status, error) {
                          console.error(xhr.responseText);
                          alert('Error removing profile image');
                      }
                  });
              }
          });
      });
  </script>
<script>
    $(document).ready(function() {
        var tipePesawatData = {
            'Boeing': ['737', '747', '767', '777', '787'],
            'Airbus': ['A320', 'A330', 'A340', 'A350', 'A380']
        };

        var oldJenisPesawat = "{{ $target_pesawat->jenis_pesawat }}";
        var oldTipePesawat = "{{ $target_pesawat->tipe_pesawat }}";

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

  @include('admin.layout.footer-admin')


</body>

</html>
