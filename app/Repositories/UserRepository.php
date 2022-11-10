<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Models\Technical;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use App\Contracts\UserRepositoryInterface;
use App\Models\Administrator;
use Exception;
use Illuminate\Foundation\Validation\ValidatesRequests;

class UserRepository implements UserRepositoryInterface
{

  private $technical;
  private $employee;
  private $administrator;

  public function __construct(
    Technical $technical,
    Employee $employee,
    Administrator $administrator
  ) {
    $this->administrator = $administrator;
    $this->technical = $technical;
    $this->employee = $employee;
  }

  public function all()
  {

    $user = array();

    $technical = $this->technical->all();
    $administrator = $this->administrator->all();
    $employee = $this->employee->all();

    $user['technical'] = $technical;
    $user['administrator'] = $administrator;
    $user['employee'] = $employee;

    return $user;
  }
  public function store(Request $request)
  {

    $validated = $request->validate([
      'name' => 'required',
      'email' => 'required',
      'password' => 'required'
    ]);

    $user = $this->validateProvider($request->input('provider'));
    $validateEmailUnique = $user->where('email', $request->input('email'))->first();

    if ($validateEmailUnique) {
      throw new Exception('Email already exists, try another one.');
    }


    $user = $this->save($user, $request);

    return $user;
  }


  public function update(Request $request, int $id)
  {

    $validated = $request->validate([
      'name' => 'required',
      'email' => 'required'
    ]);

    $user = $this->validateProvider($request->input('provider'));
    $validateEmailUnique = $user->where('email', $request->input('email'))->first();

    if ($validateEmailUnique && $validateEmailUnique->id !== $id) {
      throw new Exception('Email already exists, try another one.');
    }

    $user = $this->save($user, $request);

    return $user;
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
    if ($request->password) {
      $model->password = bcrypt($request->input('password'));
    }

    $model->name = $request->input('name');
    $model->email = $request->input('email');


    $model->save();

    return $model;
  }

  public function find(int $id, string $provider)
  {

    $user = $this->validateProvider($provider);
    $user = $user->find($id);

    if (!$user) {
      throw new Exception($provider . ' not found');
    }

    return $user;
  }

  private function validateProvider(string $provider): User
  {

    if ($provider == 'employee') {
      return $this->employee;
    }

    if ($provider == 'technical') {
      return $this->technical;
    }

    if ($provider == 'administrator') {
      return $this->administrator;
    }

    throw new \Exception('Provider is not valid');
  }
}
