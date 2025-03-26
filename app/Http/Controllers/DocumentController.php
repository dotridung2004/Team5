<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $documents = Document::whereNull('deleted_at')->orderBy('updated_at', 'desc')->paginate(10);
        return view('documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'matailieu' => 'required|unique:documents|max:50',
            'tentailieu' => 'required|max:255',
            'hinhanh' => 'required|file|mimes:jpg,jpeg,png',
            'file' => 'required|file|mimes:pdf,doc,docx',
            'noidung' => 'required',
            'ngaydang' => 'required|date',
            'trangthaiduyet' => 'required|boolean',
        ]);

        $imagePath = $request->file('hinhanh')->store('documents/images');
        $filePath = $request->file('file')->store('documents/files');

        Document::create([
            'matailieu' => $request->matailieu,
            'tentailieu' => $request->tentailieu,
            'hinhanh' => $imagePath,
            'path' => $filePath,
            'noidung' => $request->noidung,
            'ngaydang' => $request->ngaydang,
            'trangthaiduyet' => $request->trangthaiduyet,
            'nguoidang' => \Illuminate\Support\Facades\Auth::user()->tentaikhoan ?? null,
        ]);

        return redirect()->route('documents.index')->with('success', 'Tài liệu đã được thêm.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocumentRequest $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Tìm tài liệu, bao gồm cả các tài liệu đã bị soft delete
        $document = Document::withTrashed()->findOrFail($id);

        // Kiểm tra xem tài liệu đã bị soft delete chưa
        if ($document->trashed()) {
            // Nếu đã bị soft delete (từ hidden), xóa vĩnh viễn và chuyển về hiddenHistory
            $document->forceDelete();
            return redirect()->route('documents.hiddenHistory')->with('success', 'Tài liệu đã bị xóa vĩnh viễn.');
        } else {
            // Nếu chưa bị soft delete (từ index), xóa vĩnh viễn và chuyển về index
            $document->forceDelete();
            return redirect()->route('documents.index')->with('success', 'Tài liệu đã bị xóa vĩnh viễn.');
        }
    }

    /** Duyệt tài liệu */
    public function approve($id)
    {
        $document = Document::findOrFail($id);
        $document->trangthaiduyet = true;
        $document->save();

        return redirect()->route('documents.index')->with('success', 'Tài liệu đã được duyệt.');
    }

    // Ẩn tài liệu (soft delete)
    public function hide(Request $request, $id)
    {
        $request->validate([
            'lydoan' => 'required|string|max:255',
        ]);

        $document = Document::findOrFail($id);
        $document->update([
            'lydoan' => $request->lydoan,
        ]);
        $document->delete();

        return redirect()->route('documents.index')->with('success', 'Tài liệu đã được ẩn.');
    }

    // Hiển thị danh sách tài liệu bị ẩn
    public function hiddenHistory()
    {
        $documents = Document::onlyTrashed()->orderBy('updated_at', 'desc')->paginate(5); // Lấy các tài liệu đã bị soft delete
        return view('documents.hidden', compact('documents'));
    }

    // Khôi phục tài liệu từ danh sách ẩn
    public function restore($id)
    {
        $document = Document::onlyTrashed()->findOrFail($id);
        $document->restore(); // Khôi phục tài liệu

        return redirect()->route('documents.hiddenHistory')->with('success', 'Tài liệu đã được khôi phục.');
    }
}
