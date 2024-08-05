<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function testDatabaseConnection()
    {
        try {
            $results = DB::select('SELECT 1 as test');
            return response()->json(['status' => 'success', 'data' => $results]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
