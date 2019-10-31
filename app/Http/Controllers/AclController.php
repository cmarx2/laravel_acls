<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acl;
use Redirect, Response;


class AclController extends Controller
{ 
    public function index()
    {
        $acls = Acl::where("key", "fuse_configs")->get()->first()->value;

        return $acls;
    }

    // TODO: create a custom request and validate it if need be
    public function store(Request $request)
    {
        $data = $request->all();
        
        $acl = new Acl();
        $acl->key = "fuse_configs";
        $acl->value = json_encode($data);

        $acl->save();
    }
}
