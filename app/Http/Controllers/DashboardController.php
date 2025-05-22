<?php

namespace App\Http\Controllers;

use App\Models\DataSim;
use App\Models\DataSio;
use App\Models\DataSir;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $now = now();
        $threshold = $now->copy()->addMonths(3);

        // Dokumen yang akan expired dalam 3 bulan
        $simExpiringSoon = DataSim::whereBetween('expire_date', [$now, $threshold])->get();
        $sioExpiringSoon = DataSio::whereBetween('expire_date', [$now, $threshold])->get();
        $sirExpiringSoon = DataSir::whereBetween('expire_date', [$now, $threshold])->get();

        // Dokumen yang sudah expired
        $expiredSims = DataSim::where('status', 'expired')->get();
        $expiredSios = DataSio::where('status', 'expired')->get();
        $expiredSirs = DataSir::where('status', 'expired')->get();

        // Cek apakah ada data expired atau mendekati expired
        $hasExpired = !$expiredSims->isEmpty() || !$expiredSios->isEmpty() || !$expiredSirs->isEmpty();
        $hasExpiringSoon = !$simExpiringSoon->isEmpty() || !$sioExpiringSoon->isEmpty() || !$sirExpiringSoon->isEmpty();

        // Kirim semua ke view dashboard
        return view('admin.dashboard.index', compact(
            'simExpiringSoon',
            'sioExpiringSoon',
            'sirExpiringSoon',
            'expiredSims',
            'expiredSios',
            'expiredSirs',
            'hasExpired',
            'hasExpiringSoon'
        ));
    }

    public function expiredList()
    {
        $expiredSims = DataSim::where('status', 'expired')->get();
        $expiredSios = DataSio::where('status', 'expired')->get();
        $expiredSirs = DataSir::where('status', 'expired')->get();

        return view('admin.dashboard.expired', compact(
            'expiredSims',
            'expiredSios',
            'expiredSirs'
        ));
    }
}
