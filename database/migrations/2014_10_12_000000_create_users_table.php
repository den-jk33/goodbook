<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('surname')->nullable();
            $table->text('phone')->nullable();
            $table->text('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('api_token', 80)->unique()->nullable();
            $table->boolean('is_admin')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('users')->insert(
            [
                'name' => 'test',
                'email' => 'name@domain.com',
                'password' => '$2y$10$8OCn4oJckeHeX27VCcEM5ehfrumdXJO/k90KG1GKEejHCqwm1lRDO',
                'api_token' => 'ix4U4wkyavlM0sKDjFhgUYqz21jZnGDc4TcSTNL74LvnCTrmyE1tbkH82lBh9ArUQqt0x9GWFL2Hpzpg',
                'is_admin' => true
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
