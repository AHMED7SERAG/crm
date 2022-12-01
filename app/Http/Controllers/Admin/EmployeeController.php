<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware('can:read_users')->only(['index']);
//        $this->middleware('can:create_users')->only(['create', 'store']);
//        $this->middleware('can:update_users')->only(['edit', 'update']);
//        $this->middleware('can:delete_users')->only(['delete', 'bulk_delete']);
    }// end of __construct

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::query()->whereHas('roles',function($q){
                $q->where('name','Employee');
            })->whereNull('locked_by');
            return DataTables::of($data)
                ->addColumn('actions', function ($row){
                    $btn = '<a href="'. route('admin.emmployee.edit', $row->id) .'" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> </a>';
                    $btn .= '<a href="'. route('admin.emmployee.show', $row->id) .'" class="btn btn-primary btn-sm ml-1 mr-1"><i class="fa fa-eye"></i> </a>';
                    $btn .= '<form action="'. route('admin.emmployee.destroy', $row->id) .'" class="my-1 my-xl-0" method="post" style="display: inline-block;">';
                    $btn .= '<input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="'.csrf_token().'">';
                    $btn .= '<button type="submit" class="btn btn-danger btn-sm  btn-jinja-delete"><i class="fa fa-trash"></i> </button>';
                    $btn .= '</form>';
                    return $btn;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('admin.emmployee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $roles = Role::select('id', 'name', 'label')->get();
        $roles = $roles->pluck('label', 'name');
        $user = new User();
        return view('admin.emmployee.create', compact('roles', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|string|max:255|email|unique:users,email',
                'roles' => 'required',
                'password' => 'required',
                'phone' => 'required|integer|max:255|unique:users,phone',
            ]
        );

        $requestData = $request->all();

        if ($request->has('password')) {
            $requestData['password'] = bcrypt($request->password);
        }


        $user = User::create($requestData);

        foreach ($request->roles as $role) {
            $user->assignRole($role);
        }

        return redirect('admin/emmployee')->with('flash_message', __('general.added_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.emmployee.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $roles = Role::select('id', 'name', 'label')->get();
        $roles = $roles->pluck('label', 'name');

        $user = User::with('roles')->select('id', 'name', 'email')->findOrFail($id);
        $user_roles = [];
        foreach ($user->roles as $role) {
            $user_roles[] = $role->name;
        }

        return view('admin.emmployee.edit', compact('user', 'roles', 'user_roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int      $id
     *
     * @return void
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|string|max:255|email|unique:users,email,' . $id,
                'phone' => 'required|integer|unique:users,phone,' . $id,
                'roles' => 'required',
                'password' => 'required'
            ]
        );

        $requestData = $request->except(['password']);
        if ($request->has('password') && $request->password != null) {
            $requestData['password'] = bcrypt($request->password);
        }



        $user = User::findOrFail($id);
        $user->update($requestData);

        $user->roles()->detach();
        foreach ($request->roles as $role) {
            $user->assignRole($role);
        }

        return redirect('admin/emmployee')->with('flash_message', __('general.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('admin/emmployee')->with('flash_message', __('general.deleted_successfully'));
    }

    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $data = User::FindOrFail($recordId);
            $data->delete();

        }//end of for each

        return redirect('admin/emmployee')->with('flash_message', __('general.deleted_successfully'));
    }// end of bulkDelete
}
