<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\InvitePeopleMail;
use Mail;

class InviteTimeLineJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $emails;
    protected $id;
    public function __construct($emails,$id)
    {
        $this->emails = $emails;
        $this->id=$id;
       
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach( $this->emails as $em)
        {
           $email = new InvitePeopleMail();
           Mail::to($em)->send($email); 
        }
        
    }
}
