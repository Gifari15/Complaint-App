<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- FILE CSS BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../assets/css/homeStyle.css">
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
                            <a class="nav-link margin_menu bgmenu" href="/admin/masyarakat">
                                <i class="fi fi-rr-users-alt sidebar_icon_margin" style="color:white"></i>
                                <font color="white" class="teks">Masyarakat</font>
                            </a>
                            <a class="nav-link margin_menu bgmenu_active" href="/admin/pengaduan">
                                <i class="fi fi-rr-document sidebar_icon_margin" style="color:white"></i>
                                <font color="white" class="teks label_menu">Pengaduan</font>   
                            </a>
                            <a class="nav-link margin_menu bgmenu" href="/admin/tanggapan">
                                <i class="fi fi-rs-clipboard-list-check sidebar_icon_margin" style="color:white"></i>
                                <font color="white" class="teks">Tanggapan</font>   
                                </a>
                            <a class="nav-link margin_menu bgmenu" href="google.com">
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
                            <span class="label_user">Username</span>
                        </div>
                    </div>
                   
                    <!-- ISI CONTENT -->
                    <div class="bottom_body_content_out">
                        <div class="bottom_body_content_in">
                            <form method="post" action="/admin/tanggapan/add">
                            {{ csrf_field() }}
                                <div class="label_home">
                                    <span class="title_konten">Detail Pengaduan</span>
                                    <div class="kembali_detail">
                                        <button type="submit" class="btn btn-primary btn_add_petugas kirim_detail" style="border-width:2px;">Kirim</button>
                                        <a href="../../pengaduan">
                                            <button type="button" class="btn btn-dark btn_add_petugas" style="border-width:2px;">Kembali</button>
                                        </a>
                                    </div>
                                </div>
                                <div>
                                    <!-- <div class="detail_flex">
                                        <div class="label_detail">
                                            ID Pengaduan :
                                        </div>
                                        <div>
                                        {{ $pengaduann->id_pengajuan }}
                                        </div>
                                    </div> -->

                                    <div class="detail_flex">
                                        <div class="label_detail">
                                            NIK :
                                        </div>
                                        <div>
                                        {{ $pengaduann->nik }}
                                        </div>
                                    </div>

                                    <div class="detail_flex">
                                        <div class="label_detail">
                                            Tanggal Pengaduan :
                                        </div>
                                        <div>
                                        {{ $pengaduann->tgl_pengajuan }}
                                        </div>
                                    </div>

                                    <!-- <div class="detail_flex">
                                        <div class="label_detail">
                                            Status :
                                        </div>
                                        <div>
                                        {{ $pengaduann->status }}
                                        </div>
                                    </div> -->
                                </div>
                                <input type="hidden" id="id_petugas" name="id_petugas" class="form-control" placeholder="Masukkan UID" value="<?php echo session()->get('id');?>" required />
                                <input type="hidden" id="id_pengaduan" name="id_pengaduan" class="form-control" placeholder="Masukkan UID" value="{{ $pengaduann->id_pengajuan }}" required />
                                <div class="" style="margin-top:10px;">
                                <img width="" height="180px" style="max-widh:250px;" src="../../../Gambar/{{ $pengaduann->foto }}">
                                </div>
                                    <div class="container_detail">
                                    <textarea id="laporan" name = "laporan" rows="10" cols="50" onKeyPress class="form-control txarea_detail txarea_pengaduan" style="height:190px; border-width:2px; border-color:black;" placeholder="Isi Pengaduan" readonly>{{ $pengaduann->isi_laporan }}</textarea>
                                    <textarea id="tanggapan" name = "tanggapan" rows="10" cols="50" onKeyPress class="form-control txarea_detail txarea_tanggapan" style="height:190px; border-width:2px; border-color:black;" placeholder="Beri Tanggapan" required></textarea>
                                    </div>
                            </form>
                        </div>
                    </div>
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