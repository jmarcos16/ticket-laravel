<?php

namespace App\Repositories;

use App\Contracts\TicketRepoInterface;
use App\Models\Ticket;

class TicketRepository implements TicketRepoInterface
{

  /**
   * Return all tickets
   *
   * @return array
   */
  public function all()
  {
    return Ticket::all();
  }

  /**
   * Return ticket for id
   *
   * @param integer $id
   * @return array
   */
  public function find(int $id)
  {
    return Ticket::find($id);
  }
  public function create(array $atributts)
  {
  }
  public function update(int $id, array $atributts)
  {
  }
  public function delete(int $id)
  {
  }
}
