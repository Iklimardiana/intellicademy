<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $module = [
            ['name' => 'Apa itu AI', 
            'body' => 'Artificial Intelligence (AI) adalah cabang ilmu komputer yang berfokus pada pengembangan sistem yang mampu meniru dan mengeksekusi tugas yang membutuhkan kecerdasan manusia. AI mencakup berbagai teknik seperti machine learning, deep learning, dan computer vision untuk memungkinkan komputer mempelajari pola, membuat prediksi, dan mengambil keputusan secara otonom. Tujuan utama AI adalah meningkatkan kinerja komputer dalam hal pemahaman bahasa, pengenalan objek, pengambilan keputusan, dan penyelesaian masalah kompleks. Dalam praktiknya, AI telah diterapkan dalam berbagai bidang seperti pengolahan bahasa alami, kendaraan otonom, pengenalan suara, analisis data, dan banyak lagi.
            Selain itu, AI juga mencakup bidang seperti robotika, pengenalan wajah, pemrosesan citra, dan pengolahan data besar. Teknologi AI telah menghasilkan perkembangan signifikan dalam pemecahan masalah yang sulit dan pengambilan keputusan yang kompleks. Metode seperti reinforcement learning memungkinkan mesin untuk belajar melalui pengalaman dan meningkatkan kinerja mereka seiring waktu. Meskipun AI masih berkembang, dampaknya sudah terlihat dalam berbagai aspek kehidupan kita, seperti asisten virtual, sistem rekomendasi, dan peningkatan efisiensi dalam industri dan bisnis.', 
                'idCourse' => 1, 
                'sequence' => 1
            ],

            ['name' => 'Manfaat AI', 
            'body' => 'Kehadiran Artificial Intelligence (AI) memiliki berbagai manfaat yang signifikan:
                1. Peningkatan efisiensi: AI dapat mengotomatisasi tugas-tugas yang berulang dan memakan waktu, meningkatkan efisiensi operasional di berbagai sektor seperti manufaktur, logistik, dan layanan pelanggan.
                2. Peningkatan akurasi: Dengan kemampuan pembelajaran mesin, AI dapat menganalisis data secara mendalam dan menghasilkan prediksi yang akurat, membantu dalam pengambilan keputusan yang lebih cerdas dan mengurangi kesalahan manusia.
                3. Kemajuan dalam bidang kesehatan: AI digunakan dalam diagnosis medis, pengobatan personalisasi, dan penelitian biomedis, memungkinkan deteksi dini penyakit, pengobatan yang lebih efektif, dan pengembangan obat baru.
                4. Kemudahan dalam interaksi manusia-mesin: Asisten virtual dan chatbot yang berbasis AI memungkinkan interaksi manusia yang lebih intuitif dengan mesin, menyediakan layanan pelanggan yang lebih baik, bantuan personal, dan pengalaman pengguna yang lebih baik.
                5. Peningkatan keamanan: AI dapat digunakan dalam sistem keamanan untuk mendeteksi ancaman dan kegiatan yang mencurigakan, membantu melindungi infrastruktur digital dan mencegah serangan cyber.
                6. Inovasi dan pengembangan produk: AI memungkinkan pengembangan produk dan layanan baru yang inovatif, seperti mobil otonom, asisten pintar, dan aplikasi berbasis kecerdasan buatan.
                7. Meningkatkan prediksi dan analisis: Dengan kemampuan mengolah data dalam skala besar, AI dapat memberikan wawasan yang lebih mendalam dalam tren pasar, analisis risiko, dan prediksi masa depan, membantu pengambilan keputusan yang lebih baik dan strategi yang lebih efektif.
                Pemanfaatan AI terus berkembang dan memiliki potensi besar untuk membawa dampak positif dalam berbagai aspek kehidupan manusia, meningkatkan efisiensi, keamanan, kesehatan, dan inovasi.', 
                'idCourse' => 1, 
                'sequence' => 2
            ],
            ['name' => 'Skenario AI', 
            'body' => 'Skenario AI melibatkan berbagai situasi di mana kecerdasan buatan dapat diterapkan. Beberapa contoh skenario AI meliputi:
                1. Kendaraan Otonom: Penggunaan AI dalam kendaraan otonom memungkinkan mobil untuk mengemudi secara mandiri dengan bantuan sensor, pemrosesan citra, dan teknik pengenalan objek. Hal ini dapat meningkatkan keselamatan jalan, mengurangi kecelakaan, dan memberikan pengalaman pengemudi yang lebih nyaman.
                2. Sistem Rekomendasi: AI digunakan dalam sistem rekomendasi, seperti yang ditemukan di platform streaming, e-commerce, dan media sosial. Sistem ini menganalisis preferensi dan perilaku pengguna untuk memberikan rekomendasi yang dipersonalisasi, membantu pengguna menemukan konten atau produk yang relevan.
                3. Pemrosesan Bahasa Alami (Natural Language Processing): AI dapat digunakan untuk memahami dan memproses bahasa manusia dalam bentuk teks atau ucapan. Contohnya termasuk chatbot yang dapat memahami pertanyaan pengguna dan memberikan jawaban yang tepat, serta sistem penerjemahan mesin yang dapat menerjemahkan teks dari satu bahasa ke bahasa lain.
                4. Deteksi Anomali: AI dapat digunakan untuk mendeteksi anomali dalam data yang kompleks, seperti dalam pemantauan keamanan atau deteksi kecurangan finansial. Dengan analisis yang terus-menerus, sistem AI dapat mengidentifikasi pola yang tidak biasa atau perilaku yang mencurigakan.
                5. Pengenalan Citra: AI memungkinkan sistem untuk mengenali dan memahami citra visual. Contoh penggunaannya termasuk pengenalan wajah, identifikasi objek, dan deteksi emosi dalam gambar. Ini dapat diterapkan dalam keamanan, pemrosesan gambar medis, dan industri lainnya.', 
                'idCourse' => 1, 
                'sequence' => 3
            ],
            ['name' => 'AI Lebih Jauh', 
            'body' => 'AI (Artificial Intelligence) adalah bidang yang luas dan kompleks dengan berbagai materi yang dapat dipelajari. Beberapa topik penting yang bisa menjadi materi dalam mempelajari AI lebih jauh meliputi:
                1. Machine Learning: Mempelajari tentang teknik-teknik pembelajaran mesin, termasuk algoritma pembelajaran yang populer seperti regresi, klasifikasi, pengelompokan, dan neural network. Memahami konsep seperti fungsi objektif, pelatihan model, validasi, dan evaluasi kinerja model.
                2. Deep Learning: Mendalami arsitektur jaringan saraf tiruan yang dalam dan kompleks, serta pelatihan dan penerapan mereka. Memahami konsep seperti convolutional neural network (CNN) untuk pengolahan citra, recurrent neural network (RNN) untuk data urutan, dan generative adversarial network (GAN) untuk generasi data baru.
                3. Natural Language Processing (NLP): Memahami teknik dan algoritma yang digunakan untuk memproses dan memahami bahasa manusia, seperti tokenisasi, pemodelan bahasa, analisis sentimen, dan penerjemahan mesin. Memahami metode NLP seperti pemrosesan bahasa alami berbasis aturan, pembelajaran mesin, dan deep learning.
                4. Computer Vision: Mempelajari teknik pengenalan pola visual dan analisis citra komputer, seperti deteksi objek, segmentasi, pengenalan wajah, dan pemrosesan video. Memahami algoritma dan arsitektur seperti Convolutional Neural Networks (CNN), yang sering digunakan dalam tugas-tugas komputer vision.
                5. Reinforcement Learning: Memahami tentang bagaimana agen belajar secara interaktif dengan lingkungan melalui percobaan dan penghargaan. Memahami konsep seperti state, action, reward, policy, dan value function. Mempelajari algoritma-algoritma seperti Q-Learning, SARSA, dan metode-metode pembelajaran penguatan yang lebih canggih seperti Deep Q-Network (DQN) dan Proximal Policy Optimization (PPO).', 
            'idCourse' => 2, 
            'sequence' => 1
            ],
            ['name' => 'Cara Merancang AI', 
            'body' => 'Merancang AI melibatkan serangkaian langkah yang penting. Berikut adalah beberapa materi yang dapat dipelajari untuk memahami cara merancang AI: 
            1. Pemahaman Masalah: Memulai dengan pemahaman yang jelas tentang masalah yang ingin diselesaikan. Identifikasi tantangan yang ingin diatasi dan tujuan yang ingin dicapai dengan menggunakan AI.
            2. Pengumpulan dan Pemrosesan Data: Pelajari tentang teknik pengumpulan data yang efektif dan memastikan data yang diperlukan tersedia dalam jumlah yang memadai. Pemrosesan data melibatkan pembersihan, transformasi, dan normalisasi data agar sesuai dengan kebutuhan algoritma AI.
            3. Pemilihan Algoritma: Pelajari berbagai jenis algoritma AI, termasuk machine learning dan deep learning. Pahami karakteristik dan kecocokan setiap algoritma dengan masalah yang ingin diselesaikan. Perhatikan faktor seperti tipe data, ukuran dataset, dan sifat masalah (klasifikasi, regresi, pengenalan pola, dll.).
            4. Pelatihan Model: Pelajari langkah-langkah untuk melatih model AI. Ini meliputi pemilihan fitur yang relevan, pembagian dataset menjadi set pelatihan, validasi, dan pengujian, serta penyesuaian parameter model untuk meningkatkan kinerja.
            5. Evaluasi dan Pemilihan Model Terbaik: Pelajari metode evaluasi untuk mengukur kinerja model AI, seperti akurasi, presisi, recall, dan F1-score. Pilih model terbaik yang memberikan hasil yang paling baik untuk masalah yang ditargetkan.
            6. Implementasi dan Integrasi: Pelajari bagaimana mengimplementasikan model AI ke dalam lingkungan yang relevan. Ini mungkin melibatkan pembangunan aplikasi, integrasi dengan infrastruktur IT yang ada, atau pengembangan API untuk digunakan oleh sistem lain.', 
            'idCourse' => 2, 
            'sequence' =>2
            ],
            ['name' => 'Cara Merancang AI menggunakan Tool', 
            'body' => 'Merancang AI dengan menggunakan alat atau framework yang tepat dapat mempermudah proses pengembangan. Berikut adalah beberapa materi yang dapat dipelajari untuk memahami cara merancang AI menggunakan alat: 
            1. Memahami Alat atau Framework: Pelajari alat atau framework AI yang populer seperti TensorFlow, PyTorch, atau Scikit-learn. Pahami fitur-fitur, kemampuan, dan cara kerja masing-masing alat tersebut.
            2. Instalasi dan Konfigurasi: Pelajari cara menginstal dan mengkonfigurasi alat atau framework AI yang dipilih. Pahami persyaratan sistem, dependensi, dan konfigurasi yang diperlukan untuk menjalankan alat dengan baik.
            3. Preprocessing Data: Pelajari cara menggunakan alat untuk preprocessing data seperti pembersihan, transformasi, penghapusan outlier, dan normalisasi data. Pahami fungsi dan metode yang tersedia dalam alat tersebut.
            4. Memilih dan Mengimplementasikan Model: Pelajari cara memilih model AI yang sesuai dengan masalah yang ingin diselesaikan dan bagaimana mengimplementasikannya dengan menggunakan alat atau framework yang dipilih. Pahami sintaksis dan metode yang digunakan untuk mengkonstruksi dan melatih model.
            5. Melatih dan Mengevaluasi Model: Pelajari cara melatih model AI dengan menggunakan alat tersebut. Pahami cara melakukan pelatihan dengan menggunakan data pelatihan, validasi, dan teknik pengoptimalan yang sesuai. Pelajari juga cara mengevaluasi kinerja model dengan menggunakan metrik-metrik evaluasi yang relevan.
            6. Penyesuaian Model dan Optimasi: Pelajari cara menyesuaikan dan mengoptimasi model AI menggunakan alat atau framework yang dipilih. Pahami cara mengatur parameter model, teknik regularisasi, dan metode pengoptimalan yang tersedia dalam alat tersebut.
            7. Integrasi dengan Infrastruktur: Pelajari cara mengintegrasikan model AI yang telah dibangun dengan infrastruktur yang ada, seperti menggunakan RESTful API atau mengintegrasikannya dengan platform atau aplikasi lain.', 
            'idCourse' => 2, 
            'sequence' =>3],
        ];

        DB::table('modules')->insert($module);
    }
}
