<?php

namespace Tests\Feature\Repositories;

use Tests\TestCase;
use App\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserRepositoryTest extends TestCase
{

  use DatabaseTransactions;

  protected function setUp(): void
  {
    parent::setUp();
    $this->user = new UserRepository();
    $this->fakeUser = User::create([
      'name' => 'José Marcos',
      'email' => 'jose@teste.com',
      'password' => bcrypt('secret123'),
      'type_user' => 'administrator'
    ]);
  }

  public function test_validate_if_find_all_return_collection()
  {


    $findAll = $this->user->findAll();
    $this->assertIsObject($findAll);
  }

  public function test_validate_if_return_find_one()
  {

    $findOne = $this->user->findOne($this->fakeUser->id);
    unset($findOne->email_verified_at);
    $this->assertEquals($findOne->toArray(), $this->fakeUser->toArray());
  }
}
