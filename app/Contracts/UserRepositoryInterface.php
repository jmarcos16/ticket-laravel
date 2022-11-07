<?php

namespace App\Contracts;


use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

interface UserRepositoryInterface
{
  public function store(Request $atributts);
  public function update(Request $atributts);
  public function all();
  public function find(int $id);
  public function save(User $model, Request $request);
}
