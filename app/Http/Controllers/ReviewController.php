<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index($productId)
    {
        $reviews = Review::where('product_id', $productId)->get();
        return response()->json($reviews);
    }

    public function store(Request $request, $productId)
    {
        $request->merge(['product_id' => $productId]);
        $review = Review::create($request->all());
        return response()->json($review, 201);
    }

    public function show($productId, $reviewId)
    {
        $review = Review::where('product_id', $productId)->find($reviewId);
        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }
        return response()->json($review);
    }

    public function update(Request $request, $productId, $reviewId)
    {
        $review = Review::where('product_id', $productId)->find($reviewId);
        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }
        $review->update($request->all());
        return response()->json($review);
    }

    public function destroy($productId, $reviewId)
    {
        $review = Review::where('product_id', $productId)->find($reviewId);
        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }
        $review->delete();
        return response()->json(['message' => 'Review deleted']);
    }
}
