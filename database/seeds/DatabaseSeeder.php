<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
         //insert some dummy records
         DB::table('governorates')->insert(array(
             array('name_en'=>'Al Asimah Governorate (Capital)','name_ar'=>'Al Asimah Governorate (Capital)','status'=>1,'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')),
             array('name_en'=>'Hawalli Governorate','name_ar'=>'Hawalli Governorate','status'=>1,'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')),
            array('name_en'=>'Farwaniya Governorate','name_ar'=>'Farwaniya Governorate','status'=>1,'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')),
             array('name_en'=>'Mubarak Al-Kabeer Governorate','name_ar'=>'Mubarak Al-Kabeer Governorate','status'=>1,'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')),
             array('name_en'=>'Ahmadi Governorate','name_ar'=>'Ahmadi Governorate','status'=>1,'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')),
             array('name_en'=>'Jahra Governorate','name_ar'=>'Jahra Governorate','status'=>1,'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')),
          ));
    }
}
