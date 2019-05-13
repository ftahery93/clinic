<?php

namespace App\Helpers;


use DB;
use Carbon\Carbon;

class Cron {

    public static function moveClassSeats() {
        //Get Vendorname
        $classes = DB::table('classes')
                ->select('id', 'temp_num_seats', 'temp_gym_seats','temp_fitflow_seats','temp_price','temp_commission_perc','temp_commission_kd')
                ->where('approved_status', 1)
                ->whereNotNull('temp_num_seats')
                ->whereNotNull('temp_gym_seats')
                ->whereNotNull('temp_fitflow_seats')
                ->whereNotNull('temp_price')
                ->get();

        foreach ($classes as $class) {

            $update = array('num_seats' => $class->temp_num_seats,'available_seats' => $class->temp_gym_seats, 'fitflow_seats' => $class->temp_fitflow_seats
                    ,'price' => $class->temp_price);
            $upd = DB::table('classes')
                    ->where('id', $class->id)
                    ->update($update);
          
           
                $updateNull = array('temp_num_seats' => null,'temp_gym_seats' => null, 'temp_fitflow_seats' => null, 'temp_price' => null
                    , 'temp_commission_perc' => null, 'temp_commission_kd' => null);
                DB::table('classes')
                        ->where('id', $class->id)
                        ->update($updateNull);
            
        }
    }

    
}
