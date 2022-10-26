<?php

namespace App\Contracts;

interface TechnicalRepoInterface
{
  public function findAll();
  public function findOne(int $id);
  public function create(array $atributts);
  public function update(int $id, array $atributts);
  public function delete(int $id);
}