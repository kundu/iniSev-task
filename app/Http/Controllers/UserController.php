<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function manage(){
        $data['title'] = "System User List";
        $data['roles'] = Role::orderBy('name', 'asc')->pluck('name', 'id');
        $data['users'] = User::with('roles')->where('type', 'Admin')->paginate(20);
        return view('admin-panel.pages.users', $data);
    }

    public function userStore(Request $request){
        $request->validate([
            'name'                  => 'required|string|max:100',
            'role_id'               => 'required|exists:roles,id',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);
        try{
            DB::beginTransaction();
            $user           = new User();
            $user->name     = $request->name;
            $user->email    = $request->email;
            $user->type     = "Admin";
            $user->password = Hash::make($request->password);
            $user->save();
            $role = Role::find($request->role_id);
            $user->assignRole($role->name);
            DB::commit();
            return redirect()->back()->with('success', 'Successfully Created');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex);
            return redirect()->back()->with('error', 'Internal Server Error');
        }
    }

    public function userUpdate(Request $request){
        $request->validate([
            'id'                    => 'required|exists:users,id',
            'name'                  => 'required|string|max:100',
            'role_id'               => 'required|exists:roles,id',
            'email'                 => 'required|email|unique:users,email,'.$request->id,
            'password'              => 'nullable|min:6|same:password_confirmation',
            'password_confirmation' => 'nullable|min:6'
        ]);
        try{
            DB::beginTransaction();
            $user        = User::find($request->id);
            $user->name  = $request->name;
            $user->email = $request->email;
            if($request->password){
                $user->password = Hash::make($request->password);
            }
            $user->save();
            if($request->id != 1){
                $role = Role::find($request->role_id);
                $user->syncRoles($role->name);
            }

            DB::commit();
            return redirect()->back()->with('success', 'Successfully Updated');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex);
            return redirect()->back()->with('error', 'Internal Server Error');
        }
    }

    public function role(){
        $data['title']       = "System Role List";
        $data['permissions'] = Permission::orderBy('name', 'asc')->pluck('name', 'id');
        $data['roles']       = Role::with('permissions')->paginate(50);
        return view('admin-panel.pages.role', $data);
    }

    public function roleStore(Request $request){
        $request->validate([
            'name'           => 'required|string|max:50',
            'permission_ids' => 'required',
        ]
    );
        try{
            $role = Role::create(['name' => $request->name]);
            $role->givePermissionTo(Permission::whereIn('id', $request->permission_ids)->get());
            DB::commit();
            return redirect()->back()->with('success', 'Successfully Created');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex);
            return redirect()->back()->with('error', 'Internal Server Error');
        }
    }

    public function roleUpdate(Request $request){
        $request->validate([
            'id'            => 'required|exists:roles,id',
            'name'          => 'required|string|max:50',
            'permission_id' => 'required',
        ]
    );
        try{
            if($request->id == 1){
                return redirect()->back()->with('warning', 'System super admin role can not be modified.');
            }
            $role       = Role::find($request->id);
            $role->name = $request->name;
            $role->save();
            $permissions = $request->input('permission_id');
            if (count($permissions)) {
               $role->syncPermissions($permissions);
            }
            DB::commit();
            return redirect()->back()->with('success', 'Successfully Updated');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex);
            return redirect()->back()->with('error', 'Internal Server Error');
        }
    }

    public function passwordChange(){
        $data['title'] = "Password Change";
        return view('admin-panel.pages.password-change', $data);
    }

    public function passwordChangeUpdate(Request $request){
        $request->validate([
                'name'                  => 'required|string|max:50',
                'password'              => 'nullable|min:8|max:50|same:password_confirmation',
                'password_confirmation' => 'nullable|min:8|max:50'
            ]
        );
        try{
            $user = User::find(auth()->user()->id);
            $user->name = $request->name;
            if($request->password){
                $user->password = Hash::make($request->password);
            }
            $user->save();
            return redirect()->back()->with('success', 'Successfully Updated');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex);
            return redirect()->back()->with('error', 'Internal Server Error');
        }
    }
}
