<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DiariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $diaries = [
          [
            'title' => 'title1',
            'body' => 'body1',
          ],
          [
            'title' => 'title2',
            'body' => 'body2',
          ],
          [
            'title' => 'title3',
            'body' => 'body3',
          ],
          [
            'title' => 'title4',
            'body' => 'body4',
          ],
          [
            'title' => 'title5',
            'body' => 'body5',
          ],
          [
            'title' => 'title6',
            'body' => 'body6',
          ],
          [
            'title' => 'title7',
            'body' => 'body7',
          ],
          [
            'title' => 'title8',
            'body' => 'body8',
          ],
          [
            'title' => 'title9',
            'body' => 'body9',
          ],
          [
            'title' => 'title10',
            'body' => 'body10',
          ],
        ];
        foreach ($diaries as $diary) {
          DB::table('diaries')->insert([
            'title' => $diary['title'],
            'body' => $diary['body'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
          ]);
        }
    }
}
