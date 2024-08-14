<?php

namespace Tests\Unit;

use App\Models\Vet\Vet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VetsTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function it_can_create_a_vet()
    {
        $vetData = [
          'name'=>'Ivan',
          'position_id'=>2,
          'email'=>'Ivan@gmail.com',
          'address'=>'Zona B',
          'phone'=>'0889994441',
          'city'=>'Varna',
        ];

        $vet = Vet::create($vetData);

        $this->assertDatabaseHas('vets', $vetData);
    }

    /** @test */
    public function it_can_update_a_vet()
    {
        $vet = Vet::create([
            'name'=>'Ivan',
            'position_id'=>2,
            'email'=>'Ivan@gmail.com',
            'address'=>'Zona B',
            'phone'=>'0889994441',
            'city'=>'Varna',
        ]);

        $updateData = [
            'name'=>'Ivan',
            'position_id'=>2,
            'email'=>'Ivan23@gmail.com',
            'address'=>'Dmitur Blagoev 9',
            'phone'=>'0889994441',
            'city'=>'Varna',
        ];

        $vet->update($updateData);

        $this->assertDatabaseHas('vets',$updateData);

    }

    /** @test */
    public function it_can_delete_a_vet()
    {
        $vet = Vet::create([
            'name'=>'Ivan',
            'position_id'=>2,
            'email'=>'Ivan@gmail.com',
            'address'=>'Zona B',
            'phone'=>'0889994441',
            'city'=>'Varna',
        ]);

        $this->assertDatabaseHas('vets',['id'=>$vet->id]);

        $vet->delete();

        $this->assertSoftDeleted('vets',['id'=>$vet->id]);

//        $this->assertDatabaseMissing('vets',['id'=>$vet->id,'deleted_at' => null]);
//        $this->assertDatabaseHas('vets',[
//           'id' => $vet->id,
//           'deleted_at' => now()->toDateTimeString(),
//        ]);

    }

}
