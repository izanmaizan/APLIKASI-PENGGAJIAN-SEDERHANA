<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APLIKASI PENGGAJIAN</title>
    <style>
    body,
    th,
    td {
        font-family: 'Courier New', Courier, monospace;
    }
    </style>
</head>

<body>
    <p>
        <?php
            include ("config.php");
            $nip = $_POST['nip'];
            $nama = $_POST['nama'];
            $blnthn = $_POST['blnthn'];
            $status = $_POST['status'];
            $jabatan = $_POST['jabatan'];

        // Query untuk mengecek apakah data dengan NIP dan blnthn yang sama sudah ada
        $sql_check = "SELECT COUNT(*) as total FROM db_gaji WHERE nip = '$nip' AND blnthn = '$blnthn'";
        $result_check = mysqli_query($koneksi, $sql_check);
        $row_check = mysqli_fetch_assoc($result_check);
        $total = $row_check['total'];

        
// Validasi apakah data dengan NIP dan blnthn yang sama sudah ada
if ($total > 0) {
    echo "<center>
        <h1>Maaf NIP $nip dan $blnthn telah digunakan oleh user lain.</h1>
        Anda akan kembali ke halaman utama dalam 10 detik.
    </center>";
    header('refresh:10;url=index.php');
} else {
    // Kalkulasi gaji_pokok berdasarkan jabatan
    if ($jabatan == "Direktur") {
        $gaji_pokok = 4000000;
    } elseif ($jabatan == "Sekretaris") {
        $gaji_pokok = 3000000;
    } elseif ($jabatan == "Manager") {
        $gaji_pokok = 350000;
    } elseif ($jabatan == "Keuangan") {
        $gaji_pokok = 320000;
    }

    // Menghitung Tunjangan
    if ($status == "Menikah") {
        $tunjangan = 0.1 * $gaji_pokok;
    } else {
        $tunjangan = 0.05 * $gaji_pokok;
    }

    // Meghitung Gaji Bersih
    $gaji_bersih = $gaji_pokok + $tunjangan;

    // Menyimpan data ke database
    $sql = "INSERT INTO db_gaji (nip, nama, blnthn, status, jabatan, gaji_pokok, tunjangan, gaji_bersih)
            VALUES ('$nip', '$nama', '$blnthn', '$status', '$jabatan', '$gaji_pokok', '$tunjangan', '$gaji_bersih')";

    $hasil = mysqli_query($koneksi, $sql);

    if ($hasil) {
        $pesan = "Data berhasil disimpan.";
    } else {
        echo "Data gagal disimpan.";
    }
}

// Menutup koneksi database
mysqli_close($koneksi);
?>
        ?>
    </p>

    <div align="center">
        <table width="395" border="1">
            <tr>
                <td bgcolor="#00ffff">
                    <table width="395" border="0">
                        <tr>
                            <td colspan="2">
                                <div align="center">
                                    <strong>DAFTAR GAJI PEGAWAI</strong>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td height="10" colspan="2">
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td width="156">&nbsp;NIP</td>
                            <td width="229">:
                                <?php echo "$nip"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;Nama</td>
                            <td>: <?php echo "$nama" ?></td>
                        </tr>
                        <tr>
                            <td>&nbsp;Bln Thn Gaji</td>
                            <td>: <?php echo "$blnthn" ?></td>
                        </tr>
                        <tr>
                            <td>&nbsp;Status</td>
                            <td>: <?php echo "$status" ?></td>
                        </tr>
                        <tr>
                            <td>&nbsp;Jabatan</td>
                            <td>: <?php echo "$jabatan" ?></td>
                        </tr>
                        <tr>
                            <td>&nbsp;GajiPokok</td>
                            <td>: <?php echo "Rp. " . number_format($gaji_pokok); ?></td>
                        </tr>
                        <tr>
                            <td>&nbsp;Tunjangan Gaji</td>
                            <td>: <?php echo "Rp. " . number_format($tunjangan); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">_________________________________________+</td>
                        </tr>
                        <tr>
                            <td>&nbsp;Gaji Bersih</td>
                            <td>: <?php echo "Rp. " . number_format($gaji_bersih); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;<b><?php echo "$pesan" ?></b></td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="javascript:history.back()">Kembali</a></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    ?>
</body>

</html>