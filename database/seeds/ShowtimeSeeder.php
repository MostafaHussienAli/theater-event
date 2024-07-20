<?php

namespace Database\Seeders;

use App\Models\Showtime;
use Illuminate\Database\Seeder;

class ShowtimeSeeder extends Seeder
{
    public function run()
    {
        $showtimes = [
            ['start_time' => '18:00:00', 'end_time' => '20:30:00'],
            ['start_time' => '20:30:00', 'end_time' => '22:00:00'],
            ['start_time' => '22:30:00', 'end_time' => '01:00:00'],
        ];

        foreach ($showtimes as $showtime) {
            Showtime::create($showtime);
        }
    }
}
