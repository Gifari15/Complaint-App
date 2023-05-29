<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- FILE CSS BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/homeStyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css" /> -->

    <!-- LINK ICON DARI FLATICON -->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-straight/css/uicons-bold-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css'>
    </head>

    <body>
        <div>
            <div class="konten">
                <div class="sidebar">
                    <!-- <label> -->
                        <center>
                        <table border="0" align="center">
                        <tr>
                            <td>
                                <span class="sidebar_label">Judul</span>
                            </td>
                        </tr>
                        </table>
                        </center>
                    <!-- </label> -->
                    <div class="container_menu">
                    <nav class="nav flex-column">
                        <a class="nav-link active margin_menu bgmenu" href="/admin">
                             <i class="fi fi-rr-house-chimney sidebar_icon_margin" style="color:white"></i>
                            <font color="white" class="teks">Home</font>
                        </a>
                        <a class="nav-link margin_menu bgmenu_active" href="/admin/masyarakat">
                            <i class="fi fi-rr-users-alt sidebar_icon_margin" style="color:white"></i>
                            <font color="white" class="teks label_menu">Masyarakat</font>
                        </a>
                        <a class="nav-link margin_menu bgmenu" href="/admin/pengaduan">
                            <i class="fi fi-rr-document sidebar_icon_margin" style="color:white"></i>
                            <font color="white" class="teks">Pengaduan</font>   
                        </a>
                        <a class="nav-link margin_menu bgmenu" href="/admin/tanggapan">
                            <i class="fi fi-rs-clipboard-list-check sidebar_icon_margin" style="color:white"></i>
                            <font color="white" class="teks">Tanggapan</font>   
                            </a>
                        <a class="nav-link margin_menu bgmenu" href="/admin/logout">
                        <i class="fi fi-bs-sign-out-alt sidebar_icon_margin" style="color:white"></i>
                            <font color="white" class="teks">Logout</font>
                        </a>
                    </nav>
                    </div>
                </div>
                <div class="container_content">
                    <div class="header">
                        <span class="label_header">Aplikasi Pengaduan Masyarakat</span>
                        
                        <div class="center_user">
                            <i class="fi fi-ss-user" style="color:white; font-size:20px;"></i>
                            <span class="label_user"><?php echo session()->get('nama');?></span>
                        </div>
                    </div>
                   
                    <!-- ISI CONTENT -->
                    <div class="bottom_body_content_out">
                        <div class="bottom_body_content_in">
                        <div class="label_home">
                            <span class="title_konten">Data Masyarakat</span>
                           
                        </div>
                        <table id="myTable" style="margin:20px auto;" class="table table-striped table_radius">
                            <thead class="thead-dark">
                            <tr>
                                <th style="padding-top:10px; padding-bottom:10px">NIK</th>
                                <th style="padding-top:10px; padding-bottom:10px">Nama</th>
                                <th style="padding-top:10px; padding-bottom:10px">Username</th>
                                <th style="padding-top:10px; padding-bottom:10px">Password</th>
                                <th style="padding-top:10px; padding-bottom:10px">No HP</th>
                                <th style="padding-top:10px; padding-bottom:10px">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($masyarakatt as $m)
                            <tr>
                                <td>{{ $m->nik }}</td>
                                <td>{{ $m->nama }}</td>
                                <td>{{ $m->username }}</td>
                                <td>{{ $m->password }}</td>
                                <td>{{ $m->telp }}</td>
                                <td style="display:flex; align-item:center; justify-content:center;">
                                    <!-- <a data-toggle="modal" data-target="#modalEdit" style="text-decoration:none"> -->
                                        <button class="btn btn-warning margin_edit center_edit" style="color:white" data-toggle="modal" data-target="#modalEditm{{ $m->nik }}">
                                            <i class="fi fi-rs-pencil edit_margin"></i>
                                            Edit
                                        </button>
                                    <!-- </a>  -->

                                    <a href="/admin/delmasyarakat/{{ $m->nik }}" onclick="return confirm('Apa Anda yakin menghapus user {{ $m->nama }}?')" style="text-decoration:none">
                                        <button class="btn btn-danger margin_delete center_delete">
                                            <i class="fi fi-rr-trash trash_margin"></i>
                                            Hapus
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            <div class="modal fade" id="modalEditm{{ $m->nik }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Ini adalah Bagian Header Modal -->
                                    <div class="modal-header">
                                    <h4 class="modal-title">Edit Data</h4>
                                    <a href="/admin/masyarakat">
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </a>
                                    </div>
                                    <!-- Ini adalah Bagian Body Modal -->
                                    <form method="post" action="/admin/updatemasyarakat/{{ $m->nik }}">
                                    
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="modal-body">
                                        <label class="form-label">NIK</label>
                                        <input type="text" id="nik" name="nik" class="form-control" placeholder="Masukkan nama petugas" value="{{ $m->nik }}" required />
                                    </div>
                                    <div class="modal-body">
                                        <label class="form-label">Nama</label>
                                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama petugas" value="{{ $m->nama }}" required />
                                    </div>
                                    <div class="modal-body">
                                        <label class="form-label">Username</label>
                                        <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan password" value="{{ $m->username }}" required />
                                    </div>
                                    <div class="modal-body">
                                        <label class="form-label">Password</label>
                                        <input type="text" id="password" name="password" class="form-control" placeholder="Masukkan Password" value="{{ $m->password }}" required />
                                    </div>
                                    <div class="modal-body">
                                        <label class="form-label">No Telepon</label>
                                        <input type="text" id="telpp" name="telp" class="form-control" placeholder="Masukkan no telepon" value="{{ $m->telp }}" required />
                                    </div>
                                    
                                    <!-- Ini adalah Bagian Footer Modal -->
                                    <div class="modal-footer">
                                        
                                        <a href="/admin/masyarakat" class="btn btn-outline-danger" style="border-width:2px;">Close</a>
                                        <!-- </button> -->
                                        <button type="submit" name="submit" class="btn btn-outline-primary" id="buatdata" onclick="tambahdata()" style="border-width:2px;">
                                        Update Data
                                        </button>
                                    </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                            <!-- Akhir Modal Edit -->
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                    @yield('konten')
                </div>
                
            </div>
        </div>

        <!-- FILE JS BOOTSTRAP -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
        <!-- <script src="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.js"></script> -->
        <!-- DataTables -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.js"></script>
        <!-- <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script> -->
        <script>
            $(document).ready( function () {
                $('#myTable').DataTable({
                    "pageLength": 5
                });
            });
        </script>
    </body>
</html>