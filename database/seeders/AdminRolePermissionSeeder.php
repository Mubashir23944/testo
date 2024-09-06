<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    /**
     * List of applications to add.
     */
    private // Define an array to store all permissions
    $permissions = [
        'users-list',
        'users-create',
        'users-edit',
        'users-delete',
        'clubs-list',
        'clubs-view',
        'clubs-status',
        'clubs-delete',
        'courts-list',
        'courts-view',
        'courts-status',
        'courts-delete',
        'posts-list',
        'posts-view',
        'posts-delete',
        'comments-list',
        'comments-view',
        'comments-delete',
        'reservations-list',
        'reservations-view',
        'reservations-status',
        'reservations-delete',
        'invitations-list',
        'invitations-view',
        'invitations-status',
        'invitations-delete',
        'tournaments-list',
        'tournaments-view',
        'tournaments-status',
        'tournaments-delete',
        'hours-index',
        'hours-delete',
        'events-index',
        'events-view',
        'events-status',
        'events-delete',
        'ads-index',
        'ads-status',
        'ads-view',
        'ads-delete',
        'feedbacks-index',
        'cms-edit',
        'activities-index',
        'announcements-index',
        'announcements-create',
        'announcements-delete',
        'roles-index',
        'roles-edit',
        'roles-create',
        'roles-delete',
    ];

    public function run(): void
    {
        foreach ($this->permissions as $permission) {
            Permission::create([
                'name' => $permission, 
                'guard_name' => config('auth.defaults.guard')
            ]);
        }
    }
}
