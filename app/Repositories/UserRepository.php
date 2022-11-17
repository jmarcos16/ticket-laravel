<?php

namespace App\Repositories;


use Illuminate\Http\Request;
use App\Contracts\UserRepositoryInterface;
use App\Models\User;
use Exception;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as AuthUser;

class UserRepository implements UserRepositoryInterface
{

  private $user;

  public function __construct()
  {
    $this->user = new User;
  }

  public function findAll()
  {
    return $this->user->all();
  }


  public function findOne(int $id)
  {
    return $this->user->findOrFail($id);
  }


  public function create(Request $request)
  {

    $validated = $request->validate([
      'name' => 'required',
      'email' => 'required|unique:users',
      'password' => 'required',
      'type_user' => 'required'
    ]);

    $user = $this->getValidateTypeUser($request->input('type_user'));

    $user  = $this->save($user, $request);

    return $user;
  }


  public function update(int $id, Request $request)
  {

    $validated = $request->validate([
      'name' => 'required',
      'email' => 'required',
    ]);

    $findUser = $this->findOne($id);
    $emailExist = $this->user->where('email', $request->input('email'))->first();

    if ($emailExist && $emailExist->id !== $id) {
      throw new Exception('Email areald exist in database');
    }

    return $this->save($findUser, $request);
  }

  public function delete(int $id)
  {

    $user = $this->findOne($id);

    return $user->delete();
  }


  private function save(Model $user, Request $request)
  {

    if ($request->input('password')) {
      $user->password = bcrypt($request->input('password'));
    }

    if ($request->input('type_user')) {
      $user->type_user = $request->input('type_user');
    }

    $user->name = $request->input('name');
    $user->email = $request->input('email');


    $user->save();

    return $user;
  }

  private function getValidateTypeUser(string $type)
  {

    $types = ['technical', 'administrator', 'employee'];

    if (!in_array($type, $types)) {
      throw new Exception('Type user is invalid');
    }
    return $this->user;
  }
}
