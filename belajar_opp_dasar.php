<?php
class akun_bank{
    public $nama;
    private $no_rekening;
    private $pin;
    private $saldo;

    public function __construct($nama, $no_rekening, $pin, $saldo){
        $this->nama = $nama;
        $this->no_rekening = $no_rekening;
        $this->pin = $pin;
        $this->saldo = $saldo;
    }

    public function validasi_pin($pin){
        if($this->pin == $pin){
            return true;
        } else {
            return false;
        }
    }

    public function cek_saldo($pin){
        if($this->validasi_pin($pin)){
            return $this->saldo;
        } else {
            return "PIN salah";
        }
    }

    public function tarik_uang($pin, $jumlah){
        if($this->validasi_pin($pin)){
            if($jumlah <= $this->saldo){
                $this->saldo -= $jumlah;
                return "Penarikan berhasil. Saldo saat ini: " . $this->saldo;
            } else {
                return "Saldo tidak cukup";
            }
        } else {
            return "PIN salah";
        }
    }

    public function getter_no_rekening(){
        return $this->no_rekening;
    }

    public function getter_saldo(){
        return $this->saldo;
    }

}


$lanjut = true;
$akun_bank = [];

while($lanjut == true){
    echo "Selamat datang di Bank ABC\n";
    $nama = readline("masukan nama anda: ");
    $no_rekening = readline("masukan nomor rekening anda: ");
    $pin = readline("masukan PIN anda: ");
    $saldo = readline("masukan saldo awal anda: ");

    $akun = new akun_bank($nama, $no_rekening, $pin, $saldo);
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