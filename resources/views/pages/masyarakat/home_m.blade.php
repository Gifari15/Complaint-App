<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- FILE CSS BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/homeStyle.css">
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
                        <a class="nav-link active margin_menu bgmenu_active" href="/masyarakat">
                            <i class="fi fi-bs-user sidebar_icon_margin" style="color:white"></i>
                            <font color="white" class="teks label_menu">Profile</font>
                        </a>
                        <a class="nav-link margin_menu bgmenu" href="/masyarakat/pengaduan">
                            <i class="fi fi-rr-document sidebar_icon_margin" style="color:white"></i>
                            <font color="white" class="teks">Pengaduan</font>   
                        </a>
                        <a class="nav-link margin_menu bgmenu" href="/masyarakat/history">
                            <i class="fi fi-rs-clipboard-list-check sidebar_icon_margin" style="color:white"></i>
                            <font color="white" class="teks">History</font>   
                        </a>
                        <a class="nav-link margin_menu bgmenu" href="/masyarakat/logout">
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
                            <span class="label_user"><?php echo session()->get('name');?></span>
                        </div>
                    </div>
                    

                    <!-- ISI CONTENT -->
                    <div class="bottom_body_content_out">
                        <div class="bottom_body_content_in_p">
                            <div class="label_p">

                                <div class="card-profile">
                                    <div class="container_ic_profile">
                                        <div class="lingkaran2">
                                            <i class="fi fi-bs-user" style="color:white; font-size:40px;"></i>
                                        </div>
                                    </div>   
                                    <div class="label_profile">
                                        <span class="title_konten" style="margin-bottom:20px;">Profile </span>
                                    </div>
                                    <div class="isi_profile">
                                        <span class="title_profile">ID :</span>
                                        <span class="txt_profile"><?php echo session()->get('nik');?></span>
                                    </div>
                                    <div class="isi_profile">
                                        <span class="title_profile">Nama :</span>
                                        <span class="txt_profile"><?php echo session()->get('name');?></span>
                                    </div>
                                    <div class="isi_profile">
                                        <span class="title_profile">Username :</span>
                                        <span class="txt_profile"><?php echo session()->get('username');?></span>
                                    </div>
                                    <div class="isi_profile">
                                        <span class="title_profile">Password :</span>
                                        <span class="txt_profile"><?php echo session()->get('password');?></span>
                                    </div>
                                </div>
                                    <div class="card-change-pw">
                                        <form method="post" action="masyarakat/changepw">
                                        {{ csrf_field() }}
                                        <div class="label_change">
                                            <span class="title_konten" style="margin-bottom:5px;">Edit Profile</span>
                                        </div>
                                        <div class="" style="margin-bottom:15px;">
                                            <label class="form-label input_profile">Username</label>
                                            <input type="hidden" id="nik" name="nik" class="form-control" placeholder="Masukkan Username" value="<?php echo session()->get('nik');?>" required />
                                            <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan Username" required />   
                                        </div>
                                        <div class="" style="margin-bottom:15px;">
                                            <label class="form-label input_profile">Password</label>
                                            <input type="text" id="nama" name="password" class="form-control" placeholder="Masukkan Password" required />   
                                        </div>
                                        <div class="">
                                            <label class="form-label input_profile">Konfirmasi Password</label>
                                            <input type="password" id="nama" name="konfirm" class="form-control" placeholder="Konfirmasi Password" required />   
                                        </div>
                                        <button class="btn btn-primary" type="submit" style="margin-top:10px;">Edit</button>
                                        </form>
                                </div>
                            </div>
                        
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
                    "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                    "pageLength": 4
                });
            });
            
        </script>
    </body>
</html>