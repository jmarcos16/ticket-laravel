<?php

namespace Tests\Feature\Repositories;

use App\Models\Administrator;
use App\Models\Employee;
use App\Models\Technical;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{

  use DatabaseTransactions;

  private $userReposistory;

  protected function setUp(): void
  {
    parent::setUp();

    $technical = new Technical;
    $employee = new Employee;
    $administrator = new Administrator;

    $this->userReposistory = new UserRepository($technical, $employee, $administrator);
    $this->employee = new Employee;
  }


  public function test_check_if_provider_is_not_valid()
  {

    $data = ['name' => 'jose', 'email' => 'jose', 'password' => 'dbwbia', 'provider' => 'incorrect_provider'];
    $request = Request::create(route('ticket.store'), 'POST', $data);

    $errorHappened = false;

    try {
      $return = $this->userReposistory->store($request);
    } catch (\Throwable $e) {
      $errorHappened = true;
      $this->assertEquals('Provider is not valid', $e->getMessage());
    }

    $this->assertTrue($errorHappened);
  }

  public function test_check_if_user_email_exist_in_database()
  {
    $data = ['name' => 'José Marcos', 'email' => 'jose@gmail.com', 'password' => 'secret123', 'provider' => 'employee'];
    $request = Request::create(route('ticket.store'), 'POST', $data);

    $fakeUser = $this->employee->create([
      'name' => 'José Marcos',
      'email' => 'jose@gmail.com',
      'password' => 'secret123',
    ]);



    $errorHappened = false;

    try {
      $return = $this->userReposistory->store($request);
    } catch (\Throwable $e) {
      $errorHappened = true;
      $this->assertEquals('Email already exists, try another one.', $e->getMessage());
    }

    $this->assertTrue($errorHappened);
  }


  public function test_validate_if_the_user_was_created()
  {

    $data = ['name' => 'usertest', 'email' => 'test@gmail.com', 'password' => 'secret123', 'provider' => 'technical'];
    $request = Request::create(route('ticket.store'), 'POST', $data);
    $return = $this->userReposistory->store($request);

    $this->assertDatabaseHas('technicals', ['name' => 'usertest', 'email' => 'test@gmail.com']);
    $this->assertIsObject($return);
  }


  public function test_validating_select_all_users_in_database()
  {
    $userAll = $this->userReposistory->all();

    $this->assertTrue(in_array('employee', array_keys($userAll)));
    $this->assertTrue(in_array('administrator', array_keys($userAll)));
    $this->assertTrue(in_array('technical', array_keys($userAll)));
    $this->assertIsArray($userAll);
  }
}
