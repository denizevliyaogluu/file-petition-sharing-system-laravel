<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\FileCategories;
use Illuminate\Http\Request;

class FileCategoriesController extends Controller
{
    public function create()
    {
        return view('admin.filecategories.create');
    }

    public function createPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = new FileCategories();
        $category->name = $request->name;
        $category->user_id = Auth::user()->id;
        $category->save();

        return redirect()->route('admin.filecategories.index');
    }

    public function update($id)
    {
        $category = FileCategories::findOrFail($id);
        return view('admin.filecategories.update', compact('category'));
    }

    public function updatePost(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $category = FileCategories::findOrFail($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('admin.filecategories.index');
    }

    public function delete($id)
    {
        $category = FileCategories::findOrFail($id);

        $category->delete();

        return redirect()->route('admin.filecategories.index');
    }
}
