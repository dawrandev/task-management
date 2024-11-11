<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Jameson Fay',
            'email' => 'mohamed76@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Ms. Bria Eichmann Jr.',
            'email' => 'freddie.hirthe@example.org',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'contributor',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Jasmine Macejkovic',
            'email' => 'johnson.marina@example.org',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'contributor',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Mr. Simon Cremin',
            'email' => 'augustine.stokes@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Aidan Hickle',
            'email' => 'maeve.okeefe@example.org',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'contributor',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Blanca Schmeler',
            'email' => 'rosales.maryam@example.org',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'contributor',
            'remember_token' => Str::random(10),
        ]);
        Project::create([
            
                    'name' => 'Website Redesign',
                    'description' => 'Complete overhaul of the company website to improve user experience and performance.',
                    'status' => 'Progress', 
                    'due_date' => Carbon::now()
        ]);
        Project::create([
            'name' => 'Mobile App Development',
                    'description' => 'Develop a new mobile application for iOS and Android platforms.',
                    'status' => 'Completed',
                    'due_date' => Carbon::now()
        ]); Project::create([
            'name' => 'Marketing Campaign',
                    'description' => 'Launch a digital marketing campaign to increase brand awareness.',
                    'status' => 'Not Finished', 
                    'due_date' => Carbon::now()
        ]);
        Task::create([
            'project_id' => '1',
            'title' => 'Homepage Layout Design',
            'description' => 'Create a responsive layout for the homepage. The design should include a header, hero section, service overview, and a footer.',
            'priority' => 'High',
            'term' => '2024-11-15', 
            'status' => 'Progress',
        ]);

        Task::create([
            'project_id' => '1',
            'title' => 'About Us Page Content',
            'description' => 'Write and design the "About Us" page with a brief company history, mission, and team information.',
            'priority' => 'Medium',
            'term' => '2024-11-18', 
            'status' => 'Not Finished',
        ]);

        Task::create([
            'project_id' => '1',
            'title' => 'Mobile Responsiveness Fixes',
            'description' => 'Ensure that all pages of the website display correctly on mobile devices, including adjusting font sizes and button placements.',
            'priority' => 'High',
            'term' => '2024-11-12', 
            'status' => 'Completed',
        ]); 
        Comment::create([
            'user_id' => 1,
            'task_id' => 1,
            'comment' => 'This is the first comment.',
            'date' => Carbon::now(),
        ]);
        Comment::create([
            'user_id' => 2,
            'task_id' => 1,
            'comment' => 'This is the second comment.',
            'date' => Carbon::now(),
        ]);
        Comment::create([
            'user_id' => 3,
            'task_id' => 1,
            'comment' => 'This is the third comment.',
            'date' => Carbon::now(),
        ]);
        Comment::create([
            'user_id' => 4,
            'task_id' => 1,
            'comment' => 'This is the fourth comment.',
            'date' => Carbon::now(),
        ]);
        Comment::create([
            'user_id' => 5,
            'task_id' => 1,
            'comment' => '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia laborum dolorem nihil ab, dolorum vel vero placeat et consequatur accusamus reprehenderit earum amet eos laboriosam minima fuga libero porro delectus!',
            'date' => Carbon::now(),
        ]);
        } 
}
