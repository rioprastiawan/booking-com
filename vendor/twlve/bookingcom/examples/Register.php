<?php

/**
 * Register.php
 *
 * @category Example
 * @package  Twlve/Bookingcom/Examples
 * @author   Rio Prastiawan <rioprastiawan19@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 */

use Twlve\Bookingcom\Booking;

require '../vendor/autoload.php';

$booking      = new Booking();

$email          = '';
$password       = '';

$register       = $booking->register($email, $password);

echo json_encode($register);
