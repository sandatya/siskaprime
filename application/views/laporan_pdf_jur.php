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
    <h2>Data Jurusan</h2>
    <table id="mk">
        <tr>
            <th>No</th>
            <th>Kode Jurusan</th>
            <th>Nama Jurusan</th>
        </tr>

        <?php 
        $no = 1;
        foreach ($jurusan as $jur):
        ?>

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $jur->kd_jurusan ?></td>
            <td><?php echo $jur->nama_jurusan ?></td>
            
        </tr>
        <?php endforeach; ?>
    </table>

   
</body>
</html>