<?php

use App\Manager;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory(App\User::class, 10)->create();
        //factory(App\Manager::class, 5)->create();
        factory(App\Admin::class, 1)->create();

        $managerA= new Manager();
        $managerA->name = "Manager A";
        $managerA->email = "amanager@manager.com";
        $managerA->position = "1";
        $managerA->password = bcrypt('sabuz123');
        $managerA->save();
        
        $managerB= new Manager();
        $managerB->name = "Manager B";
        $managerB->email = "bmanager@manager.com";
        $managerB->position = "2";
        $managerB->password = bcrypt('sabuz123');
        $managerB->save();
        
        $managerC= new Manager();
        $managerC->name = "Manager C";
        $managerC->email = "cmanager@manager.com";
        $managerC->position = "3";
        $managerC->password = bcrypt('sabuz123');
        $managerC->save();
    }
}
