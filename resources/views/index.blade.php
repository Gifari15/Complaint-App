<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <!-- add comment -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome CDN  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />

    <!-- CSS -->
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Login</title>
    <style>
   
    </style>
</head>

<body>
   <!-- Further code here -->
   <!-- TESTING COMMENT 1 -->
   <div class="main">
    <input type="checkbox" id="chk" aria-hidden="true"/>

    <div class="signup">
        <form  method="post" action="/regis">
        {{ csrf_field() }}
            <span class="label_sign" for="chk" aria-hidden="true">Sign up</span>
            <input type="text" name="nik" placeholder="NIK" required>
            <input type="text" name="nama" placeholder="Nama" required>
            <!-- <input type="text" name="nama" placeholder="Nama" required=""> -->
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="pswd" placeholder="Password">
            <input type="text" name="telp" placeholder="Telepon">
            <button>Sign up</button>
        </form>
    </div>

    <div class="login">
        <form method="post" action="/login">
            {{ csrf_field() }}
            <label for="chk" aria-hidden="true">Login</label>
            <input type="text" name="username" placeholder="Username" required="">
            <input type="text" name="password" placeholder="Password" required="">
            <button>Login</button>
        </form>
    </div>
</div>
</body>

</html>