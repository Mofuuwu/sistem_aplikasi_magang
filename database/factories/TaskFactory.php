<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }
    public function t1b () {
        return $this->state([
            'internship_student_id' => '1',
            'mentor_id' => '1',
            'task_header' => 'Tugas 1 - Membuat Diagram ERD',
            'task_description' => 'Silahkan Buat Diagram ERD Berdasarkan Kebutuhan Aplikasi Anda, Identifikasikanlah Entitas Yg Ada Misalnya Siswa, Pembimbing, Dan Humas',
            'start_at' => '2024-11-29',
            'end_at' => '2024-12-30',
            'status' => 'belum selesai',
        ]);
    }
    public function t2b () {
        return $this->state([
            'internship_student_id' => '1',
            'mentor_id' => '1',
            'task_header' => 'Tugas 2 - Membuat Diagram Aktivitas',
            'task_description' => 'Silahkan Buat Diagram Aktivitas Berdasarkan Kebutuhan Aplikasi Anda, Identifikasikanlah Aktivitas Apa Saja Yang Akan Dilakukan Oleh User',
            'start_at' => '2024-11-29',
            'end_at' => '2024-12-30',
            'status' => 'belum selesai',
        ]);
    }
    public function t3b () {
        return $this->state([
            'internship_student_id' => '2',
            'mentor_id' => '1',
            'task_header' => 'Tugas 3 - Membuat Diagram Use Case',
            'task_description' => 'Silahkan Buat Diagram Use Case Berdasarkan Kebutuhan Aplikasi Anda',
            'start_at' => '2024-11-29',
            'end_at' => '2024-12-30',
            'status' => 'belum selesai',
        ]);
    }
    public function t1s () {
        return $this->state([
            'internship_student_id' => '1',
            'mentor_id' => '1',
            'task_header' => 'Tugas 1 - Membuat Tabel',
            'task_description' => 'Silahkan Buat Tabel Di Mysql Berdasarkan Kebutuhan Aplikasi Anda',
            'start_at' => '2024-11-29',
            'end_at' => '2024-12-30',
            'status' => 'selesai',
        ]);
    }
    public function t2s () {
        return $this->state([
            'internship_student_id' => '2',
            'mentor_id' => '1',
            'task_header' => 'Tugas 1 - Menyiapkan Aplikasi',
            'task_description' => 'Silahkan Siapkan Aplikasi untuk Development Berdasarkan Kebutuhan Aplikasi Anda',
            'start_at' => '2024-11-29',
            'end_at' => '2024-12-30',
            'status' => 'selesai',
        ]);
    }
}
