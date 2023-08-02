<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APLIKASI PENGGAJIAN SEDERHANA</title>
    <style>
    input {
        border-radius: 5px;
    }

    select {
        /* color: #ffffff; */
        padding: 4px 8px;
        border: 1px solid transparent;
        border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
        cursor: pointer;
    }

    .button {
        padding: 6px 17px;
        margin: 0px 7px;
    }
    </style>
</head>

<body>
    <div align="center">
        <form action="proses.php" method="post" id="form1" name="form1">
            <table width="395" border="1">
                <tr>
                    <td bgcolor="#CCCCCC">
                        <table width="550" height="350" border="0">
                            <tr>
                                <td colspan="2">
                                    <div align="center">
                                        <strong>ENTRY DATA PENGGAJIAN</strong>
                                    </div>
                                </td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>NIP</td>
                                <td>: <input type="text" name="nip">
                                    * Maksimal 6 karakter</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>: <input type="text" name="nama">
                                    * Maksimal 40 karakter</td>
                            </tr>
                            <tr>
                                <td>Bulan Tahun Gaji</td>
                                <td>: <input type="text" name="blnthn">
                                    * Maksimal 6 karakter</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>: <input type="radio" name="status" value="Menikah" checked="checked">Menikah
                                    <input type="radio" name="status" id="" value="Belum Menikah">Belum Menikah
                                </td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td>:
                                    <select name="jabatan" id="">
                                        <option value="Direktur">Direktur</option>
                                        <option value="Sekretaris">Sekretaris</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Keuangan">Keuangan</option>
                                    </select>
                                </td>

                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;
                                    <input class="button" type="submit" value="Submit" name="input">
                                    <input class="button" type="reset" value="Reset" name="input">
                                </td>
                            </tr>
                </tr>
            </table>
            </td>
            </tr>
            </table>
        </form>
    </div>
</body>

</html>