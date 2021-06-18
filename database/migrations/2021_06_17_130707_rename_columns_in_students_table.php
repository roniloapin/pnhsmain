<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnsInStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->renameColumn('school_year','schoolyear_id');
            $table->renameColumn('shs_strand_id','strand_id');
            $table->renameColumn('picture','requirement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->renameColumn('schoolyear_id','school_year');
            $table->renameColumn('strand_id','shs_strand_id');
            $table->renameColumn('requirement','picture');
        });
    }
}
