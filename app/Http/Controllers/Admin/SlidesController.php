<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SlidesController extends Controller
{
    public function index()
    {
        return DB::table('carousel')->get();
    }
    public function delete(Request $request)
    {
        return DB::table('carousel')->where('id', $request->id)->delete();
    }
    public function add(Request $request)
    {
        $validate = $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg,svg|max:2000'
        ]);
        if ($validate) {
            $reqDecode = json_decode($request->data, true);
            $file_name = date('Y-m-d H:i:s') . '.' . $request->image->getClientOriginalExtension();
            $file_path = $request->file('image')->storeAs('carousels', $file_name, 'public');
            DB::table('carousel')->insert([
                'link' => $reqDecode['url'],
                'pic' => $file_name,
            ]);
            return response()->json(['alert' => 'Success'], 200);
        } else {
            return response()->json(['alert' => 'Invalid MIME Type'], 404);
        }
    }
}
