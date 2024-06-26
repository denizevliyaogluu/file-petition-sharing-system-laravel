<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FileCategories;
use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $fl = Files::where('user_id', auth()->id())->get();
        return view('admin.files.index', compact('fl'));
    }
    public function categoryindex()
    {
        $flc = FileCategories::where('user_id', auth()->id())->get();
        return view('admin.filecategories.categoryindex', compact('flc'));
    }
}