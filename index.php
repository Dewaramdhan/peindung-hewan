<?php
include 'koneksi.php';
$query = "SELECT * FROM tb_warga;";
$sql = mysqli_query($conn, $query);
$no = 0;

?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>✨ Bantuan Sosial ✨</title>
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                Data Warga Penerima Bantuan
            </a>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-3">Data Warga</h1>
        <figure>
            <blockquote class="blockquote">
                <p>DATA WARGA.</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                Penerima Bantuan <cite title="Source Title">Pelindung Hewan</cite>
            </figcaption>
        </figure>
        <a href="kelola.php" type="button" class="btn btn-primary mb-3"> <i class="fa fa-plus"></i> Tambah Data </a>
        <div class="table-responsive">
            <table class="table align-middle table-bordered table-hover">
                <thead>
                    <tr>
                        <th>
                            <center>No.</center>
                        </th>
                        <th>NIK</th>
                        <th>Nama Warga</th>
                        <th>Jenis Kelamin</th>
                        <th>Foto Rumah</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($result = mysqli_fetch_assoc($sql)) {
                    ?>
                    <tr>
                        <td>
                            <center> <?php echo ++$no;?>.</center>
                        </td>
                        <td><?php echo $result['nik'];?></td>
                        <td><?php echo $result['nama_warga'];?></td>
                        <td><?php echo $result['jenis_kelamin'];?></td>
                        <td><img src="src/assets/images/<?php echo $result['foto_rumah'];?>" style="width: 150px;"></td>
                        <td><?php echo $result['alamat'];?></td>
                        <td>
                            <a href="kelola.php?ubah=<?php echo $result['id_warga'];?>" type="button" class="btn btn-success btn-sm"> Ubah <i
                                    class="fa fa-pencil"></i></a>
                            <a href="proses.php?hapus=<?php echo $result['id_warga'];?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin ingin menghapus data tersebut ?')"> Hapus <i
                                    class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                    
                </tbody>
            </table>
        </div>

    </div>

    <!-- 👇 javascript code file 👇 -->
    <script src="./src/js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>