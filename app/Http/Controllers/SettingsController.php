<?php

namespace App\Http\Controllers;

use App\Http\Request\SettingsRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Storage;

class SettingsController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('settings');
    }

    public function update(SettingsRequest $request) {
        $data = $request->validated();

        $user = Auth::user();

        $file = $data['image'];
        $fileExt = $file->getClientOriginalExtension();
        $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $storeFileName = str_replace(' ', '_', $fileName . '_' . now() . '.' . $fileExt);

        if ($user->image != 'default.jpg') {
            Storage::disk('public')->delete('profile_img/' . $user->image);
        }

        $file->move('storage/profile_img', $storeFileName);

        $user->image = $storeFileName;
        $user->save();

        return redirect()->route('settings')->with('status', 'Profile image updated successfully!');
    }
}
