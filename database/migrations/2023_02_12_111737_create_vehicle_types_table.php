<?php

use App\Models\VehicleType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('vehicle_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('fuel_limit');
            $table->timestamps();
        });

        $data = [
            [ 'name' => 'Car' ,'fuel_limit'=>10],
            [ 'name' => 'Motorcycle','fuel_limit'=>4 ],
            [ 'name' => 'Van','fuel_limit'=>10 ],
            [ 'name' => 'Bus', 'fuel_limit'=>100 ],
            [ 'name' => 'Lorry','fuel_limit'=>100 ],
            [ 'name' => 'Three-wheeler','fuel_limit'=>5 ],
            [ 'name' => 'Tractor','fuel_limit'=>30 ]
        ];
        VehicleType::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_types');
    }
};
