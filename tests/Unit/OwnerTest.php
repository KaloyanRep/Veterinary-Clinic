<?php

namespace Tests\Unit;

use App\Models\Vet\Owner;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OwnerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_an_owner()
    {
        $ownerData = [
            'name' => 'John Doe',
            'address' => '123 Main St',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
        ];

        $owner = Owner::create($ownerData);

        $this->assertDatabaseHas('owners', $ownerData);
    }

    /** @test */
    public function it_can_update_an_owner()
    {
        $owner = Owner::create([
            'name' => 'John Doe',
            'address' => '123 Main St',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
        ]);

        $updatedData = [
            'name' => 'Jane Doe',
            'address' => '456 Main St',
            'email' => 'janedoe@example.com',
            'phone' => '0987654321',
        ];

        $owner->update($updatedData);

        $this->assertDatabaseHas('owners', $updatedData);
    }

    /** @test */
    /** @test */
    public function it_can_delete_an_owner()
    {
        $owner = Owner::create([
            'name' => 'John Doe',
            'address' => '123 Main St',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
        ]);

        $owner->delete();


        $this->assertSoftDeleted('owners', ['id' => $owner->id]);
    }

}
