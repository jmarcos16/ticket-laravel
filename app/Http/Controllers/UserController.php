<?php

namespace App\Http\Controllers;

use App\Contracts\UserRepositoryInterface;
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
    $allUser = $this->user->all();
    return view('users.index', array(
      'users' => $allUser
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

      $user = $this->user->store($request);

      return redirect()
        ->route('user.dash')
        ->with('success', 'User registered successfully');
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
  public function show($id, $provider)
  {
    try {

      $user = $this->user->find($id, $provider);
      return view('users.show', array(
        'user' => $user
      ));
    } catch (\Throwable $th) {

      return redirect()
        ->route('user.dash')
        ->with('error', $th->getMessage());
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @param string $provider
   * @return \Illuminate\Http\Response
   */
  public function edit($id, string $provider)
  {
    try {

      $user = $this->user->find($id, $provider);
      return view('users.edit', array(
        'user' => $user
      ));
    } catch (\Throwable $th) {

      return redirect()
        ->route('user.dash')
        ->with('error', $th->getMessage());
    }
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

      $user = $this->user->update($request, $id);

      return redirect()
        ->route('user.dash')
        ->with('success', 'User edit successfully');
    } catch (\Throwable $th) {
      return redirect()
        ->route('user.dash')
        ->with('error', $th->getMessage());
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
    //
  }
}
