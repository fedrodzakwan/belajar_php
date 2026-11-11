<?php
class akun_bank{
    public $nama;
    private $no_rekening;
    private $pin;
    protected $saldo;
    private $limit_tarik = 1000000;

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
                if($jumlah > $this->limit_tarik){
                    return exit("Penarikan gagal. Jumlah melebihi limit tarik.");
                }
                else {
                    $this->saldo -= $jumlah;
                    $this->limit_tarik -= $jumlah;
                    return $this->limit_tarik;
                    echo "Penarikan berhasil. \nSaldo saat ini: " . $this->saldo . "\nSisa limit tarik: " . $this->limit_tarik;
                }
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

class akun_vip extends akun_bank{

    private $limit_tarik = 10000000;
    public $bonus_cashback = 0.01;
    private $hasil_cashback;

    public function __construct($nama, $no_rekening, $pin, $saldo){
        parent::__construct($nama, $no_rekening, $pin, $saldo);
    }

    public function tarik_uang($pin, $jumlah ){
        if($this->validasi_pin($pin)){
            if($jumlah <= $this->getter_saldo()){
                if($jumlah <= $this->limit_tarik){
                    echo "bonus cashback vip 1% dari jumlah penarikan: " . ($jumlah * $this->bonus_cashback);
                    $this->hasil_cashback = $jumlah * $this->bonus_cashback;
                    return parent::tarik_uang($pin, $jumlah);
                    echo "Penarikan berhasil. \nSaldo saat ini: " . $this->getter_saldo() . "\nSisa limit tarik: " . $this->limit_tarik . "\nBonus cashback: " . $this->hasil_cashback;
                } else {
                    return "Penarikan gagal. Jumlah melebihi limit tarik.";
                }
            } else {
                return "Penarikan gagal. Jumlah melebihi saldo.";
            }
        } else {
            return "PIN salah";
        }
    }
}

