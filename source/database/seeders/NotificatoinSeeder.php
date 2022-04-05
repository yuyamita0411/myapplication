<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificatoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // articlesテーブルにデータをinsert
        DB::table('notifications')->insert([
            ['title' => 'タイトル1','passage' => 'メッセージ1','fromuserid' => 1,'fromuser' => '依頼者1','touserid' => 1,'touser' => 'ユーザー1','companyid' => 2,'created_at' => '2020-02-06'],
            ['title' => 'タイトル2','passage' => 'メッセージ2','fromuserid' => 2,'fromuser' => '依頼者2','touserid' => 2,'touser' => 'ユーザー2','companyid' => 1,'created_at' => '2020-02-06'],
            ['title' => 'タイトル3','passage' => 'メッセージ3','fromuserid' => 3,'fromuser' => '依頼者3','touserid' => 3,'touser' => 'ユーザー3','companyid' => 2,'created_at' => '2020-02-06'],
            ['title' => 'タイトル4','passage' => 'メッセージ4','fromuserid' => 4,'fromuser' => '依頼者4','touserid' => 4,'touser' => 'ユーザー4','companyid' => 1,'created_at' => '2020-02-06'],
            ['title' => 'タイトル5','passage' => 'メッセージ5','fromuserid' => 5,'fromuser' => '依頼者5','touserid' => 5,'touser' => 'ユーザー5','companyid' => 2,'created_at' => '2020-02-06'],
            ['title' => 'タイトル6','passage' => 'メッセージ6','fromuserid' => 1,'fromuser' => '依頼者1','touserid' => 1,'touser' => 'ユーザー6','companyid' => 1,'created_at' => '2020-02-06'],
            ['title' => 'タイトル7','passage' => 'メッセージ7','fromuserid' => 2,'fromuser' => '依頼者2','touserid' => 2,'touser' => 'ユーザー7','companyid' => 2,'created_at' => '2020-02-06'],
            ['title' => 'タイトル8','passage' => 'メッセージ8','fromuserid' => 3,'fromuser' => '依頼者3','touserid' => 3,'touser' => 'ユーザー8','companyid' => 1,'created_at' => '2020-02-06'],
            ['title' => 'タイトル9','passage' => 'メッセージ9','fromuserid' => 4,'fromuser' => '依頼者4','touserid' => 4,'touser' => 'ユーザー9','companyid' => 2,'created_at' => '2020-02-06'],
            ['title' => 'タイトル10','passage' => 'メッセージ10','fromuserid' => 5,'fromuser' => '依頼者5','touserid' => 5,'touser' => 'ユーザー10','companyid' => 1,'created_at' => '2020-02-06'],
            ['title' => 'タイトル11','passage' => 'メッセージ11','fromuserid' => 1,'fromuser' => '依頼者1','touserid' => 1,'touser' => 'ユーザー11','companyid' => 2,'created_at' => '2020-02-06'],
            ['title' => 'タイトル12','passage' => 'メッセージ12','fromuserid' => 2,'fromuser' => '依頼者2','touserid' => 2,'touser' => 'ユーザー12','companyid' => 1,'created_at' => '2020-02-06'],
            ['title' => 'タイトル13','passage' => 'メッセージ13','fromuserid' => 3,'fromuser' => '依頼者3','touserid' => 3,'touser' => 'ユーザー13','companyid' => 2,'created_at' => '2020-02-06'],
            ['title' => 'タイトル14','passage' => 'メッセージ14','fromuserid' => 4,'fromuser' => '依頼者4','touserid' => 4,'touser' => 'ユーザー14','companyid' => 1,'created_at' => '2020-02-06'],
            ['title' => 'タイトル15','passage' => 'メッセージ15','fromuserid' => 5,'fromuser' => '依頼者5','touserid' => 5,'touser' => 'ユーザー15','companyid' => 2,'created_at' => '2020-02-06'],
            ['title' => 'タイトル16','passage' => 'メッセージ16','fromuserid' => 1,'fromuser' => '依頼者1','touserid' => 1,'touser' => 'ユーザー16','companyid' => 1,'created_at' => '2020-02-06'],
            ['title' => 'タイトル17','passage' => 'メッセージ17','fromuserid' => 2,'fromuser' => '依頼者2','touserid' => 2,'touser' => 'ユーザー17','companyid' => 2,'created_at' => '2020-02-06'],
            ['title' => 'タイトル18','passage' => 'メッセージ18','fromuserid' => 3,'fromuser' => '依頼者3','touserid' => 3,'touser' => 'ユーザー18','companyid' => 1,'created_at' => '2020-02-06'],
            ['title' => 'タイトル19','passage' => 'メッセージ19','fromuserid' => 4,'fromuser' => '依頼者4','touserid' => 4,'touser' => 'ユーザー19','companyid' => 2,'created_at' => '2020-02-06'],
            ['title' => 'タイトル20','passage' => 'メッセージ20','fromuserid' => 5,'fromuser' => '依頼者5','touserid' => 5,'touser' => 'ユーザー20','companyid' => 1,'created_at' => '2020-02-06'],
            ['title' => 'タイトル21','passage' => 'メッセージ21','fromuserid' => 1,'fromuser' => '依頼者1','touserid' => 1,'touser' => 'ユーザー21','companyid' => 2,'created_at' => '2020-02-06'],
            ['title' => 'タイトル22','passage' => 'メッセージ22','fromuserid' => 2,'fromuser' => '依頼者2','touserid' => 2,'touser' => 'ユーザー22','companyid' => 1,'created_at' => '2020-02-06'],
            ['title' => 'タイトル23','passage' => 'メッセージ23','fromuserid' => 3,'fromuser' => '依頼者3','touserid' => 3,'touser' => 'ユーザー23','companyid' => 2,'created_at' => '2020-02-06'],
            ['title' => 'タイトル24','passage' => 'メッセージ24','fromuserid' => 4,'fromuser' => '依頼者4','touserid' => 4,'touser' => 'ユーザー24','companyid' => 1,'created_at' => '2020-02-06'],
            ['title' => 'タイトル25','passage' => 'メッセージ25','fromuserid' => 5,'fromuser' => '依頼者5','touserid' => 5,'touser' => 'ユーザー25','companyid' => 2,'created_at' => '2020-02-06'],
            ['title' => 'タイトル26','passage' => 'メッセージ26','fromuserid' => 1,'fromuser' => '依頼者1','touserid' => 1,'touser' => 'ユーザー26','companyid' => 1,'created_at' => '2020-02-06'],
            ['title' => 'タイトル27','passage' => 'メッセージ27','fromuserid' => 2,'fromuser' => '依頼者2','touserid' => 2,'touser' => 'ユーザー27','companyid' => 2,'created_at' => '2020-02-06'],
            ['title' => 'タイトル28','passage' => 'メッセージ28','fromuserid' => 3,'fromuser' => '依頼者3','touserid' => 3,'touser' => 'ユーザー28','companyid' => 1,'created_at' => '2020-02-06'],
            ['title' => 'タイトル29','passage' => 'メッセージ29','fromuserid' => 4,'fromuser' => '依頼者4','touserid' => 4,'touser' => 'ユーザー29','companyid' => 2,'created_at' => '2020-02-06'],
            ['title' => 'タイトル30','passage' => 'メッセージ30','fromuserid' => 5,'fromuser' => '依頼者5','touserid' => 5,'touser' => 'ユーザー30','companyid' => 1,'created_at' => '2020-02-06'],
            ['title' => 'タイトル31','passage' => 'メッセージ31','fromuserid' => 1,'fromuser' => '依頼者1','touserid' => 1,'touser' => 'ユーザー31','companyid' => 2,'created_at' => '2020-02-06'],
            ['title' => 'タイトル32','passage' => 'メッセージ32','fromuserid' => 2,'fromuser' => '依頼者2','touserid' => 2,'touser' => 'ユーザー32','companyid' => 1,'created_at' => '2020-02-06'],
            ['title' => 'タイトル33','passage' => 'メッセージ33','fromuserid' => 3,'fromuser' => '依頼者3','touserid' => 3,'touser' => 'ユーザー33','companyid' => 2,'created_at' => '2020-02-06'],
            ['title' => 'タイトル34','passage' => 'メッセージ34','fromuserid' => 4,'fromuser' => '依頼者4','touserid' => 4,'touser' => 'ユーザー34','companyid' => 1,'created_at' => '2020-02-06'],
            ['title' => 'タイトル35','passage' => 'メッセージ35','fromuserid' => 5,'fromuser' => '依頼者5','touserid' => 5,'touser' => 'ユーザー35','companyid' => 2,'created_at' => '2020-02-06'],
            ['title' => 'タイトル36','passage' => 'メッセージ36','fromuserid' => 1,'fromuser' => '依頼者1','touserid' => 1,'touser' => 'ユーザー36','companyid' => 1,'created_at' => '2020-02-06'],
            ['title' => 'タイトル37','passage' => 'メッセージ37','fromuserid' => 2,'fromuser' => '依頼者2','touserid' => 2,'touser' => 'ユーザー37','companyid' => 2,'created_at' => '2020-02-06'],
            ['title' => 'タイトル38','passage' => 'メッセージ38','fromuserid' => 3,'fromuser' => '依頼者3','touserid' => 3,'touser' => 'ユーザー38','companyid' => 1,'created_at' => '2020-02-06'],
            ['title' => 'タイトル39','passage' => 'メッセージ39','fromuserid' => 4,'fromuser' => '依頼者4','touserid' => 4,'touser' => 'ユーザー39','companyid' => 2,'created_at' => '2020-02-06'],
            ['title' => 'タイトル40','passage' => 'メッセージ40','fromuserid' => 5,'fromuser' => '依頼者5','touserid' => 5,'touser' => 'ユーザー40','companyid' => 1,'created_at' => '2020-02-06'],
            ['title' => 'タイトル41','passage' => 'メッセージ41','fromuserid' => 1,'fromuser' => '依頼者1','touserid' => 1,'touser' => 'ユーザー41','companyid' => 2,'created_at' => '2020-02-06'],
            ['title' => 'タイトル42','passage' => 'メッセージ42','fromuserid' => 2,'fromuser' => '依頼者2','touserid' => 2,'touser' => 'ユーザー42','companyid' => 1,'created_at' => '2020-02-06'],
            ['title' => 'タイトル43','passage' => 'メッセージ43','fromuserid' => 3,'fromuser' => '依頼者3','touserid' => 3,'touser' => 'ユーザー43','companyid' => 2,'created_at' => '2020-02-06'],
            ['title' => 'タイトル44','passage' => 'メッセージ44','fromuserid' => 4,'fromuser' => '依頼者4','touserid' => 4,'touser' => 'ユーザー44','companyid' => 1,'created_at' => '2020-02-06'],
            ['title' => 'タイトル45','passage' => 'メッセージ45','fromuserid' => 1,'fromuser' => '依頼者1','touserid' => 1,'touser' => 'ユーザー45','companyid' => 2,'created_at' => '2020-02-06'],
            ['title' => 'タイトル46','passage' => 'メッセージ46','fromuserid' => 2,'fromuser' => '依頼者2','touserid' => 2,'touser' => 'ユーザー46','companyid' => 1,'created_at' => '2020-02-06'],
            ['title' => 'タイトル47','passage' => 'メッセージ47','fromuserid' => 3,'fromuser' => '依頼者3','touserid' => 3,'touser' => 'ユーザー47','companyid' => 2,'created_at' => '2020-02-06']
        ]);
    }
}
