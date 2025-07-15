<?php
  
namespace App\Mail;
  
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
  
class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;
  
    public $bookingDetail;
    public $hotel_name;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bookingDetail)
    {
        $this->bookingDetail = $bookingDetail;
        $this->hotel_name = "Sandhya Group of Hotels";
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_USERNAME'),$this->hotel_name)->subject('Booking detail of Sandhya Group of hotels '.date('d-m-Y H:i:s'))
                    ->view('emails.myTestMail');
    }
}