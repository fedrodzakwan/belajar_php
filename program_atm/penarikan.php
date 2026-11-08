<?php

require_once 'pembuatan atm.php/tarik_uang';

$akun_bank[0] = $akun_bank[0]->tarik_uang(1234, 500000);

foreach ($akun_bank[0] as $akun) {
    echo "Nama: " . $akun->nama . "\n";
    echo "No Rekening: " . $akun->getter_no_rekening() . "\n";
    echo "Saldo: " . $akun->getter_saldo() . "\n";
    echo "Sisa Limit Tarik: " . $akun->tarik_uang(1234, 0) . "\n"; // Menampilkan sisa limit tarik
    echo "\n";
}



?>