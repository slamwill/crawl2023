<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Str;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAllUsersWithPagination(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // $this->userService->createUser($request->all());
        // return redirect()->route('users.index')->with('success', 'User created successfully.');

        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'gender' => 'nullable|in:male,female,other',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
        ]);

        // 檢查是否提供密碼
        if (!$request->has('password')) {
            // 自動生成隨機密碼
            $validatedData['password'] = bcrypt(Str::random(10)); // 使用 Str::random(10) 生成一個隨機的10位密碼
        } else {
            // 如果有提供密碼，則進行加密
            $validatedData['password'] = bcrypt($request->input('password'));
        }

        // 創建使用者
        User::create($validatedData);


        return redirect()->route('users.index')->with('success', 'User created successfully.');

        // return response()->json(['message' => 'User created successfully.'], 201);
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->userService->updateUser($user, $request->all());
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $this->userService->deleteUser($user);
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
