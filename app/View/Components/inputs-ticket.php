<?php

namespace App\View\Components;

use Illuminate\View\Component;

class inputsTicket extends Component
{
  /**
   * Create a new component instance.
   *
   * @return void
   */

  private $ticket;

  public function __construct($ticket)
  {
    $this->ticket = $ticket;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.inputs-ticket');
  }
}
