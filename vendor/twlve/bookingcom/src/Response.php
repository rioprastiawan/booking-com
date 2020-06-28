<?php

/**
 * Response.php
 *
 * @category    Class
 * @package     Twlve\Bookingcom
 * @author      Rio Prastiawan <rioprastiawan19@gmail.com>
 * @license     https://opensource.org/licenses/MIT MIT License
 */

namespace Twlve\Bookingcom;

use Twlve\Bookingcom\Response\LogoutResponse;
use Twlve\Bookingcom\Response\NoConnectionResponse;
use Twlve\Bookingcom\Response\RegisterResponse;
use Twlve\Bookingcom\Response\WishListResponse;

/**
 * Class Response
 *
 * @category    Class
 * @package     Twlve\Bookingcom
 * @author      Rio Prastiawan <rioprastiawan19@gmail.com>
 * @license     https://opensource.org/licenses/MIT MIT License
 */
class Response
{
    /**
     * store Class
     *
     * @var array
     */
    public $storeClass = [];

    private $response;

    /**
     * Parse response init
     *
     * @param mixed  $result
     * @param string $url
     */
    public function __construct($result, $httpcode, $url)
    {
        $response = json_decode($result);

        $parts = parse_url($url);

        if ($httpcode == 0) {
            $this->response = new NoConnectionResponse();
        } else {
            if ($parts['path'] == '/json/mobile.createUserAccount') {
                $this->response = new RegisterResponse($response);
            } else if ($parts['path'] == '/json/mobile.logout') {
                $this->response = new LogoutResponse($response);
            } else if ($parts['path'] == '/json/mobile.Wishlist') {
                $this->response = new WishListResponse($response);
            } else {
                $this->response = new NoConnectionResponse();
            }
        }
    }

    /**
     * Get response following by class
     *
     * @return void
     */
    public function getResponse()
    {
        return $this->response;
    }
}
