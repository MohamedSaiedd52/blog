<?php

namespace Database\Seeders;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Simulate file upload (replace this with actual file upload logic)
        // $file = UploadedFile::fake()->image('avatar.jpg');
        // $fileName = time() . '.' . $file->getClientOriginalExtension();
        // $file->move(public_path('uploads'), $fileName); // Save the file to public/uploads folder

        // // Create user with uploaded image file
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@g.c',
            'password' => Hash::make('012120'),
            'is_admin' => 1,
            'Phone' => '01205067754',
            // 'img_file' =>  $fileName, // Image file path relative to the public directory
            'email_verified_at' => now(),
        ]);

        // Use the factory to create the posts
        $this->call([CategorySeeder::class]);
        $this->call([TagSeeder::class]);

    }
}
