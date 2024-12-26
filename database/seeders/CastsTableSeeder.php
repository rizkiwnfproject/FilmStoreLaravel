<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CastsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cast')->insert([
            [
                'id' => 2,
                'name' => 'Iqbaal Ramadhan',
                'age' => 25,
                'bio' => 'Iqbaal Dhiafakhri Ramadhan, juga dikenal dengan mononim sebagai BAALE adalah seorang pemeran, penyanyi, dan produser film berkebangsaan Indonesia. Iqbaal mulai berkarier sebagai aktor ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Mawar Eva de Jongh',
                'age' => 27,
                'bio' => 'Mawar Eva de Jongh adalah pemeran dan penyanyi Indonesia. Ia mulai dikenal luas lewat perannya dalam film Bumi Manusia.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Andi Arsyil',
                'age' => 30,
                'bio' => 'Andi Arsyil adalah seorang aktor dan model Indonesia yang dikenal lewat perannya dalam berbagai film dan serial televisi. Ia mulai dikenal luas setelah membintangi film Hit & Run',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Ge Pamungkas',
                'age' => 35,
                'bio' => 'Ge Pamungkas adalah aktor dan komedian Indonesia yang dikenal dengan gaya humor dan peran-perannya yang beragam. Dalam Hit & Run, Ge Pamungkas berperan dalam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'Rieke Diah Pitaloka',
                'age' => 40,
                'bio' => 'Rieke Diah Pitaloka adalah aktris Indonesia yang dikenal dengan peran-perannya dalam genre horor. Dalam Asih, ia berperan sebagai tokoh utama',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => 'Nirina Zubir',
                'age' => 50,
                'bio' => 'Nirina Zubir adalah aktris Indonesia yang juga dikenal sebagai presenter dan komedian. Dalam Asih, ia berperan sebagai tokoh utama ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'name' => 'Vino G. Bastian',
                'age' => 40,
                'bio' => 'Vino G. Bastian adalah aktor Indonesia yang terkenal lewat peran-perannya dalam film aksi dan drama. Dalam 96 Jam, Vino G. Bastian memerankan Nino',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'name' => 'Ringgo Agus Rahman',
                'age' => 30,
                'bio' => 'Tora Sudiro adalah aktor Indonesia yang dikenal lewat berbagai peran dalam film komedi dan drama. Dalam 96 Jam, Tora memerankan karakter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
