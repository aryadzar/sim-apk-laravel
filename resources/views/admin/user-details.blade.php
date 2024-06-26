
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
          <li class="breadcrumb-item">Data Users</li>
          <li class="breadcrumb-item active">User Details : {{ $target_user->name}}</li>

        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
          <div class="col-xl-4">

            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <img src="{{asset('foto_user/'. $target_user->foto)}}" alt="Profile" id="currentProfileImage1" class="rounded-circle">
                <h2>{{ $target_user->name }}</h2>
                <h3 class="mt-3">{{ucfirst($target_user->role)}}</h3>
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
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                  </li>



                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
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
                      <div class="col-lg-3 col-md-4 label ">NIP (Nomor Induk Pekerjaan  )</div>
                      <div class="col-lg-9 col-md-8">{{$target_user->nip}}</div>
                    </div>


                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                      <div class="col-lg-9 col-md-8">{{$target_user->name}}</div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Username</div>
                      <div class="col-lg-9 col-md-8">{{$target_user->username}}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Role SIM-APK</div>
                      <div class="col-lg-9 col-md-8">{{  ucfirst($target_user->role)  }}</div>
                    </div>


                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Dibuat </div>
                        @php
                            setLocale(LC_TIME,'id');
                      @endphp
                      <div class="col-lg-9 col-md-8">{{$target_user->created_at->diffForHumans()}}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Update Terakhir</div>
                      <div class="col-lg-9 col-md-8">{{  $target_user->updated_at->diffForHumans()  }}</div>
                    </div>

                  </div>

                  <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                    <form id="updateProfileForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto Profil</label>
                            <div class="col-md-8 col-lg-9">
                                <img src="{{ asset('foto_user/'.$target_user->foto) }}" alt="Profile" id="currentProfileImage2">
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



                    <form action="{{route('edit_details_user', $target_user->id)}}" method="post">
                        @csrf
                        <div class="row mb-3">
                          <label for="nip" class="col-md-4 col-lg-3 col-form-label">NIP</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="nip" type="text" class="form-control" id="nip" value="{{$target_user->nip}}">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="name" type="text" class="form-control" id="nama" value="{{$target_user->name}}">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="nama" class="col-md-4 col-lg-3 col-form-label">Username</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="username" type="text" class="form-control" id="nama" value="{{$target_user->username}}">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="role" class="col-md-4 col-lg-3 col-form-label">Role User</label>
                          <div class="col-md-8 col-lg-9">
                              <select class="form-select" id="role" aria-label="Floating label select example" name="role" required>
                                  <option disabled >Role</option>
                                  <option value="manager" {{ $target_user->role == 'manager' ? 'selected' : '' }}>Manager</option>
                                  <option value="teknisi" {{ $target_user->role == 'teknisi' ? 'selected' : '' }}>Teknisi</option>
                              </select>
                          </div>
                        </div>


                        <div class="text-center">
                          <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>

                    </form>

                  </div>



                  <div class="tab-pane fade pt-3" id="profile-change-password">
                    <!-- Change Password Form -->
                    <form id="changePasswordForm" action="{{ route('change_password_user') }}" method="POST">
                        @csrf

                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <h4 class="alert-heading">Password Default</h4>
                            <p>Password akan diganti menjadi password default perusahaan. Silahkan ingatkan user untuk mengganti password.</p>
                            <hr>
                            <p class="mb-0">Untuk Admin Tercinta</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <input type="hidden" name="id" value="{{ $target_user->id }}">

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>
                    </form><!-- End Change Password Form -->

                  </div>

                </div><!-- End Bordered Tabs -->

              </div>
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
                url: "{{ route('update_profile', ['id' => $target_user->id]) }}",
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
                      url: "{{ route('remove_profile_image', ['id' => $target_user->id]) }}",
                      method: 'POST',
                      data: {_method: 'DELETE', _token: "{{ csrf_token() }}"},
                      success: function(response) {
                          $('#currentProfileImage').attr('src', ''); // Kosongkan gambar profil
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

  @include('admin.layout.footer-admin')


</body>

</html>
