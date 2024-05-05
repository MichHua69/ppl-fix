<?php

namespace Database\Seeders;

use App\Models\jadwalprogram;
use App\Models\program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            ['Program A', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In scelerisque ligula dui, a tincidunt nulla dignissim sit amet. Vivamus convallis velit leo, ac vestibulum quam mattis non. Maecenas id risus felis. Suspendisse non posuere ipsum. Duis volutpat leo ut laoreet venenatis. Suspendisse potenti. Nulla tellus urna, egestas ut massa non, placerat condimentum urna. Pellentesque auctor, velit at imperdiet placerat, nisl arcu consequat ligula, consequat euismod lacus neque eget urna. Vestibulum nec tristique tellus, ut tristique odio. Proin quis urna et nunc consequat mattis. Nunc interdum nisi id lorem pretium mollis. Curabitur libero dui, mattis ut enim nec, aliquet scelerisque justo. Proin mi turpis, congue nec sollicitudin eu, ultrices ac tortor. Mauris imperdiet diam leo, ut hendrerit magna lacinia ac. Nulla leo tellus, molestie vitae lectus nec, pulvinar laoreet arcu. Vestibulum feugiat faucibus porttitor.'],
            ['Program B', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In scelerisque ligula dui, a tincidunt nulla dignissim sit amet. Vivamus convallis velit leo, ac vestibulum quam mattis non. Maecenas id risus felis. Suspendisse non posuere ipsum. Duis volutpat leo ut laoreet venenatis. Suspendisse potenti. Nulla tellus urna, egestas ut massa non, placerat condimentum urna. Pellentesque auctor, velit at imperdiet placerat, nisl arcu consequat ligula, consequat euismod lacus neque eget urna. Vestibulum nec tristique tellus, ut tristique odio. Proin quis urna et nunc consequat mattis. Nunc interdum nisi id lorem pretium mollis. Curabitur libero dui, mattis ut enim nec, aliquet scelerisque justo. Proin mi turpis, congue nec sollicitudin eu, ultrices ac tortor. Mauris imperdiet diam leo, ut hendrerit magna lacinia ac. Nulla leo tellus, molestie vitae lectus nec, pulvinar laoreet arcu. Vestibulum feugiat faucibus porttitor.'],
            ['Program C', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In scelerisque ligula dui, a tincidunt nulla dignissim sit amet. Vivamus convallis velit leo, ac vestibulum quam mattis non. Maecenas id risus felis. Suspendisse non posuere ipsum. Duis volutpat leo ut laoreet venenatis. Suspendisse potenti. Nulla tellus urna, egestas ut massa non, placerat condimentum urna. Pellentesque auctor, velit at imperdiet placerat, nisl arcu consequat ligula, consequat euismod lacus neque eget urna. Vestibulum nec tristique tellus, ut tristique odio. Proin quis urna et nunc consequat mattis. Nunc interdum nisi id lorem pretium mollis. Curabitur libero dui, mattis ut enim nec, aliquet scelerisque justo. Proin mi turpis, congue nec sollicitudin eu, ultrices ac tortor. Mauris imperdiet diam leo, ut hendrerit magna lacinia ac. Nulla leo tellus, molestie vitae lectus nec, pulvinar laoreet arcu. Vestibulum feugiat faucibus porttitor.'],
            ['Program D', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In scelerisque ligula dui, a tincidunt nulla dignissim sit amet. Vivamus convallis velit leo, ac vestibulum quam mattis non. Maecenas id risus felis. Suspendisse non posuere ipsum. Duis volutpat leo ut laoreet venenatis. Suspendisse potenti. Nulla tellus urna, egestas ut massa non, placerat condimentum urna. Pellentesque auctor, velit at imperdiet placerat, nisl arcu consequat ligula, consequat euismod lacus neque eget urna. Vestibulum nec tristique tellus, ut tristique odio. Proin quis urna et nunc consequat mattis. Nunc interdum nisi id lorem pretium mollis. Curabitur libero dui, mattis ut enim nec, aliquet scelerisque justo. Proin mi turpis, congue nec sollicitudin eu, ultrices ac tortor. Mauris imperdiet diam leo, ut hendrerit magna lacinia ac. Nulla leo tellus, molestie vitae lectus nec, pulvinar laoreet arcu. Vestibulum feugiat faucibus porttitor.'],
            ['Program E', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In scelerisque ligula dui, a tincidunt nulla dignissim sit amet. Vivamus convallis velit leo, ac vestibulum quam mattis non. Maecenas id risus felis. Suspendisse non posuere ipsum. Duis volutpat leo ut laoreet venenatis. Suspendisse potenti. Nulla tellus urna, egestas ut massa non, placerat condimentum urna. Pellentesque auctor, velit at imperdiet placerat, nisl arcu consequat ligula, consequat euismod lacus neque eget urna. Vestibulum nec tristique tellus, ut tristique odio. Proin quis urna et nunc consequat mattis. Nunc interdum nisi id lorem pretium mollis. Curabitur libero dui, mattis ut enim nec, aliquet scelerisque justo. Proin mi turpis, congue nec sollicitudin eu, ultrices ac tortor. Mauris imperdiet diam leo, ut hendrerit magna lacinia ac. Nulla leo tellus, molestie vitae lectus nec, pulvinar laoreet arcu. Vestibulum feugiat faucibus porttitor.'],
            ['Program F', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In scelerisque ligula dui, a tincidunt nulla dignissim sit amet. Vivamus convallis velit leo, ac vestibulum quam mattis non. Maecenas id risus felis. Suspendisse non posuere ipsum. Duis volutpat leo ut laoreet venenatis. Suspendisse potenti. Nulla tellus urna, egestas ut massa non, placerat condimentum urna. Pellentesque auctor, velit at imperdiet placerat, nisl arcu consequat ligula, consequat euismod lacus neque eget urna. Vestibulum nec tristique tellus, ut tristique odio. Proin quis urna et nunc consequat mattis. Nunc interdum nisi id lorem pretium mollis. Curabitur libero dui, mattis ut enim nec, aliquet scelerisque justo. Proin mi turpis, congue nec sollicitudin eu, ultrices ac tortor. Mauris imperdiet diam leo, ut hendrerit magna lacinia ac. Nulla leo tellus, molestie vitae lectus nec, pulvinar laoreet arcu. Vestibulum feugiat faucibus porttitor.'],
            ['Program G', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In scelerisque ligula dui, a tincidunt nulla dignissim sit amet. Vivamus convallis velit leo, ac vestibulum quam mattis non. Maecenas id risus felis. Suspendisse non posuere ipsum. Duis volutpat leo ut laoreet venenatis. Suspendisse potenti. Nulla tellus urna, egestas ut massa non, placerat condimentum urna. Pellentesque auctor, velit at imperdiet placerat, nisl arcu consequat ligula, consequat euismod lacus neque eget urna. Vestibulum nec tristique tellus, ut tristique odio. Proin quis urna et nunc consequat mattis. Nunc interdum nisi id lorem pretium mollis. Curabitur libero dui, mattis ut enim nec, aliquet scelerisque justo. Proin mi turpis, congue nec sollicitudin eu, ultrices ac tortor. Mauris imperdiet diam leo, ut hendrerit magna lacinia ac. Nulla leo tellus, molestie vitae lectus nec, pulvinar laoreet arcu. Vestibulum feugiat faucibus porttitor.'],
            ['Program H', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In scelerisque ligula dui, a tincidunt nulla dignissim sit amet. Vivamus convallis velit leo, ac vestibulum quam mattis non. Maecenas id risus felis. Suspendisse non posuere ipsum. Duis volutpat leo ut laoreet venenatis. Suspendisse potenti. Nulla tellus urna, egestas ut massa non, placerat condimentum urna. Pellentesque auctor, velit at imperdiet placerat, nisl arcu consequat ligula, consequat euismod lacus neque eget urna. Vestibulum nec tristique tellus, ut tristique odio. Proin quis urna et nunc consequat mattis. Nunc interdum nisi id lorem pretium mollis. Curabitur libero dui, mattis ut enim nec, aliquet scelerisque justo. Proin mi turpis, congue nec sollicitudin eu, ultrices ac tortor. Mauris imperdiet diam leo, ut hendrerit magna lacinia ac. Nulla leo tellus, molestie vitae lectus nec, pulvinar laoreet arcu. Vestibulum feugiat faucibus porttitor.'],
        ];

        // Loop through each program data and create records
        foreach ($programs as $program) {
            // Create program record
            $newProgram = program::create([
                'nama_program' => $program[0],
                'deskripsi' => $program[1],
            ]);

            // Create two jadwal program records for each program
            for ($i = 1; $i <= 2; $i++) {
                // Add $i days to the current date
                $tanggal = now()->addDays($i);

                jadwalprogram::create([
                    'sesi' => 'Sesi ' . $i,
                    'tanggal' => $tanggal,
                    'waktu_mulai' => '08:00:00',
                    'waktu_selesai' => '10:00:00',
                    'id_puskeswan' => 1, // Change this to the appropriate puskeswan ID
                    'id_program' => $newProgram->id,
                ]);
            }
        }
    }
}
