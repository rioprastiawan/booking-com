<?php

/**
 * WishList.php
 *
 * @category Example
 * @package  Twlve/Bookingcom/Examples
 * @author   Rio Prastiawan <rioprastiawan19@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 */

use Twlve\Bookingcom\Booking;

require '../vendor/autoload.php';

$booking      = new Booking();

$authToken      = '';
$hotels         = ['3326463', '4984319'];

$booking->setAuthToken($authToken);

$createWishList       = $booking->createWishList();
echo json_encode($createWishList);
foreach($hotels as $hotel) {
    $saveWishList       = $booking->saveWishList($createWishList->data->id, $hotel);
    echo json_encode($saveWishList);
}
