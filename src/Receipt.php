<?php
namespace TDD;
use \BadMethodCallException;
class Receipt {
    public function total(array $items = [], $coupon) {
        // add a check for if the coupon is greater than 1.00 (100%)
        //if case, have it throw a bad method call exception
        if ($coupon > 1.00) {
            throw new BadMethodCallException('Coupon must be less than or equal to 1.00');
        }
        $sum = array_sum($items);
        if (!is_null($coupon)) {
            return $sum - ($sum * $coupon);
        }
        return $sum;
    }
    public function tax($amount, $tax) {
        return ($amount * $tax);
    }
    public function postTaxTotal($items, $tax, $coupon) {
        $subtotal = $this->total($items, $coupon);
        return $subtotal + $this->tax($subtotal, $tax);
    }
}
