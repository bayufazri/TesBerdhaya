<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test PT Berdhaya Gemilang</title>
</head>

<body>
    <h3>Masukan Data dan Nilai Siswa <b style="color:red;">(minimal 5)</b></h3>
    <!-- Membuat form inputan untuk memasukan jumlah data yang akan diinput -->
    <form action="" method="POST">
        <input type="number" name="jumlah" placeholder="Masukan Jumlah Data">
        <input type="submit" name="tambah" value="Tambah">
    </form>

    <!-- Membuat validasi perulangan jika inputan lebih sama dengan 5 -->
    <?php
    error_reporting(0);
        if($_POST['jumlah'] >= 5)
        {
    ?>
    <form action="" method="POST">
        <?php
        $jumlah = $_POST['jumlah'];
        for($i=1;$i<=$jumlah;$i++)
        {
    ?>

    <!-- Inputan perulangan -->
    <table>
        <tr>
            <td colspan="3">Data ke <?php echo $i;?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama[]" placeholder="Masukan Nama" required></td>
        </tr>
        <tr>
            <td>Nilai</td>
            <td>:</td>
            <td><input type="number" name="nilai[]" placeholder="Masukan Nilai" required></td>
        </tr>
    </table>

    <?php } ?>
        <input type="submit" name="submit" value="Submit">
    <?php } 

    // validasi jika jumlah data yang dimasukan kurang dari 5
    elseif ($_POST['jumlah'] < 5 && $_POST['jumlah'] >= 1)  {
        echo "<p style='color:red;'>Mohon Maaf Data Yang Dimasukan Minimal 5</p>";
    }
        ?>

    <!-- Memunculkan hasil inputan -->
    <table border="1" style="margin-top:10px">
        <tr>
            <th>Nama Siswa</th>
            <th>Nilai</th>
            <th>Predikat</th>
        </tr>
        <tr>
            <?php
            // Deklarasi variabel berdasarkan data yang di input
            $nilai = $_POST['nilai'];
            $nama = $_POST['nama'];

            // Validasi memunculkan predikat nilai jika button submit di klik
            foreach (array_combine($nama,$nilai) as $nama => $nilai ){
                if($_POST['submit']){
                    if ($nilai >= 80 && $nilai <= 100 )
                    {
                        echo '<tr>
                                <td>'.$nama.'</td>
                                <td>'.$nilai.'</td>
                                <td>'.'A'.'</td>
                            </tr>';
                    }elseif ($nilai >= 60 && $nilai <= 79){
                        echo '<tr>
                                <td>'.$nama.'</td>
                                <td>'.$nilai.'</td>
                                <td>'.'B'.'</td>
                            </tr>';
                    }elseif ($nilai >= 40 && $nilai <= 59){
                        echo '<tr>
                                <td>'.$nama.'</td>
                                <td>'.$nilai.'</td>
                                <td>'.'C'.'</td>
                            </tr>';
                    }elseif ($nilai >= 0 && $nilai <= 39){
                        echo '<tr>
                                <td>'.$nama.'</td>
                                <td>'.$nilai.'</td>
                                <td>'.'D'.'</td>
                            </tr>';
                    }else{
                        echo '<tr>
                                <td>'.$nama.'</td>
                                <td colspan="2">'.'Nilai Tidak Valid'.'</td>
                            </tr>';
                    }
                }
            }
            ?>
        </tr>
    </table>
    </form>
</body>

</html>
