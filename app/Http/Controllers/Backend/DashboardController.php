<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $config = $this->config();
        $template = 'backend.dashboard.home.index';
        return view('backend.dashboard.layout', compact(
            'template',
            'config',
        ));
    }

    private function config()
    {
        return [
            'js' => [
                'backend/js/demo/chart-pie-demo.js',
                'backend/js/demo/chart-area-demo.js',
                'backend/vendor/chart.js/Chart.min.js'
            ]
        ];
    }
}
