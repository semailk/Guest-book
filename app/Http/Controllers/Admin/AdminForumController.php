<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Comment;
use Illuminate\Http\Request;

class AdminForumController extends Controller
{
    public function notViewed()
    {
        $messages = Comment::query()->where('check_at', '=', 0)->get();
        return view('admin.notViewed', compact('messages'));
    }

    public function viewed()
    {
        $messages = Comment::query()->where('check_at', '=', 1)->get();
        return view('admin.viewed', compact('messages'));
    }

    public function update($id)
    {
        Comment::query()->find($id)->update(['check_at' => 1]);
        return back()->with(['success' => 'Запись успешно добавлена']);
    }

    public function delete($id)
    {
        Comment::query()->find($id)->delete();
        return back()->with(['success' => 'Запись удалена']);
    }
}
