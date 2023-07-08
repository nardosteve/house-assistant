<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *//*
    public function up(): void
    {
        Schema::create('Users', function (Blueprint $table) {
            $table->id();
            $table->id('user-id');//PK
            $table->id('role-id');//FK
            $table->string('Name');
            $table->string('Phone');
            $table->string('Physical location');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('Profile picture');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('Roles', function (Blueprint $table) {
            $table->id();
            $table->id('role-id');
            $table->string('Name');
            
        });
        Schema::create('Job-Applications', function (Blueprint $table) {
            $table->id();
            $table->id('application-id');//PK
            $table->id('job-id');//FK
            $table->id('user-id');//FK
            $table->date('date');
            $table->file('documents');
            $table->string('availability');
            $table->timestamps();
        });

        Schema::create('Job-Posting', function (Blueprint $table) {
            $table->id();
            $table->id('job-id');//FK
            $table->id('user-id');//FK
            $table->string('title');
            $table->string('status');
            $table->string('description');
            $table->string('salary-range');
          
        });

        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->id('user-id');//FK
            $table->string('message');
            $table->timestamps();
          
          
        });
    }

    /**
     * Reverse the migrations.
     
    public function down(): void
    {
        //
    } */


        public function up(): void
        {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('role_id');
                $table->string('name');
                $table->string('phone');
                $table->string('physical_location');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->string('profile_picture');
                $table->rememberToken();
                $table->timestamps();
        
                $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            });
        
            Schema::create('roles', function (Blueprint $table) {
                $table->id();
                $table->string('name');
            });
        
            Schema::create('job_applications', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('job_id');
                $table->unsignedBigInteger('user_id');
                $table->date('date');
                $table->string('documents');
                $table->string('availability');
                $table->timestamps();
        
                $table->foreign('job_id')->references('id')->on('job_postings')->onDelete('cascade');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
        
            Schema::create('job_postings', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->string('title');
                $table->string('status');
                $table->string('description');
                $table->string('salary_range');
        
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
        
            Schema::create('reviews', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->string('message');
                $table->timestamps();
        
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
        }
        
       
      
    };