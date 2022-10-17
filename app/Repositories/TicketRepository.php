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

  /**
   * Create ticket in database
   *
   * @param array $atributts
   * @return array
   */
  public function create(array $atributts)
  {
    $ticket = new Ticket;
    $ticket->title = $atributts['title'];
    $ticket->content = $atributts['content'];
    $ticket->user_id = $atributts['user_id'];
    $ticket->save();

    return $ticket;
  }
  public function update(int $id, array $atributts)
  {
    $ticket = Ticket::find($id)->update([
      'title' => $atributts['title'],
      'content' => $atributts['content']
    ]);

    return $ticket;
  }
  public function delete(int $id)
  {
  }
}
