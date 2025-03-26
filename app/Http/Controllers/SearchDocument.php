<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SearchDocument extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::with('user')->orderBy('ngaydang', 'asc')->paginate(9);
        return view('searchDocument.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $documentByID = Document::with('user')->find($id);
        return view('searchDocument.details', compact('documentByID'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        // dd($searchTerm);
        $documents = Document::where('tentailieu', 'like', "%$searchTerm%")
            ->orWhere('noidung', 'like', "%$searchTerm%")
            ->orWhere('nguoidang', 'like', "%$searchTerm%")
            ->with('user')
            ->orderBy('ngaydang', 'desc')
            ->paginate(9);
        if ($documents->isEmpty() && !empty($searchTerm)) {
            $message = 'Không tìm thấy tài liệu nào phù hợp.';
            session()->flash('message', $message);
        } else {
            $message = null;
        }
        return view('searchDocument.index', compact('documents', 'message'));
    }
}
