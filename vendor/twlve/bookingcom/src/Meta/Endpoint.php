<?php

/**
 * Endpoint.php
 *
 * @category    Class
 * @package     Twlve\Bookingcom\Meta
 * @author      Rio Prastiawan <rioprastiawan19@gmail.com>
 * @license     https://opensource.org/licenses/MIT MIT License
 */

namespace Twlve\Bookingcom\Meta;

/**
 * Class Endpoint
 *
 * @category    Class
 * @package     Twlve\Bookingcom\Meta
 * @author      Rio Prastiawan <rioprastiawan19@gmail.com>
 * @license     https://opensource.org/licenses/MIT MIT License
 */
class Endpoint
{
    /**
     * Base url
     */
    const BASE_ENDPOINT = 'https://iphone-xml.booking.com/json/';

    /**
     * Authentication
     */
    const REGISTER      = self::BASE_ENDPOINT . 'mobile.createUserAccount';
    const LOGOUT        = self::BASE_ENDPOINT . 'mobile.logout';

    /**
     * Wishlist
     */
    const WISHLIST      = self::BASE_ENDPOINT . 'mobile.Wishlist';
}
