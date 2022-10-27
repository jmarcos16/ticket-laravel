<?php

namespace Tests\Feature\Http\Repositories;

use App\Models\Technical;
use App\Repositories\TechnicalRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TechnicalRepositoryTest extends TestCase

{

  use DatabaseTransactions;

  public function testFindAllUserInDatabase()
  {
    $model = new Technical;
    $repository = new TechnicalRepository($model);
    $return = $repository->findAll();

    $this->assertEquals($model->all(), $return);
  }
}
