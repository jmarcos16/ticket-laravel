<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPSTORM_META\map;

class TicketControllerTest extends TestCase
{
  /**
   * @test
   */
  public function ValidateReturnIndexTicket()
  {
    $response = $this->get(route('ticket.all'));
    $response->assertViewIs('tickets.index');
    $response->assertViewHasAll(['tickets']);
    $response->assertStatus(200);
  }

  /**
   * @test
   */

  public function CheckingTheReturnFromCreate()
  {
    $response = $this->get(route('ticket.create'));
    $response->assertStatus(200);
    $response->assertViewIs('tickets.create');
  }

  /**
   * @test
   */
  public function ValidatingIfTheValues​IsEmpry()
  {
    $response = $this->post(route('ticket.store'), []);
    $response->assertSessionHasErrors();
  }

  /**
   * @test
   */

  public function CheckingTheReturnFromStore()
  {

    $data = array(
      'title' => 'Title of ticket',
      'content' => 'Content of Ticket',
      'user_id' => 10
    );

    $response = $this->post(route('ticket.store'), $data);
    $response->assertRedirect(route('ticket.all'));
  }

  /**
   * @test
   */

  public function CheckingTheReturnFromShow()
  {
    $response = $this->get(route('ticket.show', 1));
    $response->assertViewIs('tickets.show');
    $response->assertViewHasAll(['ticket']);
  }

  /**
   * @test
   */
  public function CheckingTheReturnFromEdit()
  {
    $response = $this->get(route('ticket.edit', 1));
    $response->assertViewIs('tickets.edit');
    $response->assertViewHasAll(['ticket']);
  }

  /**
   * @test
   */
  public function CheckingTheReturnFromUpdate()
  {
    $data = array(
      'title' => 'Title of ticket',
      'content' => 'Content of Ticket',
    );

    $response = $this->put(route('ticket.update', 1), $data);
    $response->assertRedirect(route('ticket.all'));
  }
}
