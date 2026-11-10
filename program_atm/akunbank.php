<?php

class akun_bank{
    public $nama;
    
    private $saldo;

    public function __construct($nama, $saldo){
        $this->nama = $nama;
        $this->saldo = $saldo;
    }

    public function cek_saldo(){
        return $this->saldo;
    }
}




?>