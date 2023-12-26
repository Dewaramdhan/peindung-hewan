<?php
include 'koneksi.php';

if(isset($_POST['aksi'])){
    if($_POST['aksi'] == "add"){

        
        $nik = $_POST['nik'];
        $nama_warga = $_POST['nama'];
        $jenis_kelamin = $_POST['jkl'];
        $foto_rumah = $_FILES['foto']['name'];
        $alamat = $_POST['almt'];

        $dir = "src/assets/images/";
        $tmpFile = $_FILES["foto"]["tmp_name"];

        move_uploaded_file($tmpFile, $dir.$foto_rumah);

        //die("");

        $query = "INSERT INTO tb_warga value(null, '$nik', '$nama_warga', '$jenis_kelamin', '$foto_rumah', '$alamat' )";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location: index.php");
            //echo "Data Berhasil Ditambahkan <a href= 'index.php'>HOME</a>";
        } else{
            echo $query;
        }

        //echo $nik." | ".$nama_warga." | ".$jenis_kelamin." | ".$foto_rumah." | ".$alamat;

        //echo "<br>Tambah Data <a href= 'index.php'>HOME</a>";
    }elseif ($_POST['aksi'] == "edit"){
        echo "Edit Data <a href= 'index.php'>HOME</a>";
        $id_warga = $_POST['id_warga'];
        $nik = $_POST['nik'];
        $nama_warga = $_POST['nama'];
        $jenis_kelamin = $_POST['jkl'];
        $alamat = $_POST['almt'];
    
        $queryShow = "SELECT * FROM tb_warga WHERE id_warga = $id_warga";
        $sqlShow = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_array($sqlShow);
    
        if($_FILES['foto']['name'] == ""){
            $foto_rumah = $result['foto_rumah'];
        } else {
            $foto_rumah = $_FILES['foto']['name'];
            unlink("src/assets/images/" . $result['foto_rumah']);
            move_uploaded_file($_FILES['foto']['tmp_name'], 'src/assets/images/' . $_FILES['foto']['name']);
        }    
    
        $query = "UPDATE tb_warga SET nik='$nik', nama_warga='$nama_warga', jenis_kelamin='$jenis_kelamin', alamat='$alamat', foto_rumah='$foto_rumah' WHERE id_warga='$id_warga';";
        $sql = mysqli_query($conn, $query); 
    }
}

if(isset($_GET['hapus'])){
    $id_warga = $_GET['hapus'];

    $queryShow = "SELECT * FROM tb_warga WHERE id_warga = $id_warga";
    $sqlShow = mysqli_query($conn, $queryShow);
    $result = mysqli_fetch_array($sqlShow);
    //var_dump($result);

    unlink("src/assets/images/".$result["foto_rumah"]);

    $query = "DELETE FROM tb_warga WHERE id_warga = '$id_warga'"; 
    $sql = mysqli_query($conn, $query);

    if($sql){
        header("location: index.php");
        //echo "Data Berhasil Ditambahkan <a href= 'index.php'>HOME</a>";
    } else{
        echo $query;
    }
    //echo "Hapus Data <a href= 'index.php'>HOME</a>";
}

?>