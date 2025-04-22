<?php

namespace App\Http\Controllers;

use App\Models\DataSim;
use App\Models\DataSio;
use App\Models\DataSir;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
$threshold = $now->copy()->addMonths(3);

$simExpiringSoon = DataSim::whereBetween('expire_date', [$now, $threshold])->get();
$sioExpiringSoon = DataSio::whereBetween('expire_date', [$now, $threshold])->get();
$sirExpiringSoon = DataSir::whereBetween('expire_date', [$now, $threshold])->get();

return view('admin.dashboard.index', compact(
    'simExpiringSoon',
    'sioExpiringSoon',
    'sirExpiringSoon'
));

return view('admin.dashboard.index', compact('simExpiringSoon', 'sioExpiringSoon', 'sirExpiringSoon'));


        return view('admin.dashboard.index', compact('simExpiringSoon', 'sioExpiringSoon', 'sirExpiringSoon'));
    }
}
