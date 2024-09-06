<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use App\Models\UserDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;



class UserController extends Controller
{
    protected $module, $data = [];

    public function __construct()
    {
        $this->module = new User();
        $this->data['module_name'] = 'User';
        $this->data['view_directory'] = 'pages.users';
        $this->data['parent_named_route'] = 'users';
    }

    public function index()
    {
        $users = User::with('department.location')->get();

        return response()->json([
            'success' => true,
            'data' => $users
        ]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols(), 'max:64'],
                'phone' => 'required|string|max:20',
                'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validate the image file
                'status' => 'required|boolean',
            ]);

            $input = $request->all();
            if ($request->hasFile('picture')) {
                $input['picture'] = $this->media($request, 'users');
            }
            $input['password'] = Hash::make($input['password']);

            $user = User::create($input);

            if ($request->role) {
                $user->assignRole($request->input('role'));
            }

            return redirect()->route($this->data['parent_named_route'] . '.index')->with('success', $this->data['module_name'] . ' created successfully');
        }

        $this->data['roles'] = Role::all();
        return view($this->data['view_directory'] . '.' . __FUNCTION__, $this->data);
    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('post')) {

            $user = User::findOrFail($id);

            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'password' => ['nullable', Password::min(8)->mixedCase()->numbers()->symbols(), 'max:64'],
                'phone' => 'required|string|max:20',
                'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validate the image file
                'status' => 'required|boolean',
            ]);

            $input = $request->except(['password', '_token']);
            if ($request->hasFile('picture')) {
                $input['picture'] = $this->media($request, 'users');
            }

            if ($request->password) {
                $input['password'] = Hash::make($request->password);
            }

            $user = User::where('id', $id)->update($input);

            if ($request->role) {
                $user->assignRole($request->input('role'));
            }

            return redirect()->route($this->data['parent_named_route'] . '.index')->with('success', $this->data['module_name'] . ' updated successfully');
        }

        $user = User::find($id);

        // $this->data['userRole'] = $user->roles->first()->name;
        $this->data['user'] = $user;
        $this->data['roles'] = Role::where('guard_name', 'web')->get();

        return view($this->data['view_directory'] . '.' . __FUNCTION__, $this->data);
    }

    public function view(Request $request)
    {
        $this->data['user'] = $this->module::withCount('devices')
            ->withCount('cards')
            ->withCount('posts')
            ->withCount('events')
            ->withCount('tournaments')
            ->withCount('reviews')
            ->with(['activities' => function ($query) {
                $query->take(5);
            }])
            ->find($request->id);

        $this->data['page'] = __FUNCTION__;

        return view($this->data['view_directory'] . '.' . __FUNCTION__, $this->data);
    }

    public function status($id)
    {
        $user = $this->module::find($id);
        $user->status = $user->status ? '0' : '1';
        $user->save();

        return redirect()->back()->with('success', $this->data['module_name'] . ' status updated successfully');
    }

    public function delete($id)
    {
        $user = $this->module::find($id);

        if ($user) {
            $user->delete();

            return redirect()->back()->with('success', $this->data['module_name'] . ' deleted successfully');
        }

        return redirect()->back()->with('error', 'User not found');
    }
}
