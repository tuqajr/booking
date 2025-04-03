<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class AdminReviewsController extends Controller
{
    public function index(Request $request) {

        $reviews = Review::with(['user', 'hotel'])->orderBy('is_approved', 'asc')->paginate(7);
        if ($request->ajax()) {
            return view('admin.reviews.table', compact('reviews'))->render();
        }
    
        return view('admin.reviews.index', compact('reviews'));
    
    }


    public function update(Request $request, $id, $actionType) {

    $review = Review::findOrFail($id);

        if ($actionType === 'approve') {
            $review->is_approved = 1;
            $message = 'The review has been approved successfully!';
        } elseif ($actionType === 'reject') {
            $review->is_approved = 0;
            $message = 'The review has been rejected successfully!';
        } else {
            return redirect()->back()->with('error', 'Invalid action.');
        }
        $review->save();

        return redirect()->back()->with('success', $message);
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete(); // This sets the 'deleted_at' timestamp

        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully!');
    }
}