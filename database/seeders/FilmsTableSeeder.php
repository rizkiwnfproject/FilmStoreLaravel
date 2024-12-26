<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('films')->insert([
            [
                'title' => 'Keluarga Cemara',
                'summary' => 'Sebuah film komedi yang mengisahkan tentang perjuangan keluarga dalam menjalani kehidupan sehari-hari dengan cara yang penuh kehangatan dan tawa.',
                'release_year' => 2019,
                'poster' => 'posters/niEFBP617j22pyFKDgIaHZC8qr1Cwbqqqd3Pklsb.jpg',
                'genre_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Asih',
                'summary' => 'AAsih adalah film horor yang bercerita tentang seorang wanita bernama Asih yang meninggal dalam keadaan tragis dan menjadi hantu. ',
                'release_year' => 2018,
                'poster' => 'posters/00vnIpsikwJPsLy6BlYYU5ij6IM9sIycyHpT89US.jpg',
                'genre_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Hit & Run',
                'summary' => 'Hit & Run adalah film aksi dan thriller yang mengisahkan tentang seorang pria bernama Tegar yang berusaha melarikan diri dari pengejaran orang',
                'release_year' => 2022,
                'poster' => 'posters/lSjoMHzFIIvJur6I85Y0D9AdHY91AUIz0uBkz1ni.jpg',
                'genre_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => '96 Jam',
                'summary' => '96 Jam adalah film aksi yang menceritakan kisah seorang pria bernama Nino yang berusaha menyelamatkan anak perempuannya yang diculik oleh sekelompok teroris. ',
                'release_year' => 2019,
                'poster' => 'posters/C9IQxxtK8zEFkjTruxTaVFYOhfXDQd57QAO7UxC5.jpg',
                'genre_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Bumi Manusia',
                'summary' => 'Meskipun dirilis pada akhir 2019, film ini masih relevan sebagai film romansa Indonesia modern. Berdasarkan novel karya Pramoedya Ananta Toer, mengisahkan cinta antara Minke ',
                'release_year' => 2019,
                'poster' => 'posters/Mg1tovmTCRmpWUm02ZI6ehQ7PspmkZud6QOxI0lu.jpg',
                'genre_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
