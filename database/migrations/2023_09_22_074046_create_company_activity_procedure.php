<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyActivityProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "DROP PROCEDURE IF EXISTS `company_activity_procedure`;
        CREATE PROCEDURE `company_activity_procedure` ()
        BEGIN
            DECLARE v_done INT DEFAULT FALSE;
            DECLARE v_id TEXT;
            DECLARE query_full TEXT;
            DECLARE cur1 CURSOR FOR SELECT DISTINCT activity FROM `companies`;
            DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_done = TRUE;
            
            SET @query_part = 'SELECT ';
        
            OPEN cur1;
        
            read_loop: LOOP
                FETCH cur1 INTO v_id;
                IF v_done THEN
                  LEAVE read_loop;
                END IF;
                       SET @query_part = CONCAT(@query_part, ' case when activity = \"',v_id,'\" then companyName else \'\' end \"',v_id,'\",');
            END LOOP;
            SET @query_part = CONCAT(LEFT(@query_part, char_length(@query_part) - 1), ' from companies');

            SET query_full = @query_part;

            SET @query_full = query_full;

            PREPARE STMT FROM @query_full;
            EXECUTE STMT;
           
            CLOSE cur1;
        END;";

        \DB::unprepared($procedure);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_activity_procedure');
    }
}