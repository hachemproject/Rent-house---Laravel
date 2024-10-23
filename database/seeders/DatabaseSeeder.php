<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\homes;
use App\Models\categorys;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

     private $permissions = [
        'admin',
        'role-list',
        'role-create',
        'role-edit',
        'role-delete',
// Dashboard permission
        'dashboard-list',
        'dashboard-create',
        'dashboard-edit',
        'dashboard-delete',
//categorie permissions
        'categorie-list',
        'categorie-create',
        'categorie-edit',
        'categorie-delete',
//hotel permissions
        'home-list',
        'home-create',
        'home-edit',
        'home-delete',
//message permissions
        'message-list',
        'message-create',
        'message-edit',
        'message-delete',

//profil permissions
        'profil-list',
        'profil-create',
        'profil-edit',
        'profil-delete',

//reservation permissions
        'reservation-list',
        'reservation-create',
        'reservation-edit',
        'reservation-delete',

//user permissions
        'user-list',
        'user-create',
        'user-edit',
        'user-delete',
        //user permissions
        'client',
        ];
    

    public function run(): void
    {
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        $user = User::create([
            'name' => 'admin',
            'prenom' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('963852741')
        ]);
        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);


        $user = User::create([
                'name' => 'client',
                'prenom' => 'client',
                'email' => 'client@example.com',
                'password' => Hash::make('963852741')
            ]);
        $role = Role::create(['name' => 'Client']);
        $permissions = Permission::whereIn('id', [34])->pluck('id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
        // \App\Models\User::factory(10)->create();

         //\App\Models\User::factory()->create([
           //  'name' => 'Test User',
             //'email' => 'test@example.com',
         //]);
         $categorys = categorys::create([
                'nom' => 'studio',
            ]);
         $homes = homes::create([
                'nb_place' => '1',
                'ville' => 'sfax',
                'adresse' => 'rue matar',
                'bath' => '1',
                'num_tel' => '23254815',
                'description' => 'Country Style House with beautiful garden and terrace',
                'prix' => '666',
                'category_id' => '1',
            ]);
    }
}
