<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewsRejected;
use App\Notifications\NewsApproved;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $news = News::orderBy('updated_at', 'desc')->paginate(10);
        $updated_at = News::orderBy('updated_at', 'desc')->first();
        return view('news.index', compact('news', 'updated_at'));
    }

    public function search(Request $request)
    {
        //
        $search = $request->input('search');

        if ($search) {
            $news = News::where('matintuc', 'like', "%$search%")
                ->orWhere('tentintuc', 'like', "%$search%")
                ->orWhere('mota', 'like', "%$search%")
                ->orWhere('nguoidang', 'like', "%$search%")
                ->orderBy('updated_at', 'desc')
                ->paginate(10);
        } else {
            $news = News::orderBy('updated_at', 'desc')->paginate(10);
        }

        $updated_at = News::orderBy('updated_at', 'desc')->first();
        return view('news.index', compact('news', 'updated_at'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request)
    {
        //
        try {
            // Generate a random matintuc (e.g., "NEWS-XXXXXX")
            $matintuc = 'TLU' . Str::upper(Str::random(6));

            // Check for uniqueness (optional, to avoid collisions)
            while (News::where('matintuc', $matintuc)->exists()) {
                $matintuc = 'TLU' . Str::upper(Str::random(6));
            }

            // Prepare data for saving
            $data = $request->validated();
            $data['matintuc'] = $matintuc;
            $data['nguoidang'] = Auth::user()->tentaikhoan; // Set the logged-in user's tentaikhoan

            // Handle image upload if provided
            if ($request->hasFile('path')) {
                $filePath = $request->file('path')->store('news_images', 'public');
                $data['path'] = $filePath; // Store the file path in the 'path' column
            }


            // Create the news record
            News::create($data);

            return redirect()->route('news.index')->with('success', 'Tin tức đã được lưu thành công!');
        } catch (\Exception $e) {
            return redirect()->route('news.index')->with('error', 'Không thể lưu tin tức. Vui lòng thử lại sau.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //

        return view('news.detail', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, News $news)
    {

        // Cập nhật các trường cơ bản
        $news->tentintuc = $request->input('tentintuc');
        $news->mota = $request->input('mota');
        $news->noidung = $request->input('noidung');
        $news->trangthai = 'public'; // Đảm bảo trạng thái công khai

        // Xử lý ảnh nếu có file mới
        if ($request->hasFile('path')) {
            // Xóa ảnh cũ nếu tồn tại
            if ($news->path) {
                Storage::disk('public')->delete($news->path);
            }

            // Lưu ảnh mới
            $path = $request->file('path')->store('news_images', 'public');
            $news->path = $path;
        }

        // Lưu các thay đổi vào database
        $news->save();

        return redirect()->route('news.index')->with('success', 'Tin tức đã được cập nhật thành công!');
    }


    public function reject(Request $request, $matintuc)
    {
        $news = News::findOrFail($matintuc);
        try {
            if ($request->isMethod('patch')) {
                // Validate lý do từ chối
                $request->validate([
                    'reason' => 'required|string',
                ], [
                    'reason.required' => 'Vui lòng nhập lý do từ chối.',
                ]);

                // Cập nhật trạng thái và lý do từ chối
                $news->trangthai = 'rejected';
                $news->lydotuchoi = $request->reason;
                $news->save();


                // Gửi thông báo cho tác giả
                try {
                    $action = 'reject';
                    $author = $news->user; // Giả định News model có quan hệ với User
                    Notification::send($author, new NewsRejected($news, $action));
                    return redirect()->route('news.index')->with('success', 'Tin tức đã bị từ chối.');
                } catch (\Exception $e) {
                    return redirect()->route('news.index')->with('error', 'Tin tức đã bị từ chối nhưng không thể gửi thông báo cho tác giả.');
                }
            }
        } catch (\Exception $e) {
            return redirect()->route('news.index')->with('error', 'Không thể từ chối tin tức do lỗi hệ thống. Vui lòng thử lại sau.');
        }
    }

    public function approve(Request $request, $matintuc)
    {


        $news = News::findOrFail($matintuc);
        try {
            if ($request->isMethod('patch')) {
                // Cập nhật trạng thái bài viết thành công khai
                $news->trangthai = 'public';
                $news->lydotuchoi = null; // Xóa lý do từ chối nếu có
                $news->save();

                // Gửi thông báo cho tác giả
                try {
                    $action = 'approve';
                    $author = $news->user; // Giả định News model có quan hệ với User
                    Notification::send($author, new NewsApproved($news, $action));
                    return redirect()->route('news.index')->with('success', 'Tin tức đã được duyệt và công khai.');
                } catch (\Exception $e) {
                    return redirect()->route('news.index')->with('error', 'Tin tức đã được duyệt nhưng không thể gửi thông báo cho tác giả.');
                }
            }
        } catch (\Exception $e) {
            return redirect()->route('news.index')->with('error', 'Không thể duyệt tin tức do lỗi hệ thống. Vui lòng thử lại sau.');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
        try {
            $news->delete();
            return redirect()->route('news.index')->with('success', 'Tin tức đã được xóa thành công!');
        } catch (\Exception $e) {
            return redirect()->route('news.index')->with('error', 'Không thể xóa tin tức. Vui lòng thử lại sau.');
        }
    }
}
