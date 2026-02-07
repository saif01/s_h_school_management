<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Seed the roles table as per SRS (FR-1.2: Role-Based Access Control).
     * Roles: Admin, Teacher, Accountant, Student, Parent.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'description' => 'Full access (setup, users, all modules).',
                'is_system' => true,
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'Teacher',
                'slug' => 'teacher',
                'description' => 'Own classes/sections; attendance, marks, timetable; view students.',
                'is_system' => true,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Accountant',
                'slug' => 'accountant',
                'description' => 'Fees, invoices, receipts, fee reports only.',
                'is_system' => true,
                'is_active' => true,
                'order' => 3,
            ],
            [
                'name' => 'Student',
                'slug' => 'student',
                'description' => 'Own profile, attendance, fees, results, notices.',
                'is_system' => true,
                'is_active' => true,
                'order' => 4,
            ],
            [
                'name' => 'Parent',
                'slug' => 'parent',
                'description' => 'Linked children\'s attendance, fees, results, notices.',
                'is_system' => true,
                'is_active' => true,
                'order' => 5,
            ],
        ];

        foreach ($roles as $roleData) {
            Role::updateOrCreate(
                ['slug' => $roleData['slug']],
                $roleData
            );
        }

        $this->command->info('Roles seeded successfully (Admin, Teacher, Accountant, Student, Parent).');
    }
}
