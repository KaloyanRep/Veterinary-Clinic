<?php

namespace Tests\Unit;

use App\Models\Vet\Clinic;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClinicsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_clinic()
    {
        $clinicData = [
            'id' => 1,
            'name' => 'ILovePets',
            'type' => 'Orthopedics',
            'address' => 'Vasil Levski',
        ];

        $clinic = Clinic::create($clinicData);
        $this->assertDatabaseHas('clinics', $clinicData);
    }

    /** @test */
    public function it_can_update_a_clinic()
    {
        $clinic = Clinic::create([
            'id' => 1,
            'name' => 'ILovePets',
            'type' => 'Orthopedics',
            'address' => 'Vasil Levski',
        ]);

        $updateData = [
            'id' => 1,
            'name' => 'ILovePets',
            'type' => 'Dermatology',
            'address' => 'Alen Mak',
        ];

        $clinic->update($updateData);

        $this->assertDatabaseHas('clinics', $updateData);
    }

    /** @test */
    public function it_can_delete_a_clinic()
    {
        $clinic = Clinic::create([
            'id' => 1,
            'name' => 'ILovePets',
            'type' => 'Orthopedics',
            'address' => 'Vasil Levski',
        ]);

        $this->assertDatabaseHas('clinics', ['id' => $clinic->id]);

        $clinic->delete();

        // Verify that the clinic is missing from the database
        $this->assertSoftDeleted('clinics', ['id' => $clinic->id]);
    }
}
