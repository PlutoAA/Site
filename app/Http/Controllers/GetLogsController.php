<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class GetLogsController extends Controller
{
    public function __invoke(){
        $windowsLogs = DB::table('windows_log_entry')->get();
        $linuxLogs = DB::table('ag_log')->get();
        return array([
            'windowsLogs' => $windowsLogs, 
            'linuxLogs' => $linuxLogs
        ]);
    }
}
