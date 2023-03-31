<?php

namespace App\Http\Controllers;

use App\Http\Resources\Permission\PermissionResource;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    private $permission;


    public function __construct(Permission $permission)
    {
        $this->permission = $permission;

    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = $this->permission->paginate();

        return PermissionResource::collection($permissions);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function store(Request $request)
    {

        $permissions = $this->permission->create(["name"=>$request->name]);

        return new PermissionResource($permissions);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $permissions = $this->permission->findOrFail($id);
        return new PermissionResource($permissions);
        //
    }


    public function update(Request $request,$id)
    {
        $permissions = $this->permission->findOrFail($id);
        $permissions->update(["name"=>$request->name]);
        return new PermissionResource($permissions);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $permissions = $this->permission->findOrFail($id);
        $permissions->delete();
        return new PermissionResource($permissions);

        //
    }
}
