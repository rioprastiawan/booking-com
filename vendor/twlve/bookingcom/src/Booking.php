<?php

/**
 * Booking.php
 *
 * @category    Class
 * @package     Twlve\Bookingcom
 * @author      Rio Prastiawan <rioprastiawan19@gmail.com>
 * @license     https://opensource.org/licenses/MIT MIT License
 */

namespace Twlve\Bookingcom;

use Twlve\Bookingcom\Http\Curl;
use Twlve\Bookingcom\Meta\Endpoint;
use Twlve\Bookingcom\Meta\Meta;

/**
 * Class Booking
 *
 * @category    Class
 * @package     Twlve\Bookingcom
 * @author      Rio Prastiawan <rioprastiawan19@gmail.com>
 * @license     https://opensource.org/licenses/MIT MIT License
 */
class Booking
{
    protected static $userOs;

    protected static $userVersion;

    protected static $deviceId;

    protected static $networkType;

    protected static $languageCode;

    protected static $display;

    protected static $affilateId;

    protected static $library;

    protected static $authorization;

    protected static $userAgent;

    protected static $bookingApiVersion;

    protected static $authToken;

    protected static $headers = [];

    protected static $queries = [];

    public function __construct()
    {
        self::$headers['X-LIBRARY']             = self::getLibrary();
        self::$headers['Authorization']         = self::getAuthorization();
        self::$headers['User-Agent']            = self::getUserAgent();
        self::$headers['X-Booking-API-Version'] = self::getBookingApiVersion();
        self::$headers['Content-Type']          = 'application/x-gzip; contains="application/json";charset=UTF-8';

        self::$queries['user_os']               = self::getUserOs();
        self::$queries['user_version']          = self::getUserVersion();
        self::$queries['device_id']             = self::getDeviceId();
        self::$queries['network_type']          = self::getNetworkType();
        self::$queries['languagecode']          = self::getLanguagecode();
        self::$queries['display']               = self::getDisplay();
        self::$queries['affiliate_id']          = self::getAffilateId();
    }

    /**
     * Header request
     *
     * @return array
     */
    public static function _headers()
    {
        $headers = array();

        if (self::$headers !== null) {
            foreach (self::$headers as $key => $record) {
                $headers[$key] = $record;
            }
        }

        return $headers;
    }

    /**
     * Header request
     *
     * @return array
     */
    public static function _queries()
    {
        $queries = '?';

        if (self::$queries !== null) {
            foreach (self::$queries as $key => $record) {
                $queries .= '&' . $key . '=' . $record;
            }
        }

        return $queries;
    }

    /**
     * Get library
     *
     * @return mixed
     */
    public static function getLibrary()
    {
        if (self::$library === null) {
            self::$library = Meta::LIBRARY;
        }

        return self::$library;
    }

    /**
     * Set library
     *
     * @param  string $library library
     *
     * @return void
     */
    public static function setLibrary($library = null): void
    {
        self::$library = $library;
    }

    /**
     * Get authorization
     *
     * @return mixed
     */
    public static function getAuthorization()
    {
        if (self::$authorization === null) {
            self::$authorization = Meta::AUTHORIZATION;
        }

        return self::$authorization;
    }

    /**
     * Set authorization
     *
     * @param  string $authorization authorization
     *
     * @return void
     */
    public static function setAuthorization($authorization = null): void
    {
        self::$authorization = $authorization;
    }

    /**
     * Get user agent
     *
     * @return mixed
     */
    public static function getUserAgent()
    {
        if (self::$userAgent === null) {
            self::$userAgent = Meta::USER_AGENT;
        }

        return self::$userAgent;
    }

    /**
     * Set user agent
     *
     * @param  string $userAgent user agent
     *
     * @return void
     */
    public static function setUserAgent($userAgent = null): void
    {
        self::$userAgent = $userAgent;
    }

    /**
     * Get booking api version
     *
     * @return mixed
     */
    public static function getBookingApiVersion()
    {
        if (self::$bookingApiVersion === null) {
            self::$bookingApiVersion = Meta::BOOKING_API_VERSION;
        }

        return self::$bookingApiVersion;
    }

    /**
     * Set booking api version
     *
     * @param  string $bookingApiVersion booking api version
     *
     * @return void
     */
    public static function setBookingApiVersion($bookingApiVersion = null): void
    {
        self::$bookingApiVersion = $bookingApiVersion;
    }

    /**
     * Get user os
     *
     * @return mixed
     */
    public static function getUserOs()
    {
        if (self::$userOs === null) {
            self::$userOs = Meta::USER_OS;
        }

        return self::$userOs;
    }

    /**
     * Set user os
     *
     * @param  string $userOs user os
     *
     * @return void
     */
    public static function setUserOs($userOs = null): void
    {
        self::$userOs = $userOs;
    }

    /**
     * Get user version
     *
     * @return mixed
     */
    public static function getUserVersion()
    {
        if (self::$userVersion === null) {
            self::$userVersion = Meta::USER_VERSION;
        }

        return self::$userVersion;
    }

