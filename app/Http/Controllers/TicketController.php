<?php

namespace App\Http\Controllers;

use App\Repositories\TicketRepository;
use Illuminate\Http\Request;

class TicketController extends Controller
{


  protected $ticket;

  public function __construct(TicketRepository $ticket)
  {
    $this->ticket = $ticket;
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $tickets = $this->ticket->all();
    return view('tickets.index', [
      'tickets' => $tickets
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('tickets.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validated = $request->validate([
      'title' => 'required',
      'content' => 'required'
    ]);

    $validated = array_merge($validated, ['user_id' => rand(1, 10)]); //Gambiarra

    $ticket = $this->ticket->create($validated);

    return redirect()
      ->route('ticket.all')
      ->with('success', 'Ticket created successful.');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $ticket = $this->ticket->find($id);

    return view('tickets.show', array(
      'ticket' => $ticket
    ));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $ticket = $this->ticket->find($id);

    return view('tickets.edit', array(
      'ticket' => $ticket
    ));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $validated = $request->validate([
      'title' => 'required',
      'content' => 'required'
    ]);

    $ticket = $this->ticket->update($id, $validated);

    return redirect()
      ->route('ticket.all');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
