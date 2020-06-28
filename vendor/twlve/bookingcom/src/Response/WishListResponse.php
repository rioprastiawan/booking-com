<?php

/**
 * WishListResponse.php
 *
 * @category    Class
 * @package     Twlve\Bookingcom\Response
 * @author      Rio Prastiawan <rioprastiawan19@gmail.com>
 * @license     https://opensource.org/licenses/MIT MIT License
 */

namespace Twlve\Bookingcom\Response;

use stdClass;

/**
 * Class WishListResponse
 *
 * @category    Class
 * @package     Twlve\Bookingcom\Response
 * @author      Rio Prastiawan <rioprastiawan19@gmail.com>
 * @license     https://opensource.org/licenses/MIT MIT License
 */
class WishListResponse
{
    private $success;
    private $errorMessage;
    private $data;

    public function __construct($response)
    {
        $this->success      = isset($response->success) ? ($response->success == 1 ? true : false) : false;
        $this->errorMessage = isset($response->gta_add_three_items_campaign_status->status) ? $response->gta_add_three_items_campaign_status->status : null;
        $this->data         = $this->success ? $response : null;
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
