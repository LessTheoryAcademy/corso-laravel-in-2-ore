<?php

use Illuminate\Database\Seeder;

use App\Photo;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 27; $i++) {

            $photo = new Photo();
            $photo->title = 'Photo : ' . $i;
            $photo->url = '/img/' . $i . '.png';
    
            $photo->save();
        }
    }
}
