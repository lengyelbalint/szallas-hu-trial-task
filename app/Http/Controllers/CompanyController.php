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
}