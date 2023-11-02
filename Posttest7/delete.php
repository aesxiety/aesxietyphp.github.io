<?php
require "./aksi/koneksi.php";

$id = $_GET["id"];

$result_select =  mysqli_query($conn, "SELECT * from form_kredit WHERE id = '$id'");
$kredit = mysqli_fetch_assoc($result_select);
$email = $kredit["email"];

$result = mysqli_query($conn, "DELETE FROM form_kredit WHERE id = '$id'");


if ($result) {
    echo "
    <script>
    alert('Data Berhasil Dihapus!');
    document.location.href = 'process.php?email=$email';
    </script>
    ";
} else {
    echo "
    <script>
    alert('Data Gagal Dihapus!');
    document.location.href = 'process.php?email=$email';
</script>
";
}
