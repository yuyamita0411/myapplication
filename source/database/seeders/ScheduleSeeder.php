<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // articlesテーブルにデータをinsert
        DB::table('schedules')->insert([
            ['title' => 'タイトル1','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要1','starttime' => '2022-2-1','endtime' => '2022-2-5','groupid' => 1,'taskid' => 1,'companyid' => 1],
            ['title' => 'タイトル2','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要2','starttime' => '2022-2-2','endtime' => '2022-2-6','groupid' => 2,'taskid' => 2,'companyid' => 2],
            ['title' => 'タイトル3','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要3','starttime' => '2022-2-3','endtime' => '2022-2-7','groupid' => 3,'taskid' => 3,'companyid' => 1],
            ['title' => 'タイトル4','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要4','starttime' => '2022-2-4','endtime' => '2022-2-8','groupid' => 4,'taskid' => 4,'companyid' => 2],
            ['title' => 'タイトル5','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要5','starttime' => '2022-2-5','endtime' => '2022-2-9','groupid' => 5,'taskid' => 5,'companyid' => 1],
            ['title' => 'タイトル6','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要6','starttime' => '2022-2-6','endtime' => '2022-2-10','groupid' => 6,'taskid' => 6,'companyid' => 2],
            ['title' => 'タイトル7','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要7','starttime' => '2022-2-7','endtime' => '2022-2-11','groupid' => 7,'taskid' => 7,'companyid' => 1],
            ['title' => 'タイトル8','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要8','starttime' => '2022-2-8','endtime' => '2022-2-12','groupid' => 8,'taskid' => 8,'companyid' => 2],
            ['title' => 'タイトル9','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要9','starttime' => '2022-2-9','endtime' => '2022-2-13','groupid' => 9,'taskid' => 9,'companyid' => 1],
            ['title' => 'タイトル10','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要10','starttime' => '2022-2-10','endtime' => '2022-2-14','groupid' => 10,'taskid' => 10,'companyid' => 2],
            ['title' => 'タイトル11','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要11','starttime' => '2022-2-11','endtime' => '2022-2-15','groupid' => 11,'taskid' => 11,'companyid' => 1],
            ['title' => 'タイトル12','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要12','starttime' => '2022-2-12','endtime' => '2022-2-16','groupid' => 12,'taskid' => 12,'companyid' => 2],
            ['title' => 'タイトル13','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要13','starttime' => '2022-2-13','endtime' => '2022-2-17','groupid' => 1,'taskid' => 13,'companyid' => 1],
            ['title' => 'タイトル14','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要14','starttime' => '2022-2-14','endtime' => '2022-2-18','groupid' => 2,'taskid' => 14,'companyid' => 2],
            ['title' => 'タイトル15','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要15','starttime' => '2022-2-15','endtime' => '2022-2-19','groupid' => 3,'taskid' => 15,'companyid' => 1],
            ['title' => 'タイトル16','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要16','starttime' => '2022-2-16','endtime' => '2022-2-20','groupid' => 4,'taskid' => 16,'companyid' => 2],
            ['title' => 'タイトル17','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要17','starttime' => '2022-2-17','endtime' => '2022-2-21','groupid' => 5,'taskid' => 17,'companyid' => 1],
            ['title' => 'タイトル18','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要18','starttime' => '2022-2-18','endtime' => '2022-2-22','groupid' => 6,'taskid' => 18,'companyid' => 2],
            ['title' => 'タイトル19','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要19','starttime' => '2022-2-19','endtime' => '2022-2-23','groupid' => 7,'taskid' => 19,'companyid' => 1],
            ['title' => 'タイトル20','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要20','starttime' => '2022-2-20','endtime' => '2022-2-24','groupid' => 8,'taskid' => 20,'companyid' => 2],
            ['title' => 'タイトル21','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要21','starttime' => '2022-2-21','endtime' => '2022-2-25','groupid' => 9,'taskid' => 21,'companyid' => 1],
            ['title' => 'タイトル22','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要22','starttime' => '2022-2-22','endtime' => '2022-2-26','groupid' => 10,'taskid' => 22,'companyid' => 2],
            ['title' => 'タイトル23','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要23','starttime' => '2022-2-23','endtime' => '2022-2-27','groupid' => 11,'taskid' => 23,'companyid' => 1],
            ['title' => 'タイトル24','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要24','starttime' => '2022-2-24','endtime' => '2022-2-28','groupid' => 12,'taskid' => 24,'companyid' => 2],
            ['title' => 'タイトル25','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要25','starttime' => '2022-2-25','endtime' => '2022-3-1','groupid' => 1,'taskid' => 25,'companyid' => 1],
            ['title' => 'タイトル26','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要26','starttime' => '2022-2-26','endtime' => '2022-3-2','groupid' => 2,'taskid' => 26,'companyid' => 2],
            ['title' => 'タイトル27','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要27','starttime' => '2022-2-27','endtime' => '2022-3-3','groupid' => 3,'taskid' => 27,'companyid' => 1],
            ['title' => 'タイトル28','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要28','starttime' => '2022-2-28','endtime' => '2022-3-4','groupid' => 4,'taskid' => 28,'companyid' => 2],
            ['title' => 'タイトル29','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要29','starttime' => '2022-3-1','endtime' => '2022-3-5','groupid' => 5,'taskid' => 29,'companyid' => 1],
            ['title' => 'タイトル30','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要30','starttime' => '2022-3-2','endtime' => '2022-3-6','groupid' => 6,'taskid' => 30,'companyid' => 2],
            ['title' => 'タイトル31','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要31','starttime' => '2022-3-3','endtime' => '2022-3-7','groupid' => 7,'taskid' => 31,'companyid' => 1],
            ['title' => 'タイトル32','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要32','starttime' => '2022-3-4','endtime' => '2022-3-8','groupid' => 8,'taskid' => 32,'companyid' => 2],
            ['title' => 'タイトル33','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要33','starttime' => '2022-3-5','endtime' => '2022-3-9','groupid' => 9,'taskid' => 33,'companyid' => 1],
            ['title' => 'タイトル34','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要34','starttime' => '2022-3-6','endtime' => '2022-3-10','groupid' => 10,'taskid' => 34,'companyid' => 2],
            ['title' => 'タイトル35','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要35','starttime' => '2022-3-7','endtime' => '2022-3-11','groupid' => 11,'taskid' => 35,'companyid' => 1],
            ['title' => 'タイトル36','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要36','starttime' => '2022-3-8','endtime' => '2022-3-12','groupid' => 12,'taskid' => 36,'companyid' => 2],
            ['title' => 'タイトル37','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要37','starttime' => '2022-3-9','endtime' => '2022-3-13','groupid' => 1,'taskid' => 37,'companyid' => 1],
            ['title' => 'タイトル38','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要38','starttime' => '2022-3-10','endtime' => '2022-3-14','groupid' => 2,'taskid' => 38,'companyid' => 2],
            ['title' => 'タイトル39','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要39','starttime' => '2022-3-11','endtime' => '2022-3-15','groupid' => 3,'taskid' => 39,'companyid' => 1],
            ['title' => 'タイトル40','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要40','starttime' => '2022-3-12','endtime' => '2022-3-16','groupid' => 4,'taskid' => 40,'companyid' => 2],
            ['title' => 'タイトル41','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要41','starttime' => '2022-3-13','endtime' => '2022-3-17','groupid' => 5,'taskid' => 41,'companyid' => 1],
            ['title' => 'タイトル42','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要42','starttime' => '2022-3-14','endtime' => '2022-3-18','groupid' => 6,'taskid' => 42,'companyid' => 2],
            ['title' => 'タイトル43','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要43','starttime' => '2022-3-15','endtime' => '2022-3-19','groupid' => 7,'taskid' => 43,'companyid' => 1],
            ['title' => 'タイトル44','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要44','starttime' => '2022-3-16','endtime' => '2022-3-20','groupid' => 8,'taskid' => 44,'companyid' => 2],
            ['title' => 'タイトル45','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要45','starttime' => '2022-3-17','endtime' => '2022-3-21','groupid' => 9,'taskid' => 45,'companyid' => 1],
            ['title' => 'タイトル46','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要46','starttime' => '2022-3-18','endtime' => '2022-3-22','groupid' => 10,'taskid' => 46,'companyid' => 2],
            ['title' => 'タイトル47','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要47','starttime' => '2022-3-19','endtime' => '2022-3-23','groupid' => 11,'taskid' => 47,'companyid' => 1],
            ['title' => 'タイトル48','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要48','starttime' => '2022-3-20','endtime' => '2022-3-24','groupid' => 12,'taskid' => 48,'companyid' => 2],
            ['title' => 'タイトル49','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要49','starttime' => '2022-3-21','endtime' => '2022-3-25','groupid' => 1,'taskid' => 1,'companyid' => 1],
            ['title' => 'タイトル50','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要50','starttime' => '2022-3-22','endtime' => '2022-3-26','groupid' => 2,'taskid' => 2,'companyid' => 2],
            ['title' => 'タイトル51','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要51','starttime' => '2022-3-23','endtime' => '2022-3-27','groupid' => 3,'taskid' => 3,'companyid' => 1],
            ['title' => 'タイトル52','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要52','starttime' => '2022-3-24','endtime' => '2022-3-28','groupid' => 4,'taskid' => 4,'companyid' => 2],
            ['title' => 'タイトル53','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要53','starttime' => '2022-3-25','endtime' => '2022-3-29','groupid' => 5,'taskid' => 5,'companyid' => 1],
            ['title' => 'タイトル54','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要54','starttime' => '2022-3-26','endtime' => '2022-3-30','groupid' => 6,'taskid' => 6,'companyid' => 2],
            ['title' => 'タイトル55','description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要55','starttime' => '2022-3-27','endtime' => '2022-3-31','groupid' => 7,'taskid' => 7,'companyid' => 1]
        ]);
    }
}
