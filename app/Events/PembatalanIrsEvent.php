<?php

namespace App\Notifications;

use App\Models\Irs;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class PembatalanIrsEvent extends Notification
{
    
    protected $irs;

    public function __construct(Irs $irs)
    {
        $this->irs = $irs;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail']; // Menggunakan email sebagai saluran notifikasi
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Pengajuan Pembatalan IRS')
                    ->greeting('Halo Dosen,')
                    ->line('Mahasiswa dengan NIM ' . $this->irs->nim . ' telah mengajukan pembatalan untuk IRS berikut:')
                    ->line('Mata Kuliah: ' . $this->irs->matakuliah->nama)  // Asumsikan matakuliah ada relasinya
                    ->line('Semester: ' . $this->irs->semester)
                    ->action('Lihat IRS', url('/irs/' . $this->irs->id)) // URL untuk melihat IRS
                    ->line('Mohon untuk memproses pembatalan ini.');
    }

    /**
     * Build the database representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return void
     */
    public function toDatabase($notifiable)
    {
        return [
            'irs_id' => $this->irs->id,
            'nim' => $this->irs->nim,
            'semester' => $this->irs->semester,
            'status' => $this->irs->status_irs,
        ];
    }
}
