<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $defaultPassword = 'password'; // hashed by User model cast
        $defaultLocation = [
            'phone' => null,
            'city' => 'Dhaka',
            'state' => 'Dhaka',
            'country' => 'Bangladesh',
        ];

        // 1. Super User (full system access)
        $superUser = User::updateOrCreate(
            ['email' => 'superadmin@school.com'],
            [
                'name' => 'Super Admin',
                'password' => $defaultPassword,
                'gender' => 'male',
                'bio' => 'Super user with full access to all modules and settings.',
                ...$defaultLocation,
            ]
        );
        $this->assignRoleBySlug($superUser, 'admin');

        // 2. Five users – one per SRS role (Admin, Teacher, Accountant, Student, Parent)
        $roleUsers = [
            [
                'name' => 'School Admin',
                'email' => 'admin@school.com',
                'gender' => 'male',
                'bio' => 'School administrator. Full access to setup, users, and all modules.',
                'role_slug' => 'admin',
            ],
            [
                'name' => 'Demo Teacher',
                'email' => 'teacher@school.com',
                'gender' => 'female',
                'bio' => 'Teacher. Own classes/sections; attendance, marks, timetable; view students.',
                'role_slug' => 'teacher',
            ],
            [
                'name' => 'Demo Accountant',
                'email' => 'accountant@school.com',
                'gender' => 'male',
                'bio' => 'Accountant. Fees, invoices, receipts, fee reports only.',
                'role_slug' => 'accountant',
            ],
            [
                'name' => 'Demo Student',
                'email' => 'student@school.com',
                'gender' => 'male',
                'bio' => 'Student. Own profile, attendance, fees, results, notices.',
                'role_slug' => 'student',
            ],
            [
                'name' => 'Demo Parent',
                'email' => 'parent@school.com',
                'gender' => 'female',
                'bio' => 'Parent. Linked children\'s attendance, fees, results, notices.',
                'role_slug' => 'parent',
            ],
        ];

        foreach ($roleUsers as $data) {
            $roleSlug = $data['role_slug'];
            unset($data['role_slug']);
            $user = User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => $defaultPassword,
                    'gender' => $data['gender'],
                    'bio' => $data['bio'],
                    ...$defaultLocation,
                ]
            );
            $this->assignRoleBySlug($user, $roleSlug);
        }

        $this->command->info('Super user and 5 role users seeded (superadmin@school.com, admin@school.com, teacher@school.com, accountant@school.com, student@school.com, parent@school.com). Password: password');
    }

    private function assignRoleBySlug(User $user, string $roleSlug): void
    {
        $role = Role::where('slug', $roleSlug)->first();
        if ($role && !$user->roles()->where('roles.id', $role->id)->exists()) {
            $user->roles()->attach($role->id);
        }
    }
}
