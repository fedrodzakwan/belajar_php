<?php


function mengecek_nilai($nilai) {
    if ($nilai >= 75) {
        echo "Lulus";
    } else {
        echo "Tidak Lulus";
    }
}

    $name = "budi";
    $age = 20;
    echo "halo nama saya: " . $name . "\numur saya adalah: " . $age . "\n";

    $nilai_ujian = 80;
    echo "nilai ujian saya adalah: " . $nilai_ujian . "\n";
    mengecek_nilai($nilai_ujian);

?>