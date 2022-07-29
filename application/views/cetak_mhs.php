<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Dokumen</title>
    <style>
        #mk {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        #mk td, #mk th {
        border: 1px solid #ddd;
        padding: 8px;
        }

       

        #mk th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
       
        }

        h2{
            text-align:center;
            padding-bottom:15px;
        }
    </style>
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <table id="mk">
        <tr>
            <th>No</th>
            <th>Nama Mahasiswa</th>
            <th>NIM</th>
            <th>Tanggal Lahir</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>No Telepon</th>
        </tr>

        <?php 
        $no = 1;
        foreach ($mahasiswa as $mhs):
        ?>

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $mhs->nama ?></td>
            <td><?php echo $mhs->nim ?></td>
            <td><?php echo $mhs->tgl_lahir ?></td>
            <td><?php echo $mhs->jurusan ?></td>
            <td><?php echo $mhs->alamat ?></td>
            <td><?php echo $mhs->email ?></td>
            <td><?php echo $mhs->no_telp ?></td>

        </tr>
        <?php endforeach; ?>
    </table>

    <script type="text/javascript">
        window.cetak();
    </script>
</body>
</html>