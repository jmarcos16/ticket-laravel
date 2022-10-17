<?php

namespace Tests\Feature\Repositories;

use App\Models\Ticket;
use App\Repositories\TicketRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TicketRepositoryTest extends TestCase
{
  use DatabaseTransactions;
  /**
   * @test
   */
  public function ValidationFindAllTickets()
  {
    $ticket = new TicketRepository;
    $return = $ticket->all();
    $validate = Ticket::all();
    $this->assertEquals($return, $validate);
  }

  /**
   * @test
   */
  public function ValidateFindOneTicketRepositoryUserNotExit()
  {
    $id = 0;
    $ticket = new TicketRepository;
    $return = $ticket->find($id);
    $this->assertNull($return);
  }

  /**
   * @test
   */
  public function ValidateFindOneTicketRepositoryUserExit()
  {
    $id = 1;
    $ticket = new TicketRepository;
    $return = $ticket->find($id);
    $validate = Ticket::find($id);
    $this->assertEquals($return, $validate);
  }

  /**
   *@test
   */

  public function ValalidateInsertTicketInDatabase()
  {
    $data = array(
      'title' => fake()->sentence(),
      'content' => fake()->text(),
      'user_id' => rand(1, 10)
    );
    $ticket = new TicketRepository;
    $ticket->create($data);
    $this->assertDatabaseHas('tickets', ['user_id' => $data['user_id']]);
  }


  /**
   * @test
   */
  public function CheckIfTicketNotExitIn()
  {
    $ticket = new TicketRepository;
    $check = $ticket->find(54448545641);
    $this->assertNull($check);
  }

  /**
   * @test
   */
  public function ValidatesIfTicketDoesDotExist()
  {
    $atributts = [
      'id' => 1783183,
      'title' => fake()->title(),
      'content' => fake()->sentence()
    ];
    $ticket = new TicketRepository;
    $check = $ticket->find($atributts['id']);
    $this->assertNull($check);
  }

  /**
   * @test
   */
  public function ValidateThatTheDatabaseHasBeenUpdated()
  {
    $data = array(
      'id' => 1000,
      'title' => fake()->sentence(),
      'content' => fake()->text(),
      'user_id' => rand(1, 10)
    );
    $ticket = new TicketRepository;
    $newTicket = $ticket->create($data);

    $replace = array(
      'title' => 'new_title',
      'content' => 'new_content'
    );

    $ticket->update($newTicket['id'], $replace);
    $this->assertDatabaseHas('tickets', ['title' => $replace['title']]);
    $this->assertDatabaseHas('tickets', ['content' => $replace['content']]);
  }
}
