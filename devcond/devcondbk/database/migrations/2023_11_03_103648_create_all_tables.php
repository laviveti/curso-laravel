<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTables extends Migration
{
  public function up(): void
  {
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('email')->unique();
      $table->string('cpf')->unique();
      $table->string('password');
    });

    Schema::create('units', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->integer('id_owner');

    });

    Schema::create('unit_people', function (Blueprint $table) {
      $table->id();
      $table->integer('id_unit');
      $table->string('name');
      $table->date('birthdate');
    });

    Schema::create('unit_vehicles', function (Blueprint $table) {
      $table->id();
      $table->integer('id_unit');
      $table->string('title');
      $table->string('color');
      $table->string('plate');
    });

    Schema::create('unit_pets', function (Blueprint $table) {
      $table->id();
      $table->integer('id_unit');
      $table->string('name');
      $table->string('race');
    });

    Schema::create('walls', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->string('body');
      $table->dateTime('date_created');
    });

    Schema::create('wall_likes', function (Blueprint $table) {
      $table->id();
      $table->integer('id_wall');
      $table->integer('id_user');
    });

    Schema::create('docs', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->string('file_url');
    });

    Schema::create('billets', function (Blueprint $table) {
      $table->id();
      $table->integer('id_unit');
      $table->string('title');
      $table->string('file_url');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {

  }
}
;
