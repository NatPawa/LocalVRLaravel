<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Device;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('devices')->insert([
            'QRName' => 'Equipo1',
            'type' => 'Raspberry',
            'state' => 'wait',
            'ip' => '192.168.1.147',
        ]);

        DB::table('devices')->insert([
            'QRName' => 'Equipo2',
            'type' => 'Raspberry',
            'state' => 'wait',
            'ip' => '192.168.1.147',
        ]);

        Device::all()->find(1)->games()->attach(1);
        Device::all()->find(1)->games()->attach(2);
        Device::all()->find(1)->games()->attach(3);

        Device::all()->find(2)->games()->attach(1);
        Device::all()->find(2)->games()->attach(2);
        Device::all()->find(2)->games()->attach(3);

    }
}
