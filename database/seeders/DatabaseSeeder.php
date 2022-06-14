<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Admin;
use App\Models\AparaturDesa;
use App\Models\Gender;
use App\Models\Finance;
use App\Models\Program;
use App\Models\Category;
use App\Models\Keuangan;
use App\Models\Marriage;
use App\Models\Programs;
use App\Models\Religion;
use App\Models\Education;
use App\Models\Potential;
use App\Models\Assistance;
use App\Models\Profession;
use App\Models\Assistances;
use Illuminate\Database\Seeder;
use App\Models\VillagePotential;
use App\Models\AssistanceProgram;
use App\Models\LayananMandiri;
use App\Models\Village;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Adam Alfarizi',
            'username' => 'adamalfarizi',
            'email' => 'adamalfa18@gmail.com',
            'nik' => '173040023',
            'password' => bcrypt('173040023')
        ]);
        User::create([
            'name' => 'Adam Alfarizi',
            'username' => 'adamal',
            'email' => 'adama18@gmail.com',
            'nik' => '173040024',
            'password' => bcrypt('123456789')
        ]);
        User::create([
            'name' => 'Adam Alfarizi',
            'username' => 'adal',
            'email' => 'dama18@gmail.com',
            'nik' => '173040025',
            'password' => bcrypt('987654321')
        ]);
        // User::factory(3)->create();

        // Admin::create([
        //     'name' => 'Adam Alfarizi',
        //     'username' => 'adamalfarizi',
        //     'email' => 'adamalfa18@gmail.com',
        //     'password' => bcrypt('173040023')
        // ]);
        // Admin::create([
        //     'name' => 'Adam',
        //     'username' => 'adama',
        //     'email' => 'adamalfa8@gmail.com',
        //     'password' => bcrypt('1730400233')
        // ]);

        Potential::create([
            'name' => 'Wisata',
            'slug' => 'wisata'

        ]);
        Potential::create([
            'name' => 'Budaya',
            'slug' => 'budaya'

        ]);

        Potential::create([
            'name' => 'Umkm',
            'slug' => 'umkm'

        ]);


        Post::factory(20)->create();



        Profession::create([
            'kelompok' => 'Politik',
            'jumlah' => '177'
        ]);

        Religion::create([
            'agama' => 'Islam',
            'jumlah' => '177'
        ]);

        Education::create([
            'pendidikan' => 'Diploma 1',
            'jumlah' => '177'
        ]);

        Marriage::create([
            'status' => 'menikah',
            'jumlah' => '177'
        ]);
        Marriage::create([
            'status' => 'belum',
            'jumlah' => '177'
        ]);
        Marriage::create([
            'status' => 'belut',
            'jumlah' => '177'
        ]);
        Marriage::create([
            'status' => 'memek',
            'jumlah' => '50'
        ]);
        Finance::create([
            'title' => 'ada',
            'jumlah' => '50000000',
            'belanja' => '50000000',
            'sisa' => '0',
            'category'=> 'APBD'
        ]);
        Finance::create([
            'title' => 'adaaa',
            'jumlah' => '30000000',
            'belanja' => '30000000',
            'sisa' => '0',
            'category'=> 'APBD'
        ]);

        Program::create([
            'name' => 'Adaaa',
            'asal' => 'dsgfvdsf',
            'jumlah' => '12',
            'sasaran' => 'dsgfvdsf',
            'status' => 'dsgfvdsf'
        ]);
        Program::create([
            'name' => 'Adaaa',
            'asal' => 'dsgfvdsf',
            'jumlah' => '3',
            'sasaran' => 'dsgfvdsf',
            'status' => 'dsgfvdsf'
        ]);

        Assistance::create([
            'program_id' => '1',
            'nama' => 'waw',
            'nik' => '1726538323',
            'alamat' => 'adaaa'
        ]);
        Assistance::create([
            'program_id' => '1',
            'nama' => 'waw',
            'nik' => '1726538323',
            'alamat' => 'adaaa'
        ]);
        Assistance::create([
            'program_id' => '2',
            'nama' => 'waw',
            'nik' => '1726538323',
            'alamat' => 'adaaa'
        ]);
        LayananMandiri::create([
            'nama_layanan' => 'Surat Kematian',
            'kategori' => 'kematian'
        ]);

        LayananMandiri::create([
            'nama_layanan' => 'Surat Keterangan Tidak Mampu',
            'kategori' => 'tidakMampu'
        ]);


        Category::create([
            'name' => 'Sosial',
            'slug' => 'sosial'

        ]);
        Category::create([
            'name' => 'Budaya',
            'slug' => 'budaya'

        ]);

        Category::create([
            'name' => 'Politik',
            'slug' => 'politik'

        ]);
        Village::factory(10)->create();
    }
}
