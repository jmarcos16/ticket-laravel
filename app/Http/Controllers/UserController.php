<?php

namespace App\Http\Controllers;

use App\Contracts\UserRepositoryInterface;
use Exception;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


  private $user;

  public function __construct(UserRepositoryInterface $user)
  {
    $this->user = $user;
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $users = $this->user->findAll();

    return view('users.index', array(
      'users' => $users
    ));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('users.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    try {

      $user = $this->user->create($request);
      return redirect()
        ->route('user.dash')
        ->with('success', 'User created sucessfull.');
    } catch (\Throwable $th) {

      return redirect()
        ->route('user.dash')
        ->with('error', $th->getMessage());
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $user = $this->user->findOne($id);

    return view('users.edit', array(
      'user' => $user
    ));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    try {

      $user = $this->user->update($id, $request);

      return redirect()->route('user.dash')->with('success', 'Edit User Successfull.');
    } catch (\Throwable $th) {
      return redirect()->route('user.dash')->with('error', $th->getMessage());
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    try {
      $user = $this->user->delete($id);

      return redirect()->route('user.dash')->with('success', 'Deleted User Successfull.');
    } catch (\Throwable $th) {
      return redirect()->route('user.dash')->with('error', $th->getMessage());
    }
  }


  public function validateProviderTypeUser($type)
  {
    $types = ['employee', 'technical', 'administrator'];

    $validation = in_array($type, $types);

    if (!$validation) {
      throw new Exception('Type user is not valid.');
    }

    return new User;
  }
}
