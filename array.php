<?php



class akun_bank {
    public function info_akun() {
        return "Ini adalah akun bank umum.";
    }
}

// Akun VIP punya format info sendiri
class akun_vip extends akun_bank {
    // Kita menimpa (override) method dengan nama yang sama persis
    public function info_akun() {
        return "Ini adalah AKUN VIP EXCLUSIVE dengan bonus khusus!";
    }
}

// Akun Pelajar punya format info sendiri
class akun_pelajar extends akun_bank {
    public function info_akun() {
        return "Ini adalah Akun Pelajar bebas biaya admin.";
    }
}


$akun1 = new akun_bank();
$akun2 = new akun_vip();
$akun3 = new akun_pelajar();

echo $akun1->info_akun() . "\n"; // Ini adalah akun bank umum.
echo $akun2->info_akun() . "\n"; // Ini adalah AKUN VIP EXCLUSIVE dengan bonus khusus!
echo $akun3->info_akun() . "\n"; // Ini adalah Akun Pelajar bebas biaya admin.
?>

