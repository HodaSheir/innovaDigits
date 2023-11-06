<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use App\Notifications\LowProductQuantityNotification;
use Illuminate\Support\Facades\Notification;
class CheckProductQuantities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:check-quantities';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check product quantities and send notifications';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $lowQuantityProducts = Product::where('quantity', '<', 5)->get();

        foreach ($lowQuantityProducts as $product) {
            // Notify the vendor
            Notification::send($product->vendor, new LowProductQuantityNotification($product));
        }

        $this->info('Low product quantity check completed.');
    
    }
}
