<?php

use App\Models\FuelType;
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
        Schema::create('fuel_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable();
            $table->integer('status')->default(0);
            $table->text('des')->nullable();
            $table->timestamps();
        });

        $data = [
            [ 'name' => 'Petrol(92 Octane)' ,'code'=>'A0023L99'],
            [ 'name' => 'Petrol(95 Octane EURO 4)','code'=>'A0018L99' ],
            [ 'name' => 'Diesel(Auto Diesel)','code'=>'A0013L99' ],
            [ 'name' => 'Diesel(Lanka Super Diesel 4 star)', 'code'=>'A0016L99' ],
            [ 'name' => 'Furnace Oil','code'=>'A0026L99' ],
            [ 'name' => 'Naptha','code'=>'P-021' ],
            [ 'name' => 'Lanka SBP 60/145','code'=>'P-702' ],
            [ 'name' => 'Lanka L.P.G','code'=>'P-022' ],
            [ 'name' => 'Lanka Industrial Kerosene','code'=>'P-012' ]
        ];
        FuelType::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fuel_types');
    }
};
