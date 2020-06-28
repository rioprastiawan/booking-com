<?php

/**
 * NoConnectionResponse.php
 *
 * @category    Class
 * @package     Twlve\Bookingcom\Response
 * @author      Rio Prastiawan <rioprastiawan19@gmail.com>
 * @license     https://opensource.org/licenses/MIT MIT License
 */

namespace Twlve\Bookingcom\Response;

use stdClass;

/**
 * Class NoConnectionResponse
 *
 * @category    Class
 * @package     Twlve\Bookingcom\Response
 * @author      Rio Prastiawan <rioprastiawan19@gmail.com>
 * @license     https://opensource.org/licenses/MIT MIT License
 */
class NoConnectionResponse
{
    public function getResult()
    {
        $result                   = new stdClass;
        $result->success          = false;
        $result->error_message    = 'Tidak ada koneksi.';
        $result->data             = null;

        return $result;
    }
}
