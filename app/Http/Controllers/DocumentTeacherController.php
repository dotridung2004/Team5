<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::where('nguoidang', Auth::user()->tentaikhoan)->get();
        return (view('teachers.index', compact('documents')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'matailieu' => 'required|string|max:255',
            'tentailieu' => 'required|string|max:255',
            'hinhanh' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
            'path' => 'nullable|mimes:pdf,doc,docx|max:5120',
            'noidung' => 'nullable|string',

        ]);

        $documents = new Document();
        $documents->matailieu = $request->matailieu;
        $documents->tentailieu = $request->tentailieu;
        $documents->nguoidang = Auth::user()->tentaikhoan;
        $documents->noidung = $request->noidung;
        $documents->ngaydang = now();

        if ($request->hasFile('hinhanh')) {
            $path = $request->file('hinhanh')->store('uploads/hinhanh', 'public');
            $documents->hinhanh = 'storage/' . $path; // Lưu đường dẫn vào DB
        }

        if ($request->hasFile('path')) {
            $filePath = $request->file('path')->store('uploads/tailieu', 'public');
            $documents->path = 'storage/' . $filePath; // Lưu đường dẫn vào DB
        }

        $documents->save();

        return redirect()->route('documentteacher.index')->with('message', 'Thêm tài liệu thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Document::findOrFail($id);

        $request->validate([
            'matailieu' => 'required|string|max:255',
            'tentailieu' => 'required|string|max:255',
            'noidung' => 'nullable|string',
            'hinhanh' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
            'path' => 'nullable|mimes:pdf,doc,docx|max:5120',
        ]);

        $item->matailieu = $request->matailieu;
        $item->tentailieu = $request->tentailieu;
        $item->noidung = $request->noidung;

        if ($request->hasFile('hinhanh')) {
            // Xóa ảnh cũ nếu có
            if ($item->hinhanh && Storage::exists($item->hinhanh)) {
                Storage::delete($item->hinhanh);
            }

            $path = $request->file('hinhanh')->store('uploads/hinhanh', 'public');
            $item->hinhanh = 'storage/' . $path;
        }

        if ($request->hasFile('path')) {
            // Xóa file cũ nếu có
            if ($item->path && Storage::exists($item->path)) {
                Storage::delete($item->path);
            }

            $filePath = $request->file('path')->store('uploads/tailieu', 'public');
            $item->path = 'storage/' . $filePath;
        }

        $item->save();

        return redirect()->route('documentteacher.index')->with('message', 'Cập nhật tài liệu thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $documents = Document::withTrashed()->findOrFail($id);
        // dd($documents);

        if ($documents) {
            $documents->forceDelete(); // Xóa vĩnh viễn bản ghi
            return redirect()->route('documentteacher.index')->with('message', 'Xóa thành công');
        } else {
            return redirect()->route('documentteacher.index')->with('message', 'Không tìm thấy tài liệu');
        }
    }
}
