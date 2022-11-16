<?php

namespace App\Contracts;


use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

interface UserRepositoryInterface
{
  public function findAll();
  public function findOne(int $id);
  public function create(Request $atributts);
  public function update(int $id, Request $atributts);
  public function delete(int $id);
}
