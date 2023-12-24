<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\Division;
use App\Models\Event;
use App\Models\WhiteList;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    private $whiteLists  = [
        20081010194,
        20081010177,
        20081010180,
        20081010202,
        20081010057,
        18081010154,
        20081010099,
        20081010103,
        20081010101,
        20081010162,
        20081010190,
        20081010161,
        19081010124,
        20081010020,
        19081010116,
        20081010218,
        18081010101,
        20081010132,
        20081010130,
        18081010041,
        20081010112,
        19081010145,
        18081010152,
        20081010163,
        18081010056,
        18081010105,
        17081010015,
        17081010040,
        20081010236,
        20081010009,
        20081010105,
        20081010114,
        20081010183,
        19081010180,
        20081010138,
        20081010243,
        20081010211,
        20081010154,
        20081010139,
        20081010146,
        20081010127,
        19081010128,
        19081010132,
        19081010041,
        17081010085,
        18081010118,
        19081010137,
        19081010129,
        18081010062,
        17081010056,
        19081010005,
        17081010012,
        17081010072,
        18081010086,
        20081010135,
        19081010079,
        20081010251,
        20081010150,
        20081010017,
        19081010094,
        20081010105,
        18081010111,
        19081010040,
        18081010095,
        20081010152,
        19081010093,
        19081010033,
        19081010024,
        19081010117,
        19081010142,
        19081010181,
        19081010141,
        20081010129,
        20081010156,
        18081010142,
        19081010179,
        19081010171,
        19081010069,
        19081010168,
        18081010148,
        19081010173,
        17081010024,
        17081010046,
        20081010233,
        17081010048,
        19081010134,
        19081010076,
        19081010122,
        19081010111,
        19081010169,
        19081010055,
        18081010089,
        20081010092,
        20081010024,
        20081010042,
        18081010090,
        18081010151,
        19081010125,
        17081010095,
        19081010185,
        19081010066,
        19081010189,
        19081010187,
        17081010022,
        17081010069,
        19081010190,
        18081010099,
        20081010011,
        19081010027,
        18081010040,
        19081010177,
        18081010092,
        19081010034,
        19081010017,
        20081010083,
        20081010136,
        20081010151,
        19081010060,
        20081010199,
        19081010074,
        20081010064,
        19081010115,
        19081010148,
        19081010037,
        19081010164,
        19081010138,
        19081010167,
        18081010150,
        19081010047,
        19081010004,
        17081010071,
        19081010014,
        19081010036,
        17081010063,
        19081010155,
        19081010025,
        19081010151,
        19081010026,
        19081010104,
        19081010081,
        19081010092,
        19081010147,
        19081010071,
        19081010097,
        19081010170,
        19081010084,
        19081010065,
        19081010083,
        19081010192,
        19081010020,
        19081010022,
        18081010097,
        18081010006,
        19081010021,
        18081010033,
        18081010009,
        19081010030,
        19081010182,
        18081010104,
        19081010008,
        19081010160,
        19081010130,
        19081010172,
        17081010073,
        17081010102,
        19081010146,
        19081010135,
        19081010156,
        19081010045,
        18081010145,
        19081010018,
        19081010191,
        19081010112,
        19081010184,
        18081010129,
        18081010141,
        19081010131,
        18081010025,
        19081010159,
        19081010165,
        19081010039,
        17081010104,
        19081010056,
        19081010166,
        19081010140,
        19081010106,
        19081010119,
        19081010023,
        19081010098,
        19081010139,
        19081010002,
        19081010126,
        19081010085,
        19081010011,
        17081010084,
        20081010113,
        19081010010,
        19081010175,
        20081010018,
        20081010240,
        19081010099,
        18081010046,
        20081010126,
        18081010003,
        19081010052,
        19081010043,
        19081010050,
        18081010034,
        19081010006,
        18081010076,
        20081010060,
        19081010067,
        19081010102,
        18081010038,
        19081010091,
        19081010075,
        19081010174,
        19081010143,
        18081010074,
        19081010114,
        19081010087,
        19081010176,
        19081010162,
        19081010162,
        19081010186,
        19081010153,
        19081010042,
        19081010154
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $event = Event::query()->create([
            'title' => 'PEMIRA',
            'description' => 'Hima KM Informatika 2024',
            'logo' => 'events/logo/pemira.png'
        ]);

        foreach ($this->whiteLists as $npm) {
            WhiteList::create([
                'event_id' => $event->id,
                'npm' => $npm
            ]);
        }

        $divisions = ['BLJ 2023', 'BLJ 2022', 'BLJ 2021', 'KAHIMA & WAKAHIMA'];

        foreach ($divisions as $division) {
            Division::query()->create([
                'event_id' => $event->id,
                'name' => $division
            ]);
        }

        Candidate::query()->create([
            'event_id' => $event->id,
            'division_id' => 1,
            'order' => '1',
            'first' => '23081010083',
            'first_name' => 'Aditya Firmansyah Wijaya',
            'second' => null,
            'second_name' => null,
            'vision' => 'Menjadikan BLJ sebagai lembaga yang dapat mewadahi aspirasi keluarga mahasiswa informatika dan bermanfaat di lingkungan mahasiswa informatika',
            'mission' => 'Menjalankan tugas dan tanggungjawab dengan transparansi dan keterbukaan, serta membentuk kepribadian yang lebih peka akan lingkungan sekitar',
            'picture' => 'events/candidates/candidate.jpg',
            'created_by' => 0
        ]);

        Candidate::query()->create([
            'event_id' => $event->id,
            'division_id' => 1,
            'order' => '2',
            'first' => '23081010135',
            'first_name' => 'Luthfiyana Mahrurin Abadi',
            'second' => null,
            'second_name' => null,
            'vision' => 'Mewujudkan BLJ Informatika sebagai lembaga yang aktif, profesional, dan berintegritas dalam pengawasan dan mewadahi aspirasi.',
            'mission' => 'Menjalankan tanggung jawab dengan berpegang pada prinsip demokratis, inklusifitas, dan humanis.',
            'picture' => 'events/candidates/candidate.jpg',
            'created_by' => 0
        ]);

        Candidate::query()->create([
            'event_id' => $event->id,
            'division_id' => 1,
            'order' => '3',
            'first' => '23081010007',
            'first_name' => 'Dyah Inkud Daifatur Rahma',
            'second' => null,
            'second_name' => null,
            'vision' => 'Terwujudnya Badan Legislatif Jurusan menjadi organisasi yang solid, aktif, dan bertanggung jawab',
            'mission' => '1. Pengoptimalan sumber daya mahasiswa dan segala bentuk aspirasi mahasiswa jurusan informatika
2. Peningkatan rasa kekeluargaan dan solidaritas antar mahasiswajurusan informatika',
            'picture' => 'events/candidates/candidate.jpg',
            'created_by' => 0
        ]);

        Candidate::query()->create([
            'event_id' => $event->id,
            'division_id' => 1,
            'order' => '4',
            'first' => '23081010185',
            'first_name' => 'Heraldi Rizky Anggriawan',
            'second' => null,
            'second_name' => null,
            'vision' => 'Terwujudnya BLJ sebagai Lembaga Legislatif yang dinamis dan transparan',
            'mission' => '1. Menjadi sebuah jembatan antara KM dan HIMATIFA khususnya BLJ agar aspirasi para KM dapat tercapai dengan baik dan jelas
2. Berperan aktif dalam peningkatan Himatifa khususnya BLJ guna mempercepat terwujudnya BLJ sebagai Lembaga Lesgislatif yang dinamis dan transparan',
            'picture' => 'events/candidates/candidate.jpg',
            'created_by' => 0
        ]);

        Candidate::query()->create([
            'event_id' => $event->id,
            'division_id' => 2,
            'order' => '1',
            'first' => '22081010065',
            'first_name' => 'Muhammad Fajar Saputra',
            'second' => null,
            'second_name' => null,
            'vision' => 'Mewujudkan jalannya kegiatan dilingkungan prodi yang baik dan solidaritas',
            'mission' => 'Mengawasi jalannya kegiatan yang akan dilakukan dengan baik dan mermanfaat bagi mahasiswa.',
            'picture' => 'events/candidates/candidate.jpg',
            'created_by' => 0
        ]);

        Candidate::query()->create([
            'event_id' => $event->id,
            'division_id' => 2,
            'order' => '2',
            'first' => '22081010072',
            'first_name' => 'Desta Rizky Andhika',
            'second' => null,
            'second_name' => null,
            'vision' => 'Mewujudkan badan legislatif menjadi organisasi yang memiliki solidaritas yang tinggi serta meningkatkan suatu kinerja dalam mewadahi aspirasi mahasiswa di dalam lingkup jurusan dan memiliki sikap bertanggung jawab.',
            'mission' => '1. Menjalankan tugas dan kewajiban sebagai Badan Legislatif Jurusan dengan sebaik-baiknya serta dapat berkomitmen dan bertanggung jawab
2. Dapat Berkontribusi dalam meningkatkan solidaritas di dalam lingkup jurusan',
            'picture' => 'events/candidates/candidate.jpg',
            'created_by' => 0
        ]);

        Candidate::query()->create([
            'event_id' => $event->id,
            'division_id' => 2,
            'order' => '3',
            'first' => '22081010321',
            'first_name' => 'Punto Adji Bhirawa',
            'second' => null,
            'second_name' => null,
            'vision' => 'Mewujudkan lingkungan mahasiswa yang aktif dan inovatif',
            'mission' => 'Membantu mewujudkan program yang bisa membuat mahasiswa menjadi aktif serta kritis',
            'picture' => 'events/candidates/candidate.jpg',
            'created_by' => 0
        ]);

        Candidate::query()->create([
            'event_id' => $event->id,
            'division_id' => 2,
            'order' => '4',
            'first' => '22081010040',
            'first_name' => 'Muchammad Fadika Naddiayanto',
            'second' => null,
            'second_name' => null,
            'vision' => '1. Menjadikan BLJ menjadi rumah aspirasi yang nyaman bagi KM
2. Menjadikan produktif dan representatif dalam menyuarakan aspirasi KM
3. Terwujudnya harmonisasi dan jaga keselarasan yang baik anatar stakeholder disiplin, kritis dan bewawasan luas',
            'mission' => '1. Meningkatkan dan mengembangkan fungsi Badan Legislatif Jurusan
2. Pengoptimalan fungsi dan peran wadah aspirasi KM
3. Menciptakan pembaharuan dan inovasi sesuai dengan kebutuhan',
            'picture' => 'events/candidates/candidate.jpg',
            'created_by' => 0
        ]);

        Candidate::query()->create([
            'event_id' => $event->id,
            'division_id' => 2,
            'order' => '5',
            'first' => '22081010091',
            'first_name' => 'Ade Rizky Panjaitan',
            'second' => null,
            'second_name' => null,
            'vision' => 'Mewujudkan lingkungan yang aktif, positif dan inklusif',
            'mission' => 'Dengan menjadi wadah untuk penerima aspirasi dan meningkatkan hubungan anatara Legilatif dan Eksekutif',
            'picture' => 'events/candidates/candidate.jpg',
            'created_by' => 0
        ]);

        Candidate::query()->create([
            'event_id' => $event->id,
            'division_id' => 2,
            'order' => '6',
            'first' => '22081010311',
            'first_name' => 'Belia Putri Salsabila',
            'second' => null,
            'second_name' => null,
            'vision' => 'Berkomitmen untuk meningkatkan kualitas pendidikan, kesejahteraan mahasiswa, dan keberlanjutan lingkungan akademis.',
            'mission' => 'Mengamati jalannya kegiatan dengan baik serta memberikan manfaat yang nyata bagi mahasiswa',
            'picture' => 'events/candidates/candidate.jpg',
            'created_by' => 0
        ]);

        Candidate::query()->create([
            'event_id' => $event->id,
            'division_id' => 3,
            'order' => '1',
            'first' => '21081010002',
            'first_name' => 'Andika Wira Yumna',
            'second' => null,
            'second_name' => null,
            'vision' => 'Menjadikan badan Legislatif Jurusan dengan meningkatkan kinerja dalam menampung aspirasi amahasiswa agar kepercayaan mahasiswa meningkat.',
            'mission' => 'Meningkatkan kinerja dalam menjadi wadah aspirasi mahasiswa',
            'picture' => 'events/candidates/candidate.jpg',
            'created_by' => 0
        ]);

        Candidate::query()->create([
            'event_id' => $event->id,
            'division_id' => 4,
            'order' => '1',
            'first' => '22081010026',
            'first_name' => 'Bisma Putra Sulung',
            'second' => '22081010046',
            'second_name' => 'Moch Wahyu Sampurno Utomo',
            'vision' => 'Mewujudkan HIMATIFA sebagai wadah yang mendorong perkembangan, dan meningkatkan kualitas seluruh keluarga mahasiswa Informatika, serta menjadi mitra terpercaya bagi semua pihak dalam menciptakan lingkungan yang inovatif dan berprestasi.',
            'mission' => '1. Menciptakan lingkungan Himpunan Mahasiswa Informatika yang responsif terhadap aspirasi dan inspirasi KM Informatika.
2. Menciptakan lingkungan yang kooperatif dalam berbagai bidang yang menarik minat KM Informatika.
3. Membangun kolaborasi yang baik antar sivitas akademika, maupun pihak eksternal HIMATIFA guna memberi peluang pengembangan kepada keluarga mahasiswa Informatika.
4. Mewadahi minat dan bakat baik dalam hal akademik maupun non-akademik untuk menjadikan keluarga mahasiswa Informatika yang inovatif dan berprestasi',
            'picture' => 'events/candidates/candidate.jpg',
            'created_by' => 0
        ]);
    }
}
