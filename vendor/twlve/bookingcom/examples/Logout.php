<?php

/**
 * Logout.php
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

$booking->setAuthToken($authToken);

$logout       = $booking->logout();

echo json_encode($logout);
