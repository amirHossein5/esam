<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Facades\App\Services\Gate as ServicesGate;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('admin.index');
    }
}
