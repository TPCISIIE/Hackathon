<?php

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Schema\Blueprint;

Manager::schema()->create('account', function (Blueprint $table) {
    $table->increments('id');
    $table->string('username');
    $table->string('token')->unique();
    $table->timestamps();
});

Manager::schema()->create('music', function (Blueprint $table) {
    $table->increments('id');
    $table->string('title');
    $table->string('artist')->nullable();
    $table->string('genre')->nullable();
    $table->string('length')->nullable();
    $table->string('url');
    $table->timestamps();
});

Manager::schema()->create('room', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name');
    $table->unsignedInteger('music_id');
    $table->foreign('music_id')->references('id')->on('music');
});

Manager::schema()->create('account_room', function (Blueprint $table) {
    $table->unsignedInteger('account_id');
    $table->unsignedInteger('room_id');
    $table->boolean('dj');
    $table->foreign('account_id')->references('id')->on('account');
    $table->foreign('room_id')->references('id')->on('room');
});

Manager::schema()->create('account_music_room', function (Blueprint $table) {
    $table->unsignedInteger('account_id');
    $table->unsignedInteger('music_id');
    $table->unsignedInteger('room_id');
});