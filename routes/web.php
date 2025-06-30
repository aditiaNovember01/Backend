<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6',
    ]);
    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);
    Auth::login($user);
    return redirect('/')->with('success', 'Register berhasil!');
});

Route::get('/profile', function () {
    return view('profile');
})->middleware('auth')->name('profile');

Route::post('/profile', function (Illuminate\Http\Request $request) {
    $user = \App\Models\User::find(Auth::id());
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
    ]);
    $user->update($validated);
    return redirect()->route('profile')->with('success', 'Profil berhasil diupdate!');
})->middleware('auth');

Route::post('/profile/password', function (Illuminate\Http\Request $request) {
    $user = Auth::user();
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|string|min:6|confirmed',
    ]);
    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Password lama salah!']);
    }
    $user->password = Hash::make($request->new_password);
    $user->save();
    return back()->with('success', 'Password berhasil diubah!');
})->middleware('auth')->name('profile.password');

Route::post('/profile/photo', function (Illuminate\Http\Request $request) {
    $user = Auth::user();
    $request->validate([
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    $file = $request->file('photo');
    $filename = 'user_' . $user->id . '.' . $file->getClientOriginalExtension();
    $file->storeAs('public/profile_photos', $filename);
    $user->profile_photo = $filename;
    $user->save();
    return back()->with('success', 'Foto profil berhasil diupload!');
})->middleware('auth')->name('profile.photo');

Route::post('/login', function (Illuminate\Http\Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);
    if (Auth::attempt($credentials, $request->has('remember'))) {
        $request->session()->regenerate();
        return redirect()->intended('/');
    }
    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->withInput();
})->name('login.post');

Route::post('/logout', function (Illuminate\Http\Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');
