<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyFoundationDateDisableTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS company_foundation_date_disable_trigger;
            CREATE TRIGGER company_foundation_date_disable_trigger BEFORE UPDATE ON `companies`
            FOR EACH ROW BEGIN
              IF (NEW.companyFoundationDate != OLD.companyFoundationDate) THEN
                    SET NEW.companyFoundationDate = OLD.companyFoundationDate;
              END IF;
            END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_foundation_date_disable_trigger');
    }
}