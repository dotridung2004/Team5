<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedbacks = Feedback::paginate(10);
        $updated_at = Feedback::orderBy('updated_at', 'desc')->first();
        return view('feedbacks.index', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('feedbacks.create');
    }

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        return view('feedbacks.show', compact('feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback)
    {
        return view('feedbacks.edit', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeedbackRequest $request, Feedback $feedback)
    {
        $feedback->update($request->validated());
        return redirect()->route('feedbacks.index')->with('success', 'Feedback updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->route('feedbacks.index')->with('success', 'Feedback deleted successfully.');
    }
    public function store(Request $request, $id)
    {
        $request->validate([
            'nguoigui' => 'required|string|max:255',
            'noidung' => 'required|string',
        ]);

        Feedback::create([
            'mathacmac' => Str::uuid()->toString(),
            'nguoigui' => Auth::user()->tentaikhoan,  // Lấy từ tài khoản đăng nhập
            'noidung' => $request->noidung,
            'mabaiviet' => $id,
            'ngaythacmac' => now(),
            'trangthai' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Bình luận đã được gửi thành công!');
    }

    public function storeReply(Request $request, $mathacmac)
    {
        // Kiểm tra tham số 'reply_content' có trong URL không
        if (!$request->has('reply_content')) {
            return response()->json(['error' => 'Nội dung phản hồi không được để trống!'], 400);
        }

        // Lấy nội dung phản hồi từ query string
        $replyContent = $request->query('reply_content');

        // Kiểm tra độ dài phản hồi
        if (strlen($replyContent) > 500) {
            return response()->json(['error' => 'Nội dung phản hồi không được quá 500 ký tự!'], 400);
        }

        // Lấy phản hồi từ CSDL
        $feedback = Feedback::where('mathacmac', $mathacmac)->firstOrFail();

        // Cập nhật phản hồi và trạng thái
        $feedback->phanhoi = $replyContent;
        $feedback->trangthai = 'resolved';
        $feedback->ngayphanhoi = now();
        $feedback->nguoiphanhoi = Auth::user()->tentaikhoan;
        $feedback->save();

        return response()->json(['success' => 'Phản hồi đã được gửi thành công!']);
    }
}
