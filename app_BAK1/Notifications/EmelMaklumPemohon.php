<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Illuminate\Support\Facades\Storage;

class EmelMaklumPemohon extends Notification
{
    use Queueable;

    private $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $data )// User $new_user)
    {
        //
        $this->data = $data;

        //dd($this->data);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        

        return (new MailMessage)

        //->to($this->data->emails)
        
        /*
        ->attach(  Storage::disk('local')->path('pdf/'.$this->data["retNamaFilePdf"] ) , [
            'as' => $this->data["retNamaFilePdf"], 
            'mime' => 'application/pdf'
        ])
        */
            ->subject("MAKLUMAN ".config("app.name"))

            //->line($this->data["greeting_emel"])

            ->line($this->data["detail_pemohon"])

            ->line($this->data["msg_emel"])

            //->action('Kindly Login', route('login'))

            ->line("")

            ->line($this->data["nota_emel"])

            ->line("") ->line("<br/><br/>")

            ->line(strtoupper('Sekian, terima kasih.'))

            ->line("")
            
            ->line(strtoupper("Agensi Pengurusan Bencana Negara (NADMA)<br/>Jabatan Perdana Menteri<br/>".
            "Aras 7, Blok D5, Kompleks D<br/>Pusat Pentadbiran Kerajaan Persekutuan<br/>".
            "62502 PUTRAJAYA"));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
