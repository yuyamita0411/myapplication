<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // articlesテーブルにデータをinsert
        DB::table('group_infos')->insert([
            ['groupname' => 'グループ名1','cid' => 2,'cname' => 'ユーザー名2','groupdescription' => '説明','companyid' => 1,'created_at' => '2020-02-06'],
            ['groupname' => 'グループ名2','cid' => 3,'cname' => 'ユーザー名3','groupdescription' => '説明','companyid' => 2,'created_at' => '2020-02-06'],
            ['groupname' => 'グループ名3','cid' => 4,'cname' => 'ユーザー名4','groupdescription' => '説明','companyid' => 1,'created_at' => '2020-02-06'],
            ['groupname' => 'グループ名4','cid' => 5,'cname' => 'ユーザー名5','groupdescription' => '説明','companyid' => 2,'created_at' => '2020-02-06'],
            ['groupname' => 'グループ名5','cid' => 1,'cname' => 'ユーザー名1','groupdescription' => '説明','companyid' => 1,'created_at' => '2020-02-06'],
            ['groupname' => 'グループ名6','cid' => 2,'cname' => 'ユーザー名2','groupdescription' => '説明','companyid' => 2,'created_at' => '2020-02-06'],
            ['groupname' => 'グループ名7','cid' => 3,'cname' => 'ユーザー名3','groupdescription' => '説明','companyid' => 1,'created_at' => '2020-02-06'],
            ['groupname' => 'グループ名8','cid' => 4,'cname' => 'ユーザー名4','groupdescription' => '説明','companyid' => 2,'created_at' => '2020-02-06'],
            ['groupname' => 'グループ名9','cid' => 5,'cname' => 'ユーザー名5','groupdescription' => '説明','companyid' => 1,'created_at' => '2020-02-06'],
            ['groupname' => 'グループ名10','cid' => 1,'cname' => 'ユーザー名1','groupdescription' => '説明','companyid' => 2,'created_at' => '2020-02-06'],
            ['groupname' => 'グループ名11','cid' => 2,'cname' => 'ユーザー名2','groupdescription' => '説明','companyid' => 1,'created_at' => '2020-02-06'],
            ['groupname' => 'グループ名12','cid' => 3,'cname' => 'ユーザー名3','groupdescription' => '説明','companyid' => 2,'created_at' => '2020-02-06']
        ]);
    }
}