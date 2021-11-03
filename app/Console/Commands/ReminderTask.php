<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Randevu;
use Mail;
class ReminderTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Reminder:Start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date=date('Y-m-d');
        $nextDate=date('Y-m-d',strtotime("+1 Day",time()));
        $list=Randevu::whereIn('date',[$date,$nextDate])->where('isAktive',1)->where('isSend',0)->with('randevusaati')->get();

        foreach ($list as $l)
        {
           $details = [
            'title' => 'Bu Mail VedatKurtay.com tarafından gönderilmiştir.',
            'body' => 'Bu bir test mailidir.'
        ];

        

        


            if($l->notification_type == 1) {
                $details  = [
                  'name'=>$l->fullname,
                  'email'=>$l->email,
                  'date'=>$l->date,
                  'time'=>$l->randevusaati->hours,
                  'code'=>$l->code
                  
                ];

                try {
                    Mail::to($l->email)->send(new \App\Mail\MyTestMail($details));
                    Randevu::where('id',$l->id)->update(['isSend'=>1]);
                }
                catch (\Exception $e)
                {
                    Randevu::where('id', $l->id)->update(['isSend' => 2]);
                }
            }
        }
    }
}
