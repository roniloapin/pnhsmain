<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('learner_type_id');
            $table->string('lrn')->nullable();
            $table->string('last_name');
            // $table->integer('strand_id');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('extension')->nullable();
            $table->string('email')->nullable();
            $table->date('date_of_birth');
            $table->string('gender');
            $table->integer('religion_id')->nullable();
            $table->string('psa')->nullable();
            $table->string('indigenous')->nullable();
            $table->integer('mother_tongue_id')->nullable();
            $table->string('special_educational')->nullable();
            $table->string('specify_lrn')->nullable();
            $table->string('region')->nullable();
            $table->string('province')->nullable();
            $table->string('house_no_street')->nullable();
            $table->string('city_municipality')->nullable();
            $table->string('barangay')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_education')->nullable();
            $table->string('father_employment')->nullable();
            $table->string('father_number')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_education')->nullable();
            $table->string('mother_employment')->nullable();
            $table->string('mother_number')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_education')->nullable();
            $table->string('guardian_employment')->nullable();
            $table->string('guardian_number')->nullable();
            $table->string('key_stage')->nullable();
            $table->string('jhs_grade_level')->nullable();
        
            $table->string('schoolyear_id')->nullable();
            $table->string('requirement')->nullable();
            $table->string('picture')->nullable();
            $table->string('status')->nullable();

            $table->foreignId('strand_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
