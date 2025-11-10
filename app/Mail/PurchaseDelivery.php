<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PurchaseDelivery extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        switch ($this->order->email_template) {
            case "purchaseDelivery_shopify":
                return $this->subject('Order #'.$this->order->order_number.' is ready!')->markdown('emails.purchase.purchaseDelivery_shopify');
                break;
            case "codeDelivery_default":
                return $this->subject('Your Horsenality Promo Code is ready!')->markdown('emails.purchase.codeDelivery_default');
                break;
            case "codeDelivery_savvyClubVoucher":
                return $this->subject('Your Savvy Premium Horsenality Code is ready!')->markdown('emails.purchase.codeDelivery_savvyClubVoucher');
                break;
            default:
                return $this->subject('Order #'.$this->order->order_number.' is ready!')->markdown('emails.purchase.purchaseDelivery_shopify');
        }
    }
}
