/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */


import java.util.ArrayList;
import java.util.Locale;
import java.util.Scanner;

/**
 * Program Console/CLI Sistem Seleksi Laboratorium Komputer Universitas XYZ.
 * Project: UTS_PBO_25041450123
 */
public class UTS_PBO_25041450123 {

    // Scanner global untuk membaca input dari keyboard
    static Scanner input = new Scanner(System.in);

    /** 
     * KOMPUTER MEMBACA INI: 
     * Method untuk membaca nilai (0 - 100). 
     * Menggunakan try-catch (Exception Handling) agar program tidak crash jika user mengetik huruf/simbol.
     */
    static double bacaNilai(String namaTes) {
        while (true) {
            try {
                System.out.print("Nilai " + namaTes + " (0-100) : ");
                double nilai = Double.parseDouble(input.nextLine().trim());
                if (nilai < 0 || nilai > 100) {
                    throw new IllegalArgumentException("Nilai harus antara 0 - 100!");
                }
                return nilai; // Jika valid, kembalikan nilai
            } catch (IllegalArgumentException e) {
                System.out.println("Input tidak valid, nilai harus angka 0 - 100! Silakan ulangi.");
            }
        }
    }

    /** 
     * KOMPUTER MEMBACA INI: 
     * Method untuk memilih posisi lamaran kerja (1 = Aslab, 2 = Admin Lab).
     */
    static int bacaPosisi() {
        while (true) {
            System.out.println("Posisi yang dilamar:");
            System.out.println("  1. Asisten Laboratorium (Aslab)");
            System.out.println("  2. Admin Laboratorium (Admin Lab)");
            System.out.print("Pilih posisi (1/2) : ");
            String pilihan = input.nextLine().trim();
            if (pilihan.equals("1") || pilihan.equals("2")) {
                return Integer.parseInt(pilihan);
            }
            System.out.println("Pilihan tidak valid! Silakan ulangi.\n");
        }
    }

    /** 
     * KOMPUTER MEMBACA INI: 
     * Titik awal utama (main method) tempat program mulai dijalankan.
     */
    public static void main(String[] args) {
        // Menyiapkan list untuk menampung banyak data peserta
        ArrayList<Peserta> daftarPeserta = new ArrayList<>();
        String lagi;

        System.out.println("==========================================");
        System.out.println("  SISTEM SELEKSI LABORATORIUM KOMPUTER");
        System.out.println("            UNIVERSITAS XYZ");
        System.out.println("==========================================");

        // Perulangan untuk input data peserta (bisa lebih dari satu orang)
        do {
            System.out.println("\n--- Data Peserta ---");
            System.out.print("NIM  : ");
            String nim = input.nextLine().trim();
            System.out.print("Nama : ");
            String nama = input.nextLine().trim();

            int posisi = bacaPosisi();
            Peserta peserta;

            // KONSEP POLIMORFISME: 
            // Variabel bertipe 'Peserta' (parent) menampung objek 'Aslab' atau 'AdminLab' (child)
            if (posisi == 1) {
                peserta = new Aslab(nim, nama);
            } else {
                peserta = new AdminLab(nim, nama);
            }

            System.out.println("\n--- Input Nilai (4 Tes) ---");
            peserta.setNilaiTulis(bacaNilai("Tes Tulis"));
            peserta.setNilaiCoding(bacaNilai("Tes Praktik Coding"));
            peserta.setNilaiWawancara(bacaNilai("Tes Wawancara"));

            // KONSEP METHOD OVERRIDING:
            // Komputer secara otomatis tahu tes spesifik apa yang dipanggil berdasarkan objek aslinya
            peserta.setNilaiSpesifik(bacaNilai(peserta.getNamaTesSpesifik()));

            // Masukkan objek peserta ke dalam ArrayList
            daftarPeserta.add(peserta);

            System.out.print("\nTambah peserta lagi? (y/n) : ");
            lagi = input.nextLine().trim();
        } while (lagi.equalsIgnoreCase("y")); // Berhenti jika user mengetik selain 'y'

        System.out.println("\n==========================================");
        System.out.println("            HASIL SELEKSI");
        System.out.println("==========================================");
        
        // Perulangan untuk menampilkan hasil seleksi setiap peserta yang sudah diinput
        for (Peserta p : daftarPeserta) {
            p.tampilkanHasil();
            System.out.println("------------------------------------------");
        }

        input.close(); // Menutup scanner
    }
}

/**
 * Class induk (superclass) untuk semua peserta seleksi.
 * Menerapkan ENKAPSULASI: atribut dibuat private dan hanya bisa diakses via getter/setter.
 */
class Peserta {

    // ===== Atribut (private / disembunyikan) =====
    private String nim;
    private String nama;
    private double nilaiTulis;
    private double nilaiCoding;
    private double nilaiWawancara;

    // ===== Constructor (untuk inisialisasi data awal saat objek dibuat) =====
    public Peserta(String nim, String nama) {
        this.nim = nim;
        this.nama = nama;
    }

