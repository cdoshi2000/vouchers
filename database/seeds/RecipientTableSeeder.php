<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Recipient;

class RecipientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recipient::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com'
        ]);

        Recipient::create([
            'name' => 'Jane Doe',
            'email' => 'janedoe@example.com'
        ]);

        Recipient::create([
            'name' => 'Peter Smith',
            'email' => 'petersmith@example.com'
        ]);

        Recipient::create([
            'name' => 'Mary Smith',
            'email' => 'marysmith@example.com'
        ]);
    }
}
