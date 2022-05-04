<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stores;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    public function index()
    {
        return Stores::orderBy('id', 'DESC')->get();
    }
    public function add(Request $request)
    {
        $validate = $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg,svg|max:1000'
        ]);
        if ($validate) {
            $reqDecode = json_decode($request->data, true);
            $file_name = $reqDecode['title'] . '.' . $request->image->getClientOriginalExtension();
            $file_path = $request->file('image')->storeAs('stores', $file_name, 'public');
            Stores::updateOrCreate([
                'title' => $reqDecode['title'],
                'website' => $reqDecode['url'],
                'pic' => $file_name,
            ]);
            return response()->json(['alert' => 'Success'], 200);
        } else {
            return response()->json(['alert' => 'Invalid MIME Type'], 404);
        }
    }
    public function delete(Request $request)
    {
        return Stores::where('id', $request->id)->delete();
    }
}
