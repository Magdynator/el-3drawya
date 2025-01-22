<?php

namespace Database\Seeders;
use App\Models\UserProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('user_profiles')->insert([
            [
                'user_id' => 1,
                'personal_id' => 'ABC123XYZ',
                'first_name' => 'Admin',
                'last_name' => 'User',
                'gender' => 'male',
                'barcode' => '1234567890123',
                'qrcode' => '1234567890123',
                'point' => 50,
                'check_box' => '1',
                'date_of_birth' => '1990-01-01',
                'bio' => 'Admin user profile bio.',
                'profile_picture' => 'profile1.jpg',
                'phone_number' => '1234567890',
                'address' => '123 Admin Street',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'personal_id' => 'XYZ789ABC',
                'first_name' => 'Regular',
                'last_name' => 'User',
                'gender' => 'female',
                'barcode' => '9876543210987',
                'qrcode' => '9876543210987',
                'point' => 20,
                'check_box' => '0',
                'date_of_birth' => '1995-05-05',
                'bio' => 'Regular user profile bio.',
                'profile_picture' => 'profile2.jpg',
                'phone_number' => '0987654321',
                'address' => '456 Regular Ave',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
