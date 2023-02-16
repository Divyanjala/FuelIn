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
            $table->timestamps();
        });

        $data = [
            [ 'name' => 'Car' ],
            [ 'name' => 'Motorcycle' ],
            [ 'name' => 'Van' ],
            [ 'name' => 'Bus' ],
            [ 'name' => 'Lorry' ],
            [ 'name' => 'Three-wheeler' ],
            [ 'name' => 'Tractor' ]
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
