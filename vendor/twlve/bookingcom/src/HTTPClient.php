<?php

/**
 * HTTPClient.php
 *
 * @category    Interface
 * @package     Twlve\Bookingcom
 * @author      Rio Prastiawan <rioprastiawan19@gmail.com>
 * @license     https://opensource.org/licenses/MIT MIT License
 */

namespace Twlve\Bookingcom;

/**
 * Interface HTTPClient
 *
 * @category    Interface
 * @package     Twlve\Bookingcom
 * @author      Rio Prastiawan <rioprastiawan19@gmail.com>
 * @license     https://opensource.org/licenses/MIT MIT License
 */
interface HTTPClient
{
    /**
     * Send get request
     *
     * @param  string                $url
     * @param  array                 $data
     * @param  array                 $headers
     *
     * @return \Twlve\Bookingcom\Response
     */
    public function get($url, $data, $headers);

    /**
     * Send post request
     *
     * @param  string                $url
     * @param  array                 $data
     * @param  array                 $headers
     *
     * @return \Twlve\Bookingcom\Response
     */
    public function post($url, $data, $headers);

    /**
     * Send patch request
     *
     * @param  string                $url
     * @param  array                 $data
     * @param  array                 $headers
     *
     * @return \Twlve\Bookingcom\Response
     */
    public function patch($url, $data, $headers);

    /**
     * Send put request
     *
     * @param  string                $url
     * @param  array                 $data
     * @param  array                 $headers
     *
     * @return \Twlve\Bookingcom\Response
     */
    public function put($url, $data, $headers);

    /**
     * Send delete request
     *
     * @param  string                $url
     * @param  array                 $data
     * @param  array                 $headers
     *
     * @return \Twlve\Bookingcom\Response
     */
    public function delete($url, $data, $headers);
}
