<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Models\Technical;
use Illuminate\Http\Request;
use App\Models\Adiministrator;
use Illuminate\Foundation\Auth\User;
use App\Contracts\UserRepositoryInterface;
use Exception;

class UserRepository implements UserRepositoryInterface
{
  public function all()
  {
  }
  public function store(Request $request)
  {

    $validateModel = $this->validateProvider($request->input('provider'));
    $validateEmailUnique = $validateModel->where('email', $request->input('email'))->first();

    if ($validateEmailUnique) {
      throw new Exception('Email already exists, try another one.');
    }

    $validateModel = $this->save($validateModel, $request);

    return $validateModel;
  }
  public function update(Request $request)
  {
  }


  /**
   * persist user in database
   *
   * @param ModelsUser $model
   * @param Request $request
   * @return Illuminate\Foundation\Auth\User
   */
  public function save(User $model, Request $request)
  {

    if ($request->input('id')) {
      $model->id = $request->input('id');
    }

    $model->name = $request->input('name');
    $model->email = $request->input('email');
    $model->password = bcrypt($request->input('password'));

    $model->save();

    return $model;
  }

  public function find(int $id)
  {
  }

  private function validateProvider(string $provider): User
  {

    if ($provider == 'employee') {
      return new Employee();
    }

    if ($provider == 'technical') {
      return new Technical();
    }

    if ($provider == 'administrator') {
      return new Adiministrator();
    }

    throw new \Exception('Provider is not valid');
  }
}
