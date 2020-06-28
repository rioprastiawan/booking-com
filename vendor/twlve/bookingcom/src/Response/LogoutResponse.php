<?php

/**
 * LogoutResponse.php
 *
 * @category    Class
 * @package     Twlve\Bookingcom\Response
 * @author      Rio Prastiawan <rioprastiawan19@gmail.com>
 * @license     https://opensource.org/licenses/MIT MIT License
 */

namespace Twlve\Bookingcom\Response;

use stdClass;

/**
 * Class LogoutResponse
 *
 * @category    Class
 * @package     Twlve\Bookingcom\Response
 * @author      Rio Prastiawan <rioprastiawan19@gmail.com>
 * @license     https://opensource.org/licenses/MIT MIT License
 */
class LogoutResponse
{
    private $success;
    private $errorMessage;
    private $data;

    public function __construct($response)
    {
        $this->success      = isset($response->message) ? ($response->message == 'ok' ? true : false) : false;
        $this->errorMessage = null;
        $this->data         = null;
    }

    public function getResult()
    {
        $result                 = new stdClass;
        $result->success        = $this->success;
        $result->error_message  = $this->errorMessage;
        $result->data           = $this->data;

        return $result;
    }
}
