<?php

namespace App\Services;

class TripService
{
    public function calculatePromoPrice($price)
    {
        if ($price < 5000) {
            return $price;
        } elseif ($price < 10000) {
            return $price - 2500;
        } else {
            return $price - 5000;
        }
    }
}
