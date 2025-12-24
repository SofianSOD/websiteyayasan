<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admission;
use App\Models\User;
use App\Models\Program;

class AdmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = User::where('role', 'student')->get();
        $programs = Program::all();

        if ($students->count() > 0 && $programs->count() > 0) {
            foreach ($students as $index => $student) {
                Admission::create([
                    'user_id' => $student->id,
                    'program_id' => $programs->random()->id,
                    'status' => $index % 2 == 0 ? 'pending' : 'approved',
                    'payment_status' => $index % 2 == 0 ? 'unpaid' : 'paid',
                    'notes' => 'Pendaftaran simulasi untuk pengetesan sistem.',
                ]);
            }
        }
    }
}
