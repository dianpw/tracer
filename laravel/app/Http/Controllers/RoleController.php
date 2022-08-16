<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;

use DB;


class RoleController extends Controller

{
    public function index(Request $request)

    {

        $roles = Role::orderBy('id','DESC')->paginate(5);

        return view('roles.index',compact('roles'))

            ->with('i', ($request->input('page', 1) - 1) * 5);

    }

    public function show_data(){
        try {
            $result = [];
            $count = 1;

                $query = Role::select('*')
                    ->orderBy('id','DESC')
                    ->get();

            foreach ($query as $roles) {
                $action_edit = '<center><a href="role/edit/'.$roles->id.'" class="btn btn-success btn-sm m-btn  m-btn m-btn--icon" id="btn-edit-nama-sekolah"
                                data-id="' . $roles->id . '"
                                data-name="' . $roles->name . '"
                                >
                                <span>
                                    <i class="la la-archive"></i>
                                    <span>Update</span>
                                </span>
                                </a>';

                $action_del = '<a href="#" class="btn btn-danger m-btn btn-sm m-btn m-btn--icon" id="btn-delete-nama-sekolah"
                                data-id="' . $roles->id . '">
                                <span>
                                    <i class="la la-warning"></i>
                                    <span>Delete</span>
                                </span>
                                </a></center>';

                $update = $roles->updated_at ? \Carbon\Carbon::parse($roles->updated_at)->format('d-m-Y H:i') : '';
                $data = [];
                $data[] = $count++;
                $data[] = strtoupper($roles->name);
                $data[] = $update;
                $data[] = $action_edit.' '.$action_del;
                $result[] = $data;
            }
            return response()->json(['result' => $result]);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 406);
        }
    }

    public function create()

    {
        $role_evaluasi = Permission::select('*')
                        ->where('tipe_menu', 1)
                        ->get();
        $role_data = Permission::select('*')
                        ->where('tipe_menu', 2)
                        ->get();
        $role_master = Permission::select('*')
                        ->where('tipe_menu', 3)
                        ->get();
        $role_users = Permission::select('*')
                        ->where('tipe_menu', 4)
                        ->get();
        return view('roles.create',compact('role_evaluasi', 'role_data', 'role_master', 'role_users'));
    }


    public function store(Request $request)

    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index')

                        ->with('success','Role created successfully');

    }

    public function show($id)

    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return view('roles.show',compact('role','rolePermissions'));

    }

    public function edit($id)

    {
        $role = Role::find($id);
        $role_evaluasi = Permission::select('*')
                ->where('tipe_menu', 1)
                ->get();
        $role_data = Permission::select('*')
                ->where('tipe_menu', 2)
                ->get();
        $role_master = Permission::select('*')
                ->where('tipe_menu', 3)
                ->get();
        $role_users = Permission::select('*')
                ->where('tipe_menu', 4)
                ->get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('roles.edit',compact('role','role_evaluasi', 'role_data', 'role_master', 'role_users','rolePermissions'));

    }

    public function update(Request $request, $id)

    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index')
                        ->with('success','Role updated successfully');

    }

    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');

    }

}
