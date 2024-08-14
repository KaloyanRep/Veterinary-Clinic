<?php

namespace Tests\Unit;

use App\Models\Vet\Visit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VisitsTest extends TestCase
{
    use RefreshDatabase;

   /** @test */
    public function it_can_create_visits()
    {
    $visitsData = [
        'vet_id'=>1,
        'pet_id'=>6,
        'arrived_at'=>'2024-06-27',
        'total_amount'=>5,
        'diagnose'=>'vomiting',
        ];

    $visit = Visit::create($visitsData);
    $this->assertDatabaseHas('visits',$visitsData);
    }

    /** @test */
    public function it_can_update_visits()
    {
        $visit = Visit::create([
            'vet_id'=>1,
            'pet_id'=>6,
            'arrived_at'=>'2024-06-27',
            'total_amount'=>5,
            'diagnose'=>'vomiting',
        ]);

        $updateData = [
            'vet_id'=>1,
            'pet_id'=>6,
            'arrived_at'=>'2024-06-26',
            'total_amount'=>10,
            'diagnose'=>'itching',
        ];

        $visit->update($updateData);
        $this->assertDatabaseHas('visits',$updateData);

    }

    /** @test */
    public function it_can_delete_visits()
    {
        $visit = Visit::create([
            'vet_id'=>1,
            'pet_id'=>6,
            'arrived_at'=>'2024-06-27',
            'total_amount'=>5,
            'diagnose'=>'vomiting',
        ]);

        $this->assertDatabaseHas('visits',['id'=>$visit->id]);

        $visit->delete();

        $this->assertSoftDeleted('visits',['id'=>$visit->id]);

    }

}
