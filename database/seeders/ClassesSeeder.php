<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Classes::factory()
        ->count(10)
        ->sequence(fn($sequence) => ['name' => 'Class' . $sequence->index + 1])
        ->has(
            \App\Models\Section::factory()
            ->count(2)
            ->state(
                new \Illuminate\Database\Eloquent\Factories\Sequence(
                    ['name' => 'Section A'],
                    ['name' => 'Section B'],
                )
            )
            ->has(
                \App\Models\Student::factory()
                    ->count(5)
                    ->state(
                        function (array $attributes, \App\Models\Section $section) {
                            return ['class_id' => $section->class_id];
                        }
                    )
            )
        )
        ->create();
    }
}

