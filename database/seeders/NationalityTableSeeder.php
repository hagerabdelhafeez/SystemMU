<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Nationality;

class NationalityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nationalities')->delete();

        $cgs = ['Algerian', 'American','Bahraini','Bangladeshi','Comoran','Chinese','Central African','Egyptian','Emirati',
        'Eritrean','Ethiopian','Ghanaian','Iraqi','Iranian','Indian','Indonesian','Jordanian','Lebanese', 'Libyan',
        'Omani','Palestinian','Qatari','Sudanese','Saudi Arabian','Syrian','South African','Yemeni'];

        foreach($cgs as  $cg){
            Nationality::create(['nationalities_name' => $cg]);
        }
    }
}
