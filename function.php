<?php 

    // Koneksi Data Base
 $koneksi = mysqli_connect("localhost","root","","phpdasar");

 function query($isilemari){
    global $koneksi;

    $baju = mysqli_query ($koneksi,$isilemari);
    $kotakwadahbaju=[];
    while ($ambil= mysqli_fetch_assoc($baju)) {
        $kotakwadahbaju[] = $ambil;
    }
    return $kotakwadahbaju;
 }

 function tambah($data){
    global $koneksi;

    $nama=htmlspecialchars($data["nama"]);
    $nrp=htmlspecialchars($data["nrp"]);
    $email=htmlspecialchars($data["email"]);
    $jurusan=htmlspecialchars($data["jurusan"]);
   
   // aploud gambar
    $gambar= aploud();
    if(!$gambar){
      return false;
    }

    $query= "INSERT INTO mahasiswa VALUES ('','$nama','$nrp','$email','$jurusan','$gambar')";

    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
 }

 function aploud(){
   $namafile=$_FILES['gambar']['name'];
   $ukuranfile=$_FILES['gambar']['size'];
   $error=$_FILES['gambar']['error'];
   $tmptgambar= $_FILES['gambar']['tmp_name'];

   // cek apakah tdk ada gambar yg aploud
   if($error === 4){
      echo "<script>
            alert('pilih gambar terlebih dahulu');
           </script>";

           return false;
   }
   // cek apakah yg di isi adalah gambar
   $ekstensigambarvalid= ['jpg','png','jpeg'];
   $ekstensigambar = explode('.',$namafile);
   $ekstensigambar = strtolower(end($ekstensigambar));
   if (!in_array($ekstensigambar,$ekstensigambarvalid)){
      echo "<script>
            alert('yang anda masukan bukan gambar');
           </script>";

           return false;
   }

   // cek ukuran gambar
   if ($ukuranfile > 5000000) {
      echo "<script>
            alert('ukuran Gambar terlalu besar');
           </script>";

           return false;
   }

   // lolos pengecekan gambar
   // generate nama gambar baru
   $namafilebaru = uniqid();
   $namafilebaru .= '.';
   $namafilebaru .= $ekstensigambar;

   move_uploaded_file($tmptgambar,'img/' .$namafilebaru);
   return $namafilebaru;
 }

 function hapus($id){

    global $koneksi;
    mysqli_query($koneksi,"DELETE FROM mahasiswa WHERE id= $id ");
    return mysqli_affected_rows($koneksi);

 }


function ubah($data){
    global $koneksi;

    $id=$data["id"];
    $nama=htmlspecialchars($data["nama"]);
    $nrp=htmlspecialchars($data["nrp"]);
    $email=htmlspecialchars($data["email"]);
    $jurusan=htmlspecialchars($data["jurusan"]);
    $gambarlama=htmlspecialchars($data["gambarlama"]);

    // cek apakah user pilih gambar atau tidak
    if ($_FILES['gambar']['error'] === 4){
      $gambar = $gambarlama;
    } else {
      $gambar = aploud();
    }

    $query= "UPDATE mahasiswa SET 
             nama = '$nama',
             nrp = '$nrp',
              email ='$email',
              jurusan = '$jurusan',
              gambar = '$gambar'
               WHERE id = $id
              ";

    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}

function cari($keyword){

   $query = "SELECT * FROM mahasiswa 
             WHERE 
             nama LIKE '%$keyword%' OR 
             nrp LIKE '%$keyword%' OR 
             email LIKE '%$keyword%' OR 
             jurusan LIKE '%$keyword%' 
              ";

   return query($query);
}


function register($data){
    global $koneksi;

    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($koneksi,$data["password"]);
    $password2 = mysqli_real_escape_string($koneksi,$data["password2"]);

    // cek user name ada yg sama atau tidak

    $result = mysqli_query($koneksi,"SELECT username FROM user WHERE username = '$username' ");
             if(mysqli_fetch_assoc($result)){
                echo "<script>
                       alert('username sudah digunakan');
                      </script>";

                      return false;
             }

// cek Konfirmasi Password
    if($password !== $password2){

        echo "<script>
              alert('Password tdk sesuai dengan konfirmasi password');
              </script>";

              return false;
    }

    // enskripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke data base
    mysqli_query($koneksi,"INSERT INTO user VALUES('','$username','$password')");

    return mysqli_affected_rows($koneksi);
}





?>