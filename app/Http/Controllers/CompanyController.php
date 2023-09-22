<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function activity()
    {
        $queryResult = DB::select(
            'CALL company_activity_procedure()'
        );

        $data['companiesActicity'] = collect($queryResult);

        return view('companies.activities', compact('data'));

        echo "<table>";
        foreach ($data['companiesActicity'] as $key => $item) {
            if ($key == 0) {
                echo "<tr>";
                $value = json_decode(json_encode($item), true);
                foreach ($value as $value_key => $value_value) {
                    echo "<td>" . $value_key . "</td>";
                }
                echo "</tr>";
            }
            echo "<tr>";
            foreach ($item as $i) {
                echo "<td>" . $i . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    public function companyFoundationsByDate()
    {
        $data = DB::select("select selected_date, GROUP_CONCAT(companyName) companies from 
        (select adddate('2001-01-01',t4*10000 + t3*1000 + t2*100 + t1*10 + t0) selected_date from
         (select 0 t0 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t0,
         (select 0 t1 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t1,
         (select 0 t2 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t2,
         (select 0 t3 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t3,
         (select 0 t4 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t4) v
        left join companies c ON selected_date = c.companyFoundationDate
        where selected_date between '2001-01-01' and NOW()
        GROUP BY selected_date
        order by selected_date;");

        return view('companies.foundations', compact('data'));
    }
}