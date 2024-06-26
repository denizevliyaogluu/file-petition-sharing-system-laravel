<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FileCategories;
use Illuminate\Http\Request;
use App\Models\Files;
use Illuminate\Support\Facades\Auth;

class FilesController extends Controller
{
    public function create()
    {
        $categories = FileCategories::all();
        return view('admin.files.create', compact('categories'));
    }

    public function createPost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'file' => 'required',
            'category_id' => 'required|exists:file_categories,id',
        ]);

        $fl = new Files();
        $fl->title = $request->title;
        $fl->description = $request->description;
        $fl->status = 1;
        $fl->category_id = $request->category_id;
        $fl->user_id = Auth::user()->id;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/files'), $fileName);

            if ($fl->file && file_exists(public_path($fl->file))) {
                unlink(public_path($fl->file));
            }
            $fl->file = 'upload/files/' . $fileName;
        }
        $fl->save();

        return redirect()->route('admin.files.index');
    }

    public function update($id)
    {
        $fl = Files::findOrFail($id);
        $categories = FileCategories::all();
        return view('admin.files.update', compact('fl', 'categories'));
    }

    public function updatePost(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:file_categories,id',
        ]);

        $fl = Files::findOrFail($id);
        $fl->title = $request->title;
        $fl->description = $request->description;
        $fl->category_id = $request->category_id;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/files'), $fileName);
            if ($fl->file && file_exists(public_path($fl->file))) {
                unlink(public_path($fl->file));
            }
            $fl->file = 'upload/files/' . $fileName;
        }
        $fl->save();
        return redirect()->route('admin.files.index')->with('success', 'File updated successfully');
    }

    public function delete($id)
    {
        $fl = Files::findOrFail($id);

        $fl->delete();

        return redirect()->route('admin.files.index');
    }

    public function closefl($id)
    {
        $fl = Files::findOrFail($id);
        $fl->status = 0;
        $fl->save();

        return redirect()->back();
    }
}