    /**
     * Set user version
     *
     * @param  string $userVersion user os
     *
     * @return void
     */
    public static function setUserVersion($userVersion = null): void
    {
        self::$userVersion = $userVersion;
    }

    /**
     * Get device id
     *
     * @return mixed
     */
    public static function getDeviceId()
    {
        if (self::$deviceId === null) {
            self::$deviceId = gen_uuid();
        }

        return self::$deviceId;
    }

    /**
     * Set device id
     *
     * @param  string $deviceId device id
     *
     * @return void
     */
    public static function setDeviceId($deviceId = null): void
    {
        self::$deviceId = $deviceId;
    }

    /**
     * Get network type
     *
     * @return mixed
     */
    public static function getNetworkType()
    {
        if (self::$networkType === null) {
            self::$networkType = Meta::NETWORK_TYPE;
        }

        return self::$networkType;
    }

    /**
     * Set network type
     *
     * @param  string $networkType network type
     *
     * @return void
     */
    public static function setNetworkType($networkType = null): void
    {
        self::$networkType = $networkType;
    }

    /**
     * Get language code
     *
     * @return mixed
     */
    public static function getLanguagecode()
    {
        if (self::$languageCode === null) {
            self::$languageCode = Meta::LANGUAGECODE;
        }

        return self::$languageCode;
    }

    /**
     * Set language code
     *
     * @param  string $languageCode language code
     *
     * @return void
     */
    public static function setLanguagecode($languageCode = null): void
    {
        self::$languageCode = $languageCode;
    }

    /**
     * Get display
     *
     * @return mixed
     */
    public static function getDisplay()
    {
        if (self::$display === null) {
            self::$display = Meta::DISPLAY;
        }

        return self::$display;
    }

    /**
     * Set display
     *
     * @param  string $display display
     *
     * @return void
     */
    public static function setDisplay($display = null): void
    {
        self::$display = $display;
    }

    /**
     * Get affilate id
     *
     * @return mixed
     */
    public static function getAffilateId()
    {
        if (self::$affilateId === null) {
            self::$affilateId = Meta::AFFILATE_ID;
        }

        return self::$affilateId;
    }

    /**
     * Set affilate id
     *
     * @param  string $affilateId affilate id
     *
     * @return void
     */
    public static function setAffilateId($affilateId = null): void
    {
        self::$affilateId = $affilateId;
    }

    /**
     * Get auth token
     *
     * @return mixed
     */
    public static function getAuthToken()
    {
        return self::$authToken;
    }

    /**
     * Set auth token
     *
     * @param  string $authToken auth token
     *
     * @return void
     */
    public static function setAuthToken($authToken = null): void
    {
        self::$authToken = $authToken;
    }

    /**
     * Register
     *
     * @param  String                                      $email  e.g : example@gmail.com
     * @param  String                                      $password  e.g : bookingcom@12345
     *
     * @return \Twlve\Bookingcom\Response\RegisterResponse
     */

    public static function register($email, $password)
    {
        $curl = new Curl();

        $data = [
            'email' => $email,
            'password' => $password,
            'return_auth_token' => 1
        ];

        return $curl->post(Endpoint::REGISTER . self::_queries(), $data, self::_headers())->getResponse()->getResult();
    }

    /**
     * Logout
     *
     * @return \Twlve\Bookingcom\Response\LogoutResponse
     */

    public static function logout()
    {
        $curl = new Curl();

        $data = [
            'auth_token' => self::getAuthToken(),
            'device_id' => self::getDeviceId()
        ];

        return $curl->post(Endpoint::LOGOUT . self::_queries(), $data, self::_headers())->getResponse()->getResult();
    }

    /**
     * Create Wish List
     *
     * @return \Twlve\Gojek\Response\WishListResponse
     */

    public static function createWishList()
    {
        $curl = new Curl();

        self::$queries['auth_token']        = self::getAuthToken();
        self::$queries['wishlist_action']   = 'create_new_wishlist';
        self::$queries['name']              = 'Jakarta';
        self::$queries['hotel_id']          = '28250';

        $data = [];

        return $curl->post(Endpoint::WISHLIST . self::_queries(), $data, self::_headers())->getResponse()->getResult();
    }

    /**
     * Save Wish List
     *
     * @return \Twlve\Gojek\Response\WishListResponse
     */

    public static function saveWishList($listIds, $hotelId)
    {
        $curl = new Curl();

        self::$queries['auth_token']                = self::getAuthToken();
        self::$queries['wishlist_action']           = 'save_hotel_to_wishlists';
        self::$queries['list_ids']                  = $listIds;
        self::$queries['new_states']                = 1;
        self::$queries['hotel_id']                  = $hotelId;
        self::$queries['list_dest_id']              = 'city%3A%3A-2679652';
        self::$queries['update_list_search_config'] = 1;
        self::$queries['checkin']                   = '2020-07-27';
        self::$queries['checkout']                  = '2020-07-28';
        self::$queries['num_rooms']                 = 1;
        self::$queries['num_adults']                = 2;
        self::$queries['num_children']              = 0;

        $data = [];

        return $curl->post(Endpoint::WISHLIST . self::_queries(), $data, self::_headers())->getResponse()->getResult();
    }
}
