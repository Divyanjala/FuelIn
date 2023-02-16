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
                'name' => 'Tharindu Ad',
                'email' => 'tharindu_ad@example.com',
                'password' => Hash::make('11111111'),
                'user_role' => 1
            ],[
                'name' => 'Tharindu St',
                'email' => 'tharindu_st@example.com',
                'password' => Hash::make('11111111'),
                'user_role' => 2
            ],[
                'name' => 'Tharindu Cus',
                'email' => 'tharindu_cus@example.com',
                'password' => Hash::make('11111111'),
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
