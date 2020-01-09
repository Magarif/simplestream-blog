<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentsFormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{

    /**
     * Generate new comment
     *
     * @param CommentsFormRequest $request
     * @return RedirectResponse
     */
    public function newComment(CommentsFormRequest $request)
    {
        $user = Auth::user();
        $comment = new Comment([
            'user_id' => $user->getAuthIdentifier(),
            'post_id' => $request->get('post_id'),
            'text' => $request->get('text')
        ]);

        $comment->save();
        return redirect()->back()->with('status', 'Your comment has been created!');
    }
}
