<?php

use Illuminate\Database\Seeder;
use App\Model\User;
use App\Model\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = array(['super_admin','Super Admin', 'Super Admin can create, edit and delete every entities of the application. He/She is basically the god of this App.'],
                      ['accountant','Accountant', 'Accountant can only view and change the transactional forms and entities.'],
                      ['operator','Operator', 'Operator can view the basic notifications and dashboard reports.']);
        $user = ['email' => 'admin@gmail.com', 'password' => 'admin123', 'name' => 'John Doe', 'address' => 'Phalano', 'gender' => 'male' ];
        $superAdminRoleId = '1';
        for($i=0; $i<sizeof($role); $i++){
          $roleObj = new Role;
          $roleObj->main_title = $role[$i][0];
          $roleObj->display_title = $role[$i][1];
          $roleObj->description = $role[$i][2];
          $roleObj->save();

          if($i == 0 ){
            $superAdminRoleId = $roleObj->id;
          }
        }

        $userObj = new User;
        $userObj->email = $user['email'];
        $userObj->password = bcrypt($user['password']);
        $userObj->name = $user['name'];
        $userObj->address = $user['address'];
        $userObj->gender = $user['gender'];
        $userObj->role_id = $superAdminRoleId;
        $userObj->save();

    }
}
