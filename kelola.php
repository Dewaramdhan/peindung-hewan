<!DOCTYPE html>
<?php
    include 'koneksi.php';

    $id_warga = ''; 
    $nik = ''; 
    $nama_warga = ''; 
    $jenis_kelamin = ''; 
    $alamat = ''; 

    if ( isset($_GET['ubah']) ) {
        $id_warga = $_GET['ubah'];
        
        $query = "SELECT * FROM tb_warga WHERE id_warga = '$id_warga';";
        $sql = mysqli_query($conn, $query);
        $result = mysqli_fetch_assoc($sql);

        $nik = $result['nik'];
        $nama_warga = $result['nama_warga'];
        $jenis_kelamin = $result['jenis_kelamin'];
        $alamat = $result ['alamat'];

        //var_dump($result);

        //die();
    }
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>✨ Bantuan Sosial ✨</title>
    <!-- 👇 css code file 👇 -->
    <link rel="stylesheet" href="./src/style/global.css" />
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
        <form method="POST" action="proses.php" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $id_warga; ?>" name="id_warga">    
        <div class="mb-3 row  mt-4">
            <label for="nik" class="col-sm-2 col-form-label">NIK</label>
            <div class="col-sm-10">
                <input required type="text" name="nik" class="form-control" id="nik" value="<?php echo $nik; ?>">
            </div>
        </div>
        <div class="mb-3 row  mt-2">
            <label for="nama" class="col-sm-2 col-form-label">Nama Warga</label>
            <div class="col-sm-10">
                <input required type="text" name="nama" class="form-control" id="nama" value="<?php echo $nama_warga; ?>">
            </div>
        </div>
        <div class="mb-3 row  mt-2">
            <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
                <select required id="jk" name="jkl" class="form-select">
                    <option <?php if($jenis_kelamin == 'Laki-laki'){echo "selected";}?> value="Laki-laki">Laki-laki</option>
                    <option <?php if($jenis_kelamin == 'perempuan'){echo "selected";}?> value="perempuan">perempuan</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="frumah" class="col-sm-2 col-form-label">Foto Rumah</label>
            <div class="col-sm-10">
                <input <?php if(!isset($_GET['ubah'])){echo "required";}?> class="form-control" type="file" name="foto" id="frumah" accept="image/*">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat Rumah </label>
            <div class="col-sm-10">
                <textarea  required class="form-control" name="almt" id="alamat" rows="3"> <?php echo $alamat; ?></textarea>
            </div>
        </div>
        <div class="mb-3 row mt-4">
            <div class="col-sm-10">
                <?php
                if (isset($_GET['ubah'])) {
                    ?>
                    <button type="submit" name="aksi" value="edit" class="btn btn-primary"> <i class="fa fa-floppy-o" aria-hidden="true"></i>
                        Simpan Perubahan </button>
                    <?php
                } else {
                    ?>
                    <button type="submit" name="aksi" value="add" class="btn btn-primary"> <i class="fa fa-floppy-o" aria-hidden="true"></i>
                        Tambahkan </button>
                    <?php
                }
                ?>
                <a href="index.php" type="button" class="btn btn-danger"> <i class="fa fa-reply" aria-hidden="true"></i>
                    Batal </a>
            </div>
        </div>

        </form>
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