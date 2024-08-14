<?php

namespace Tests\Unit;

use App\Models\Vet\Pet;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PetsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_pet()
    {
        $petData = [
            'name' => 'Bob',
            'owner_id' => '9',
            'color' => 'Brown',
            'gender' => 'male',
            'neutered'=> 0,
        ];

        $pet = Pet::create($petData);

        $this->assertDatabaseHas('pets', $petData);
    }

    /** @test */
    public function it_can_update_a_pet()
    {
        $pet = Pet::create([
            'name' => 'Bob',
            'owner_id' => '9',
            'color' => 'Brown',
            'gender' => 'male',
            'neutered'=> 0,

        ]);

        $updatedData = [
            'name' => 'Bob',
            'owner_id' => '9',
            'color' => 'Yellow',
            'gender' => 'male',
            'neutered'=> 1,
        ];

        $pet->update($updatedData);

        $this->assertDatabaseHas('pets', $updatedData);
    }

    /** @test */
    public function it_can_delete_a_pet()
    {
        $pet = Pet::create([
            'name' => 'Bob',
            'owner_id' => 9,
            'color' => 'Brown',
            'gender' => 'male',
            'neutered' => 0,
        ]);

        $this->assertDatabaseHas('pets', ['id' => $pet->id]); // Verify pet exists

        $pet->delete();

        $this->assertDatabaseMissing('pets', ['id' => $pet->id, 'deleted_at' => null]); // Verify pet is deleted (soft deleted)
        $this->assertDatabaseHas('pets', [
            'id' => $pet->id,
            'deleted_at' => now()->toDateTimeString(), // or use whereNotNull('deleted_at')
        ]);
    }
}
