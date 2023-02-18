<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data = array(
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'user_role' => 1
            ],[
                'name' => 'Station',
                'email' => 'station@gmail.com',
                'password' => Hash::make('12345678'),
                'user_role' => 2
            ],[
                'name' => 'Customer',
                'email' => 'customer@gmail.com.com',
                'password' => Hash::make('12345678'),
                'user_role' => 3
            ],
        );

        User::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
