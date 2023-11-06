<?php

namespace App\Console\Commands;

use App\Mail\ProductExpiryNotification;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class CheckProductExpiry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:check-expiry';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check product expiry and send email alerts';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $productsToAlert = Product::whereDate('expiration_date', '<=', Carbon::now()->addMonth())
            ->whereDate('expiration_date', '>', Carbon::now())
            ->get();
        foreach ($productsToAlert as $product) {
            $vendor_id = $product->vendor_id;
            $vendor = Vendor::findOrFail($vendor_id);
            $vendor_mail = $vendor->user->email;
            Mail::to($vendor_mail)->send(new ProductExpiryNotification($product));
        }

        $this->info('Product expiry check completed.');
    }
}
