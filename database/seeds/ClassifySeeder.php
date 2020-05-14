<?php

use Illuminate\Database\Seeder;
use App\Classify;
use App\Comment;
use Illuminate\Support\Facades\DB;

class ClassifySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classifys = [
            ['className' => '其他類'],
            ['className' => '學習', 'description' => '督促學生學習必要的知識及應有的技能'],
            ['className' => '研討會', 'description' => '研討會'],
            ['className' => '選舉活動', 'description' => '人事室主辦選舉活動']
        ];
     
        Comment::create(
            array(
                'title' => 'josh1234',
                'content' => '測試',
                'account' => 'root1234',
                'name' => 'donut',
                'created_at' => '2020-05-04 05:39:08',
            )
          );
        // first
        // DB::table('classify')->insert($classifys);
        // second
        // foreach($classifys as $classify){
        //     Classify::create($classify);
        // }
        // third
        // Classify::insert($classifys);
        // User::insert($postdata);
    }
}
