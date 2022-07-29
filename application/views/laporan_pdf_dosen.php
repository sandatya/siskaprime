<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Dokumen</title>
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

        #mk tr:nth-child(even){background-color: #f2f2f2;}

        #mk tr:hover {background-color: #ddd;}

        #mk th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
        }
        h2{
            text-align:center;
            padding-bottom:15px;
        }
    </style>
</head>
<body>
    <h2>Data Dosen</h2>
    <table id="mk">
        <tr>
            <th>No</th>
            <th>NIDN</th>
            <th>Nama Dosen</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>No Telepon</th>
            <th>Email</th>
           
        </tr>

        <?php 
        $no = 1;
        foreach ($dosen as $dsn):
        ?>

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $dsn->nidn ?></td>
            <td><?php echo $dsn->nama ?></td>
            <td><?php echo $dsn->tgl_lahir ?></td>
            <td><?php echo $dsn->alamat ?></td>
            <td><?php echo $dsn->jenis_kelamin ?></td>
            <td><?php echo $dsn->no_telp ?></td>
            <td><?php echo $dsn->email ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

   
</body>
</html>