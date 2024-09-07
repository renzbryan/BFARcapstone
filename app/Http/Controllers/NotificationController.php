<?php

namespace App\Http\Controllers;
use App\Services\FCMService;
use Illuminate\Http\Request;
use App\Models\Item;
class NotificationController extends Controller
{
    protected $fcmService;
    public function __construct(FCMService $fcmService)
    {
        $this->fcmService = $fcmService;
    }
    public function sendLowStockNotification($deviceToken, Item $product)
    {
        $title = "Low Stock Alert";
        $body = "The product {$product->name} is running low in stock. Only {$product->stock} left!";

        // Use the FCMService to send the notification
        $this->fcmService->sendNotification($deviceToken, $title, $body);
    }


}
