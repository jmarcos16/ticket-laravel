<?php

namespace App\Repositories;

use App\Contracts\TechnicalRepoInterface;
use App\Models\Technical;
use PhpParser\Node\Expr\Cast\Object_;
use stdClass;

class TechnicalRepository implements TechnicalRepoInterface
{

  public function __construct(private Technical $technical)
  {
    $this->technical = $technical;
  }


  /**
   * Find all technical
   *
   * @return object
   */
  public function findAll(): object
  {
    return $this->technical->all();
  }
  /**
   * find technical with to id
   *
   * @param  mixed $id
   * @return object
   */
  public function findOne(int $id): object
  {
    return $this->technical->find($id);
  }
  /**
   * create new technical
   *
   * @param  mixed $atributts
   * @return object
   */
  public function create(array $atributts): object
  {
    $technical = $this->technical->create([
      'name' => $atributts['name'],
      'email' => $atributts['email'],
      'password' => bcrypt($atributts['password'])
    ]);

    return $technical;
  }
  /**
   * update user with atributts provided
   *
   * @param  mixed $id
   * @param  mixed $atributts
   * @return object
   */
  public function update(int $id, array $atributts): object
  {
    $technical = $this->technical->find($id)
      ->update([
        'name' => $atributts['name'],
        'email' => $atributts['email']
      ]);

    if ($atributts['password']) {
      $technical->update([
        'password' => bcrypt('password')
      ]);
    }

    return $technical;
  }
  /**
   * delete user with id
   *
   * @param  mixed $id
   * @return object
   */
  public function delete(int $id)
  {
    $technical = $this->technical->delete($id);
    return $technical;
  }
}
