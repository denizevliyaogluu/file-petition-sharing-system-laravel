<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\FileCategories;
use App\Models\Files;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\TicketCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilesController extends Controller
{
    public function index(Request $request)
    {
        $fl = Files::where('status', 1);
        if ($request->has('category_id')) {
            $category_id = $request->input('category_id');
            $fl->where('category_id', $category_id);
        }

        $files = $fl->get();
        $categories = FileCategories::all();

        return view('web.files.index', compact('files', 'categories'));
    }
}
