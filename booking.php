<?php

use Twlve\Bookingcom\Booking;

require 'vendor/autoload.php';

$booking = new Booking();
$hotels  = ['3326463', '4984319'];

echo "\n[*] Register";
echo "\n------------------\n";

echo "[+] Email : ";
$email = trim(fgets(STDIN));

echo "[+] Password : ";
$password = trim(fgets(STDIN));

$register = $booking->register($email, $password);

if (!$register->success) {
    checkConnection($register);
    echo "\n[!] ERROR : " . $register->error_message . "\n";
    die();
}

echo "\n[*] Register Success | {$email} : {$password}\n";

echo "\n[*] Claim Reward";

$booking->setAuthToken($register->data->auth_token);
$createWishList = $booking->createWishList();

if (!$createWishList->success) {
    checkConnection($createWishList);
    echo "\n\n[!] ERROR : " . $createWishList->error_message . "\n";
    die();
}

foreach ($hotels as $hotel) {
    $saveWishList = $booking->saveWishList($createWishList->data->id, $hotel);
    if (!$saveWishList->success) {
        checkConnection($saveWishList);
        echo "\n\n[!] ERROR : " . $saveWishList->error_message . "\n";
        die();
    }

    if ($saveWishList->data->gta_add_three_items_campaign_status->status == 'reward_given_wallet') {
        echo "\n\n[*] " . $saveWishList->data->gta_add_three_items_campaign_status->modal_body_text . "\n";
        echo "[*] " . $saveWishList->data->gta_add_three_items_campaign_status->modal_header_text . "\n";

        echo "\n[*] Logout\n";
        $logout = $booking->logout();
        die();
    }
}

function checkConnection($data)
{
    if (strtolower($data->error_message) == 'no connection') {
        echo "\n\n";
        echo "[!] ERROR : " . $data->error_message . "\n";
        echo " ______     ________ ______     ________ _ _ _ \n";
        echo "|  _ \ \   / /  ____|  _ \ \   / /  ____| | | |\n";
        echo "| |_) \ \_/ /| |__  | |_) \ \_/ /| |__  | | | |\n";
        echo "|  _ < \   / |  __| |  _ < \   / |  __| | | | |\n";
        echo "| |_) | | |  | |____| |_) | | |  | |____|_|_|_|\n";
        echo "|____/  |_|  |______|____/  |_|  |______(_|_|_)\n";
        echo "  _____ _    _ _    _ _______ _____   ______          ___   _ _ _ _ \n";
        echo " / ____| |  | | |  | |__   __|  __ \ / __ \ \        / / \ | | | | |\n";
        echo "| (___ | |__| | |  | |  | |  | |  | | |  | \ \  /\  / /|  \| | | | |\n";
        echo " \___ \|  __  | |  | |  | |  | |  | | |  | |\ \/  \/ / | . ` | | | |\n";
        echo " ____) | |  | | |__| |  | |  | |__| | |__| | \  /\  /  | |\  |_|_|_|\n";
        echo "|_____/|_|  |_|\____/   |_|  |_____/ \____/   \/  \/   |_| \_(_|_|_)\n";
        sleep(2);
        die();
    }
}
