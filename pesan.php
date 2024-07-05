<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Tiket Museum Nusantara</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="img/icons/font-awesome/css/font-awesome.min.css" />
    <style>
        body {
            text-align: center;
            padding: 20px; /* Added padding to the body */
            color : #f9f9f9;
        }
        form {
            display: inline-block; 
            text-align: left;
            margin-top: 20px; 
            padding: 20px; 
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            background-color: #f9f9f9; 
            max-width: 400px; 
            margin-left: auto; 
            margin-right: auto;
            color: black; 
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            color: white;
        }
        .navbar img#logo {
            height: 50px;
        }
        .navbar .tlogo {
            margin: 0;
            font-size: 24px;
        }
        .navbar nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
        }
        .navbar nav ul li {
            margin: 0 10px;
        }
        .navbar nav ul li a {
            color: white;
            text-decoration: none;
        }
        .navbar nav ul li a.menu:hover {
            text-decoration: underline;
        }
        h2, .thank-you h2 {
            margin: 20px 0;
        }
        .thank-you {
            margin-top: 20px;
            color: black;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="index.html"><img src="img/logo.png" id="logo"></a>
        <h1 class="tlogo">MUSEUM NUSANTARA</h1>
        <nav>
            <ul>
                <li><a href="welcome.html" class="menu">Home</a></li>
                <li><a href="koleksi.html" class="menu">Collection</a></li>
                <li><a href="pesan.php" class="menu">Ticket</a></li>
            </ul>
        </nav>
    </div>

    <div class="row">
        <h2>Form Pemesanan Tiket Museum Nusantara</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="nama">Nama:</label><br>
            <input type="text" id="nama" name="nama" required><br><br>
            
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            
            <label for="jumlah_tiket">Jumlah Tiket:</label><br>
            <input type="number" id="jumlah_tiket" name="jumlah_tiket" min="1" required><br><br>
            
            <button type="submit" name="submit">Pesan Tiket</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $nama = htmlspecialchars($_POST['nama']);
            $email = htmlspecialchars($_POST['email']);
            $jumlah_tiket = intval($_POST['jumlah_tiket']);
            $tanggal_pembelian = date('Y-m-d H:i:s');

            $data_pembeli = "Nama: $nama\nEmail: $email\nJumlah Tiket: $jumlah_tiket\nTanggal Pembelian: $tanggal_pembelian\n\n";

            $file_teks = 'data_pembeli.txt';
            $handle = fopen($file_teks, 'a');
            fwrite($handle, $data_pembeli);
            fclose($handle);

            echo "<div class='thank-you'><h2>Terima kasih!</h2>";
            echo "<p>Pemesanan tiket berhasil. Informasi Anda telah disimpan.</p></div>";
        }
        ?>
    </div>
</body>
</html>
