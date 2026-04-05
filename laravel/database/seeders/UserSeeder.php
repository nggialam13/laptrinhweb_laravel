<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /** Khớp ảnh: 500 user, name = name{n} + chuỗi ngẫu nhiên, email = use{n}@example.com */
    public const TOTAL_USERS = 500;

    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        Schema::enableForeignKeyConstraints();

        User::factory()
            ->count(self::TOTAL_USERS)
            ->sequence(function (Sequence $sequence) {
                $i = $sequence->index;

                return [
                    'name' => 'name' . $i . Str::random(10),
                    'email' => 'use' . $i . '@example.com',
                ];
            })
            ->create();
    }
}
