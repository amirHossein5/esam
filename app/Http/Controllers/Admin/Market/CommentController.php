<?php

namespace App\Http\Controllers\Admin\Market;

use App\Models\Comment;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mews\Purifier\Facades\Purifier;
use App\Http\Controllers\Controller;
use App\Models\Market\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        DB::table('comments')
            ->where(function ($query) {
                $query->where('seen', false);
                $query->orWhere('commentable_type', Product::class);
            })->update(['seen' => true]);

        if (request()->wantsJson()) {
            return datatables(
                Comment::forProducts()
                    ->with('author:id,first_name,last_name', 'commentable:id,name', 'parent:id,body')
                    ->skip(request()->start)
                    ->take(request()->length)
                    ->get()
                )->toJson();
        }

        return view('admin.market.comment.index');
    }

    public function show(Comment $comment): View
    {
        $comment->load('commentable', 'author');

        return view('admin.market.comment.show', compact('comment'));
    }

    public function store(Request $request, Comment $comment): RedirectResponse
    {
        if ($comment->parent_id) {
            return redirect()->route('admin.market.comment.index');
        }

        $request = $request->validate([
            'body' => 'required|string'
        ]);

        $request['body'] = Purifier::clean($request['body']);
        $request['author_id'] = 1;
        $request['commentable_id'] = $comment->commentable_id;
        $request['commentable_type'] = $comment->commentable_type;
        $request['approved'] = true;
        $request['status'] = true;

        $comment->children()->create($request);

        return redirect()
            ->route('admin.market.comment.index')
            ->with('sweetalert-mixin-success', ' با موفقیت ساخته شد');
    }

    public function changeStatus(Comment $comment): Response
    {
        $comment->status = !$comment->status;
        $result = $comment->save();

        return $result
            ? response(['checked' => $comment->status])
            : response('', 500);
    }

    public function approved(Comment $comment): Response
    {
        $comment->approved = !$comment->approved;
        $result = $comment->save();

        return $result
            ? response(['approved' => $comment->approved])
            : response('', 500);
    }
}
