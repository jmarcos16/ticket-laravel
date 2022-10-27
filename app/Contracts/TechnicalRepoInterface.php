<?php

namespace App\Contracts;

interface TechnicalRepoInterface
{
  public function findAll(): object;
  public function findOne(int $id): object;
  public function create(array $atributts): object;
  public function update(int $id, array $atributts): object;
  public function delete(int $id);
}
