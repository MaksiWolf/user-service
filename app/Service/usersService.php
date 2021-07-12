<?php


namespace App\Service;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UsersService
{
    public function all()
    {
        $users = DB::table('users')
            ->select('*')
            ->get()
        ;
        return $users->all();
    }

    public function add($name, $email, $password)
    {
        return DB::table('users')->insertGetId(
            [
             'name' => $name,
             'email' => $email,
             'password' => $password,
            ]
        );
    }

    public function one($id)
    {
        return DB::table('users')
            ->select('*')
            ->where('id', $id)
            ->first()
        ;
    }

    public function getLike($name)
    {
        return DB::table('users')
            ->select('*')
            ->where('name', 'like', $name.'%')
            ->get()
            ->toArray()
        ;
    }

    public function getDate($from, $to)
    {
        return DB::table('users')
            ->select('*')
            ->where('created_at', '>', $from)
            ->where('created_at', '<', $to)
            ->get()
            ->toArray()
        ;
    }

    public function update($id, $paramsArr)
    {
        DB::table('users')
            ->where('id', $id)
            ->update($paramsArr)
        ;
    }

    public function delete($id)
    {
        DB::table('users')->where('id', '=', $id)->delete();
    }

}
