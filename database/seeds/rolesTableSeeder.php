<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class rolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert type admin in role table
        $check_data_admin = DB::table('roles')->where([["name", "Admin"]])->get();
        if($check_data_admin->count() == 0){
            $insert_type_admin = DB::table("roles")->insert(["name" => "Admin"]);
        }
        

        //insert type user in role table
        $check_data_user = DB::table('roles')->where([["name", "User"]])->get();
        if($check_data_user->count() == 0){
            $insert_type_user = DB::table("roles")->insert(["name" => "User"]);
        }
    }
}
