<?php


function mengecek_nilai($validasi, $nilai) {
    if ($validasi == true) {
        if ($nilai >= 80) {
            echo "lulus";

        } else {
            echo "tidak lulus";
        }
    } 
    else {
        echo "anda bukan mahasiswa";
    }

}

function memvalidasi($validasi) {
    if ($validasi == "mahasiswa") {
        return true;
    } else {
        return false;
    }
}


    $name = "budi";
    $status = "mahasiswi";
    $age = 20;
    $nilai_ujian = 60;
    echo "halo nama saya: " . $name . "\numur saya adalah: " . $age . "\n";

    $is_valid = memvalidasi($status);
    if ($is_valid == true) {
        echo "\nnilai ujian anda adalah: " . $nilai_ujian . "\n";
    } else {
        echo "\ntidak terdekteksi sebagai mahasiswa";
    }



    mengecek_nilai($is_valid, $nilai_ujian);





?>