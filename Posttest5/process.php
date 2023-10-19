<?php 
require "koneksi.php";

if(isset($_POST["tambah"])){
    // Ambil data dari formulir
    $full_name = $_POST["full-name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone-number"];
    $car_type = $_POST["car-type"];
    $domisili = $_POST["domisili"];
    $cabang = $_POST["cabang"];
    $metode_kredit = $_POST["metode-kredit"];

    // Simpan data ke database
    $result = mysqli_query($conn,"insert into form_kredit (id, full_name, email, phone_number, car_type, kota, cabang, total_dp) 
    VALUES ('','$full_name', '$email', '$phone_number', '$car_type', '$domisili', '$cabang', '$metode_kredit')"); 
}

if (isset($_POST["update"])) {
    // Ambil data yang diedit dari formulir
    $id = $_POST["id"];
    $full_name = $_POST["full-name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone-number"];
    $car_type = $_POST["car-type"];
    $domisili = $_POST["domisili"];
    $cabang = $_POST["cabang"];
    $metode_kredit = $_POST["metode-kredit"];

    // Update data di database
    $query = "UPDATE form_kredit SET full_name = '$full_name', email = '$email', phone_number = '$phone_number', car_type = '$car_type', kota = '$domisili', cabang = '$cabang', total_dp = '$metode_kredit' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "
        <script>
        alert('Data berhasil diperbarui!');
        </script>
    ";
} else {
        echo "
        <script>
        alert('Data gagal diperbarui!');
        document.location.href = 'formkredit.php';
        </script>
    ";
    }
}

if(isset($_GET["email"])) {
    $email = $_GET["email"];
}

$query = "SELECT * FROM form_kredit where email = '$email'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error in SQL query: " . mysqli_error($conn));
          echo "
          <script>
          alert('Data Gagal Ditambahkan!');
          document.location.href = 'formkredit.php';
          </script>
      ";
}

$data_kredit = [];

while ($row = mysqli_fetch_assoc($result)) {
    $data_kredit[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Formulir</title>
    <link rel="stylesheet" href="./styles/styles-process.css"/>
</head>
<body>
    <div class="background"></div>
    <div class="popup">
        <h2>Data Pengajuan Kredit</h2>
        <table>
            <?php
            foreach ($data_kredit as $kredit) {
                echo "<tr>";
                echo "<td><strong>ID</strong></td>";
                echo "<td>" . $kredit['id'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><strong>Nama</strong></td>";
                echo "<td>" . $kredit['full_name'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><strong>Alamat</strong></td>";
                echo "<td>" . $kredit['email'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><strong>Nomor Telepon</strong></td>";
                echo "<td>" . $kredit['phone_number'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><strong>Model Mobil</strong></td>";
                echo "<td>" . $kredit['car_type'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><strong>Kota/Kabupaten</strong></td>";
                echo "<td>" . $kredit['kota'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><strong>Cabang</strong></td>";
                echo "<td>" . $kredit['cabang'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><strong>Total DP</strong></td>";
                echo "<td>" . $kredit['total_dp'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td class='aksi' colspan='2'>";
                echo "<button class='left' name='cta-hapus'><a class='btn-table' href='delete.php?id=" .$kredit['id'] ."'>HAPUS</a></button>";
                echo "<button class='right' name='cta-edit'><a class='btn-table' href='edit.php?id=" . $kredit['id'] . "'>EDIT</a></button>";
                echo "</td>";
                echo "</tr>";}
            ?>
        </table>

        <div class="container">
            <p>Terima kasih telah melakukan pengajuan.<br>
            Sales akan menghubungi anda dengan segera</p>
            <button name="cta-save" onclick="kembaliKeIndex();">Kembali ke Beranda</button>
        </div>
    </div>

    <script>
    function kembaliKeIndex() {
        window.location.href = 'index.html';
    }
    </script>
</body>
</html>
