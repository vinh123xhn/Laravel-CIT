<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request,
            [
                'username' => 'required',
                'password' => 'required'
            ]);
        $user = User::where(['username'=>$request->username])->first();
        if($user && Hash::check($request->password, $user->password))
        {
            if($user->active == ACTIVE_TRUE)
            {
                $token = $user->getAuthToken();
                $data = $user->toArray();

                if($token == '') {
                    $data['auth_token'] = sha1('[' . $user->id . '-' . date('Y-m-d H:i:s') . ']');
                    $token = $data['auth_token'];
                }

                User::where(['id'=>$user->id])->update($data);

                $user = $user->toArray();

                $request->session()->put('token', $token);
                $request->session()->put('user', $user);
                return redirect('admin');
            }
            else
            {
                $message = 'User is blocked';
                return redirect('/login', compact('message'));
            }
        }
        else
        {
            $message = 'Invalid username or password';
            return redirect('/login', compact('message'));
        }
    }

    public function logout(Request $request)
    {
        if($request->id)
        {
            User::where(['id'=>$request->id])->update(['auth_token'=>null]);
            $request->session()->flash('message', 'Tài khoản đã đăng xuất');
            $request->session()->forget('user');
            $request->session()->forget('token');
            return redirect('admin');
        }
        else
        {
            $request->session()->flash('message', 'Tài khoản không tồn tại');
            $request->session()->forget('user');
            $request->session()->forget('token');
            return redirect('admin');
        }
    }
}
