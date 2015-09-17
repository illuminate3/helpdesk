<?php

use Orchestra\Model\Role;
use Orchestra\Support\Facades\ACL;
use Orchestra\Support\Facades\Foundation;
use Illuminate\Database\Migrations\Migration;

class ControlSeedAcls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $role = Role::admin();

        $acl  = ACL::make('ithub')->attach(Foundation::memory());

        $actions = ['Manage Issues'];

        $acl->actions()->attach($actions);

        $acl->allow($role->name, $actions);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
