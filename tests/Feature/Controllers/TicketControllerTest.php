<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TicketControllerTest extends TestCase
{
  /**
   * @test
   */

  public function CheckIndexAllTickets()
  {
    $response = $this->get(route('ticket.all'));
    $response->assertStatus(200);
  }
}
