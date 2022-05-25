<?php

namespace App\Jobs;

use App\Services\ConvertJpegImage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ConvertJPEGJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $request,$action;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request,$action)
    {
        $this->request = $request;
        $this->action = $action;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->action == 'convertToJPEG'){
            ConvertJpegImage::toJpeg($this->request);
        }else{
            ConvertJpegImage::fromJpeg($this->request);
        }
    }
}
