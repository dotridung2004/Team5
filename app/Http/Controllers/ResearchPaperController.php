<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchPaper;
use App\Http\Requests\StoreResearchPaperRequest;
use App\Http\Requests\UpdateResearchPaperRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ResearchPaperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $papers = ResearchPaper::orderBy('updated_at', 'desc')->paginate(10);
        return view('researchpapers.index', compact('papers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('researchpapers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResearchPaperRequest $request)
    {
        $path = $request->file('path')->store('researchpapers', 'public');
        $hinhanh = $request->file('hinhanh')->store('images', 'public');


        ResearchPaper::create([
            'mabaiviet' => $request->mabaiviet,
            'tenbaiviet' => $request->tenbaiviet,
            'mota' => $request->mota,
            'noidung' => $request->noidung,
            'path' => $path,
            'hinhanh' => $hinhanh,
            'ngaydang' => $request->ngaydang ?: now(),
            'nguoidang' => Auth::user()->tentaikhoan,
        ]);

        return redirect()->route('researchpapers.index')->with('success', 'Bài viết đã được đăng.');
    }

    /**
     * Display the specified resource.
     */
    public function show($mabaiviet)
    {
        //
        $paper = ResearchPaper::findOrFail($mabaiviet);
        return view('researchpapers.show', compact('paper'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($mabaiviet)
    {
        $paper = ResearchPaper::findOrFail($mabaiviet);
        return view('researchpapers.edit', compact('paper'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResearchPaperRequest $request, $mabaiviet)
    {
        $paper = ResearchPaper::findOrFail($mabaiviet);

        $data = $request->validated();

        // Xử lý file tài liệu nếu có
        if ($request->hasFile('path')) {
            if ($paper->path) {
                Storage::disk('public')->delete($paper->path);
            }
            $data['path'] = $request->file('path')->store('researchpapers', 'public');
        }

        // Xử lý ảnh minh họa nếu có
        if ($request->hasFile('hinhanh')) {
            if ($paper->hinhanh) {
                Storage::disk('public')->delete($paper->hinhanh);
            }
            $data['hinhanh'] = $request->file('hinhanh')->store('images', 'public');
        }
        // Cập nhật bài viết
        $paper->update($data);

        return redirect()->route('researchpapers.index', $paper->mabaiviet)->with('success', 'Bài viết đã được cập nhật.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($mabaiviet)
    {
        //
        $paper = ResearchPaper::findOrFail($mabaiviet);
        Storage::delete([$paper->path, $paper->hinhanh]);
        $paper->delete();
        return redirect()->route('researchpapers.index')->with('success', 'Bài viết đã bị xóa.');
    }
}
