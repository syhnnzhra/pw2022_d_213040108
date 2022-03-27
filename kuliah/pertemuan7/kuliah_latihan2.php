<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coba Get</title>
</head>
<body>
    <!-- kirim data lewat get url?nama=Syahnann -->
    <a href="kuliah_latihan3.php?nama=Syahnann">Kirim Data Nama</a>

    <!-- pasangan for adalah id -->
    <!-- mengirim data menggunakan post -->
    <hr>
    <h1>Login form</h1>
    <form action="kuliah_latihan3.php" method="post">
        <label for="username"> Username :</label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password"> Password :</label>
        <input type="password" name="password" id="password">
        <br>
        <button type="submit"> kirim</button>
    </form>

</body>
</html>