<?php

namespace App\Http\Controllers;

use App\Service\UsersService;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $users;
    public function __construct(UsersService $usersService)
    {
        $this->users = $usersService;
    }

    public function index()
    {

    }

    public function create(Request $request)
    {
        $name = $request->post("name");
        $email = $request->post("email");
        $password = $request->post("password");

        $id = $this->users->add($name, $email, $password);
        return response()->json(['userId' => $id]);
    }

    public function getUserByName($name)
    {
        $resArr = $this->users->getLike($name);
        return response()->json($resArr);
    }

    public function getUserByDate($from, $to)
    {
        $resArr = $this->users->getDate($from, $to);
        return response()->json($resArr);
    }

    public function getUser($id)
    {
        $resArr = $this->users->one($id);
        return response()->json($resArr);
    }

    function update($id, \Illuminate\Http\Request $request)
    {
        $this->users->update($id, $request->all());
    }

    function delete($id)
    {
        $this->users->delete($id);
    }

}
