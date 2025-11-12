<?php

namespace App\Observers;

use App\Models\Rating;

class RatingObserver
{
    /**
     * Handle the Rating "created" event.
     *
     * @param  \App\Models\Rating  $rating
     * @return void
     */
    public function created(Rating $rating)
    {
        $this->updateAverageRating($rating);
    }

    /**
     * Handle the Rating "updated" event.
     *
     * @param  \App\Models\Rating  $rating
     * @return void
     */
    public function updated(Rating $rating)
    {
        $this->updateAverageRating($rating);
    }

    /**
     * Update the average rating for the product.
     *
     * @param  \App\Models\Rating  $rating
     * @return void
     */
    private function updateAverageRating(Rating $rating)
    {
        $product = $rating->product;
        $average = $product->ratings()->average('rating') ?? 0;
        $product->update(['average_rating' => $average]);
    }

    /**
     * Handle the Rating "deleted" event.
     *
     * @param  \App\Models\Rating  $rating
     * @return void
     */
    public function deleted(Rating $rating)
    {
        //
    }

    /**
     * Handle the Rating "restored" event.
     *
     * @param  \App\Models\Rating  $rating
     * @return void
     */
    public function restored(Rating $rating)
    {
        //
    }

    /**
     * Handle the Rating "force deleted" event.
     *
     * @param  \App\Models\Rating  $rating
     * @return void
     */
    public function forceDeleted(Rating $rating)
    {
        //
    }
}
