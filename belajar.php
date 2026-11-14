
<?php

class Mahasiswa {
    public $nama;
    public $nim;
    public $jurusan;

    public function __construct($nama, $nim, $jurusan) {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->jurusan = $jurusan;
    }
}

$daftarMahasiswa = [];
$kondisiyes = true;

while ($kondisiyes == true) {
    $nama = readline("Masukkan nama: ");
    $nim = readline("Masukkan NIM: ");
    $jurusan = readline("Masukkan jurusan: ");

    $mahasiswa = new Mahasiswa($nama, $nim, $jurusan);

    $daftarMahasiswa[] = $mahasiswa;

    $jawaban = readline("Mau input lagi? yes/no: ");

    while (true){
    if ($jawaban == "no") {
        break;
    }
    elseif ($jawaban == "yes") {
        continue;
    }
    else {
        echo "Jawaban tidak dikenal.\n";
        $kondisiyes == false;

    }
    }
}

echo "\n===== DAFTAR MAHASISWA =====\n";

foreach ($daftarMahasiswa as $maha) {
    echo "-------------------------\n";
    echo "Nama: " . $maha->nama . "\n";
    echo "NIM: " . $maha->nim . "\n";
    echo "Jurusan: " . $maha->jurusan . "\n";
}

?>
