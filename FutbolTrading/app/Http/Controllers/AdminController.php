<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('Admin.admin');
        $viewData['subtitle'] = __('Admin.welcome').Auth::user()->getName();
        $viewData['description'] = __('Admin.what_would');

        return view('admin.index')->with('viewData', $viewData);
    }
}
