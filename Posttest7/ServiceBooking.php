<?php
session_start();

require "./aksi/koneksi.php";

if(!isset($_SESSION['logged'])){
    echo "<script> 
        alert('Anda Belum Login Broo');
        document.location.href = 'login.php';
    </script>";
}else{
    $id_user = $_SESSION['id_user'];
    $result = mysqli_query($conn, "SELECT * FROM user_data WHERE id_user = $id_user" );
    
    if ($result) {
        $user_data = mysqli_fetch_assoc($result);
    }

    $carData = mysqli_query($conn, "SELECT DISTINCT nama_mobil FROM mobil");
    if (!$carData) {
        die("Error in SQL query: " . mysqli_error($conn));
            echo "
            <script>
            alert('Data Gagal Ditampilkan!');
            document.location.href = 'index.php';
            </script>
        ";
    }

    $dataMobil = [];

    while ($row = mysqli_fetch_assoc($carData)) {
        $dataMobil[] = $row['nama_mobil'];
    }

    if (isset($_POST["KirimPengajuan"])) {
        $id_user = $_SESSION['id_user'];
        $car_type = $_POST["car-type"];
        $car_transmition = $_POST["car-transmition"];
        $tahun_produksi = $_POST["TahunProduksi"];
        $no_rangka = $_POST["NoRangka"];
        $nama = $_POST["nama"];
        $telepon = $_POST["telepon"];
        $email = $_POST["email"];
        $layanan = "";
        
        if (isset($_POST["layanan1"]) && $_POST["layanan1"] === "Service Berkala") {
            $layanan = "Service Berkala";
        } elseif (isset($_POST["layanan2"]) && $_POST["layanan2"] === "Perbaikan Umum") {
            $layanan = "Perbaikan Umum";
        }

        $permintaan = $_POST["permintaan"];
        $tanggal_booking = $_POST["tanggal-booking"];

        $sql = "INSERT INTO booking_data (id_user, car_type, car_transmition, tahun_produksi, no_rangka, nama, telepon, email, layanan, permintaan, tanggal_booking)
        VALUES ('$id_user', '$car_type', '$car_transmition', '$tahun_produksi', '$tahun_produksi', '$nama', '$telepon', '$email', '$layanan', '$permintaan', '$tanggal_booking')";

        if (mysqli_query($conn, $sql)) {
        header("Location: UserPage.php");
        exit;
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Service Toyota</title>
    <link rel="stylesheet" href="./styles/style-ServiceBooking.css">
</head>
<body>
    <h1>Pengajuan Service Toyota</h1>

    <form action="" method="post" id="service-form">
        <fieldset class="data-mobil-fieldset">
            <legend>DATA MOBIL</legend>
            <label for="car-type">Tipe Mobil</label>
            <select name="car-type" id="car-type">
            <?php
            foreach ($dataMobil as $mobil) {
                echo '<option value="' . $mobil . '">' . $mobil . '</option>';
            }
            ?>
            </select>
            <br>
            <label for="car-transmition">Tipe Transmition</label>
            <select name="car-transmition" id="car-transmition">
                <option value="automatic">A/T</option>
                <option value="manual">M/T</option>
            </select>
            <br>
            <label for="tahunProduksi">Tahun Produksi </label>
            <input type="number" id="" name="TahunProduksi" min="1900" max="2023" placeholder="Tahun Produksi" required>
            <br>
            <label for="NoRangka">Nomor Rangka</label>
            <input type="text" id="" name="NoRangka" placeholder="No Rangka Kendaraan(VIN)" required maxlength="17">
            <br>
        </fieldset>
        <br>
        <fieldset class="data-pribadi-fieldset">
            <legend>DATA PRIBADI</legend>
            <br>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required value="<?php echo $user_data['full_name']; ?>">
            <br>
            <label for="telepon">Nomor Telepon:</label>
            <input type="tel" id="telepon" name="telepon" required value="<?php echo $user_data['no_tlp']; ?>">
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required value="<?php echo $user_data['email']; ?>">
            <br>
        </fieldset>
        <br>
        <fieldset class="layanan-service-fieldset">
            <legend>LAYANAN SERVICE</legend>
            <p>Silahkan pilih layanan Service anda</p>
            <input type="radio"name="layanan1" value="Service Berkala">
            <label>SERVICE BERKALA</label>
            <input type="radio" name="layanan2" value="Perbaikan Umum">
            <label>PERBAIKAN UMUM</label>
            <label for="permintaan">Kerusakan Mobil / Permintaan Servis. (Opsional)</label>
            <textarea name="permintaan" rows="3" cols="50" placeholder="Ketikan di sini..."></textarea>
        </fieldset>

        <fieldset class="tanggal-booking-fieldset">
            <legend>TANGGAL BOOKING</legend>
            <label for="tanggal-booking">Pilih Tanggal Booking:</label>
            <input type="date" id="tanggal-booking" name="tanggal-booking" required>
        </fieldset>

        <input type="submit" name="KirimPengajuan" value="Kirim Pengajuan">
    </form>

    <a href="UserPage.php">
        <button>Kembali ke Halaman Utama</button>
    </a>
</body>
</html>
