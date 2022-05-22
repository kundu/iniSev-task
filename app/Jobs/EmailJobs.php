<?php

namespace App\Jobs;

use App\Mail\AdminEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EmailJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $type;
    public $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($type, $data)
    {
        $this->type    = $type;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->type == "new-notice"){
            $details = [
                'subject' => 'New Notice Alert !!!',
                'body'    => 'New notice is posted. Please log in to your admin panel and approve it.',
                'name'    => $this->data->name
            ];
            Mail::to($this->data->email)->send(new AdminEmail($details));
        }

    }
}
