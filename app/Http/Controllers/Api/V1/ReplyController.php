<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReplyRequest;
use App\Http\Resources\V1\ReplyResource;
use App\Models\Reply;
use App\Models\Review;
use App\Models\User;
use App\Notifications\TestNotification;
use function Symfony\Component\Clock\get;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ReplyResource::collection(Reply::with('review')->paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReplyRequest $request)
    {
        if (auth()->user()->is_admin === 1) {


            $user_id = Review::where('id', $request->get('review_id'))->get(['user_id']);

            $user = User::find($user_id);

            \Illuminate\Notifications\Notification::sendNow($user, new TestNotification());

            return new ReplyResource(Reply::create($request->all()));

        } else {
            return json_encode(['error' => 'user is not admin']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Reply $post)
    {
        return new ReplyResource($post);
    }

}
