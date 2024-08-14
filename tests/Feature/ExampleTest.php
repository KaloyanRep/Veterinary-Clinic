<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

//    public function test_interacting_with_cookies():void
//    {
//        $response = $this->withCookies([
//            'color'=>'blue',
//            'name'=>'Taylor',
//        ])->get('/');
//
//    }

//  public function test_interacting_with_the_session():void
//    {
//  $response = $this->withSession(['banned'=>false])->get('/');
//        $response->ddSession();
//   }

//    public function test_basic_test():void
//    {
//        $response = $this->get('/');
//        $response->ddHeaders();
//
//
//    }

//
//    public function test_exception_is_thrown(): void
//    {
//        Exceptions::fake();
//
//        $response = $this->get('/');
//
//        // Assert an exception was thrown...
//        Exceptions::assertReported(InvalidOrderException::class);
//
//        // Assert against the exception...
//        Exceptions::assertReported(function (InvalidOrderException $e) {
//            return $e->getMessage() === 'The order was invalid.';
//        });
//    }

//    public function test_avatars_can_be_uploaded(): void
//    {
//        Storage::fake('avatars');
//
//        $file = UploadedFile::fake()->image('avatar.jpg');
//
//        $response = $this->post('/avatar', [
//            'avatar' => $file,
//        ]);
//
//        Storage::disk('avatars')->assertExists($file->hashName());
//    }

//

    public function test_console_command(): void
    {
        $this->artisan('inspire')->assertSuccessful();
    }

    public function test_models_can_be_instantiated(): void
    {
        $user = User::factory()->create();

    }

}
