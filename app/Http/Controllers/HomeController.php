<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Model\Comment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $messages =  Comment::query()->where('check_at', '=', 1)->get();
        return view('forum.index',compact('messages'));
    }

    public function store(CommentRequest $request)
    {
        $imgSave = $request->file('img')->store('uploads','public');
        Comment::query()->create(['message' => $request->input('message'),
            'checked_at' => 0,
            'img' => $imgSave
        ]);
        return back()->with(['success' => 'Сообщение успешно отправлено!']);
    }
}
