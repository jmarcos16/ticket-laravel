<?php

namespace Tests\Feature\Repositories;

use Tests\TestCase;

class UserRepositoryTest extends TestCase
{

  public function testVerifyIfProviderIsNotValid()
  {

    $data = ['provider' => 'technicals'];
    $response  =  $this->post(route('user.store'), $data);

    $response->assertRedirect(route('ticket.create'));
    $response->assertStatus(200);
  }
}
