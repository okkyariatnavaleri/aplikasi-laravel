// ExampleController.php
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ExampleController extends Controller
{
    public function showData()
    {
        $data = DB::select('SELECT * FROM your_table');
        return view('data.table', ['data' => $data]);
    }
}
