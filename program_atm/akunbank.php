<?php

require_once 'class_akun_bank.php';

$lanjut = true;
$akun_bank = [];

while($lanjut == true){
    echo "Selamat datang di Bank ABC\n";
    $nama = readline("masukan nama anda: ");
    $no_rekening = readline("masukan nomor rekening anda: ");
    $pin = readline("masukan PIN anda: ");
    $saldo = readline("masukan saldo awal anda: ");

    echo "mau membuat akun biasa atau akun VIP?\n";
    $jenis_akun = readline("masukan jenis akun (biasa/vip): ");

    if($jenis_akun == "biasa"){
        $akun = new akun_bank($nama, $no_rekening, $pin, $saldo);
    } else {
        $akun = new akun_vip($nama, $no_rekening, $pin, $saldo);
    }

    $akun_bank[] = $akun;

    $bikin_akun = readline("apakah anda ingin membuat akun lagi? (ya/tidak): ");
    if($bikin_akun == "tidak"){
        $lanjut = false;
    }
}

echo "Akun berhasil dibuat!\n";
echo "Daftar akun:\n";





foreach($akun_bank as $akun){
    echo "Nama: " . $akun->nama . "\n";
    echo "Nomor Rekening: " . $akun->getter_no_rekening() . "\n";
    echo "Saldo: " . $akun->getter_saldo() . "\n";
    echo "-------------------------\n";
}


?>