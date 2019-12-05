<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ReserveShipment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $shipments;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($shipments)
    {
        $this->shipments = $shipments;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->shipments as $shipment) {
            if ($shipment != null && $shipment->status == 5) {
                $shipment->update([
                    'status' => 1,
                ]);
            }
        }
    }
}
