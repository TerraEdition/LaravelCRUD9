<?php

use App\Models\RoleModel;
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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role', 100)->nullable(false);
            $table->timestamps();
        });
        $role = ["Super User", "Regular User"];
        foreach ($role as $r) {
            RoleModel::create(
                ['role' => $r]
            );
        }
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
        });
        User::create(
            [
                'name' => 'Wendy',
                'email' => 'wendykarstan34@gmail.com',
                'password' => Hash::make('1122'),
                'role_id' => '1',
            ],
        );
        User::create(
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => Hash::make('1122'),
                'role_id' => '2',
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_role_id_foreign');
            $table->dropColumn('role_id');
        });
        Schema::dropIfExists('roles');
    }
};