    // ===== Getter (untuk mengambil nilai atribut private) =====
    public String getNim() {
        return nim;
    }

    public String getNama() {
        return nama;
    }

    public double getNilaiTulis() {
        return nilaiTulis;
    }

    public double getNilaiCoding() {
        return nilaiCoding;
    }

    public double getNilaiWawancara() {
        return nilaiWawancara;
    }

    // ===== Setter (untuk mengubah nilai atribut dengan validasi) =====
    public void setNilaiTulis(double nilaiTulis) {
        this.nilaiTulis = validasi(nilaiTulis);
    }

    public void setNilaiCoding(double nilaiCoding) {
        this.nilaiCoding = validasi(nilaiCoding);
    }

    public void setNilaiWawancara(double nilaiWawancara) {
        this.nilaiWawancara = validasi(nilaiWawancara);
    }

    /**
     * Validasi nilai wajib berada di rentang 0 sampai 100.
     */
    protected double validasi(double nilai) {
        if (nilai < 0 || nilai > 100) {
            throw new IllegalArgumentException("Nilai harus antara 0 - 100!");
        }
        return nilai;
    }

    // ===== Method dasar untuk di-override oleh subclass =====
    public String getPosisi() {
        return "-";
    }

    public String getNamaTesSpesifik() {
        return "Tes Spesifik";
    }

    public double getNilaiSpesifik() {
        return 0;
    }

    public void setNilaiSpesifik(double nilai) {
        // Diisi oleh subclass (Aslab / AdminLab)
    }

    // ===== Logika Perhitungan Nilai Akhir =====
    public double hitungRataRata() {
        return (nilaiTulis + nilaiCoding + nilaiWawancara + getNilaiSpesifik()) / 4;
    }

    /** 
     * Aturan Kelulusan: 
     * Lolos jika rata-rata > 85. Jika 85 ke bawah, dinyatakan GAGAL.
     */
    public String getStatus() {
        if (hitungRataRata() > 85) {
            return "LOLOS";
        } else {
            return "GAGAL";
        }
    }

    // ===== Method untuk mencetak format hasil akhir ke layar =====
    public void tampilkanHasil() {
        System.out.println();
        System.out.printf("%-12s: %s%n", "NIM", nim);
        System.out.printf("%-12s: %s%n", "Nama", nama);
        System.out.printf("%-12s: %s%n", "Posisi", getPosisi());
        System.out.printf(Locale.US, "%-12s: %.2f%n", "Nilai Akhir", hitungRataRata());
        System.out.printf("%-12s: %s%n", "Status", getStatus());

        if (getStatus().equals("LOLOS")) {
            System.out.println("Selamat " + nama + ", Anda LOLOS seleksi " + getPosisi() + ".");
        } else {
            System.out.println("Maaf " + nama + ", Anda GAGAL seleksi " + getPosisi() + ".");
        }
    }
}

/**
 * Class anak (subclass) untuk pelamar Asisten Laboratorium (Aslab).
 * Mewarisi sifat Peserta (Inheritance) dan meng-override method terkait.
 */
class Aslab extends Peserta {

    private double nilaiMicroteaching;

    public Aslab(String nim, String nama) {
        super(nim, nama); // Memanggil constructor dari class induk (Peserta)
    }

    public double getNilaiMicroteaching() {
        return nilaiMicroteaching;
    }

    public void setNilaiMicroteaching(double nilaiMicroteaching) {
        this.nilaiMicroteaching = validasi(nilaiMicroteaching);
    }

    @Override
    public String getPosisi() {
        return "Asisten Laboratorium";
    }

    @Override
    public String getNamaTesSpesifik() {
        return "Tes Microteaching";
    }

    @Override
    public double getNilaiSpesifik() {
        return nilaiMicroteaching;
    }

    @Override
    public void setNilaiSpesifik(double nilai) {
        setNilaiMicroteaching(nilai);
    }
}

/**
 * Class anak (subclass) untuk pelamar Admin Laboratorium (Admin Lab).
 * Mewarisi sifat Peserta (Inheritance) dan meng-override method terkait.
 */
class AdminLab extends Peserta {

    private double nilaiPraktikJaringan;

    public AdminLab(String nim, String nama) {
        super(nim, nama);
    }

    public double getNilaiPraktikJaringan() {
        return nilaiPraktikJaringan;
    }

    public void setNilaiPraktikJaringan(double nilaiPraktikJaringan) {
        this.nilaiPraktikJaringan = validasi(nilaiPraktikJaringan);
    }

    @Override
    public String getPosisi() {
        return "Admin Laboratorium";
    }

    @Override
    public String getNamaTesSpesifik() {
        return "Tes Praktik Jaringan";
    }

    @Override
    public double getNilaiSpesifik() {
        return nilaiPraktikJaringan;
    }

    @Override
    public void setNilaiSpesifik(double nilai) {
        setNilaiPraktikJaringan(nilai);
    }
}