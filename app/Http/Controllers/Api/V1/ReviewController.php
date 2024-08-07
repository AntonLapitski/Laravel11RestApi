<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Resources\V1\ReviewResource;
use App\Models\Review;
use App\Notifications\TestNotification;

class ReviewController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewRequest $request)
    {

        $users = User::all();

        foreach ($users as $user) {

            \Illuminate\Notifications\Notification::sendNow($user, new TestNotification());
        }

        return new ReviewResource(Review::create($request->all()));

    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        return new ReviewResource($review);
    }

}
