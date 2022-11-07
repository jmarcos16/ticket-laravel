<?php

namespace App\Contracts;

interface TicketRepoInterface
{
  public function all();
  public function find($id);
  public function create(array $atributts);
  public function update(int $id, array $atributts);
  public function delete(int $id);
}
