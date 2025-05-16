<?php

// Emanuel Patiño

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['subtitle'] = __('Admin.welcome').Auth::user()->getName();

        return view('admin.index')->with('viewData', $viewData);
    }
}
