<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DownloadController extends Controller
{
    public function downloadById($id)
    {
        $order = Order::find($id);

        if ($order && $order->id_user == Auth::id()) {
            $file = $order->file;
            return response()->download(public_path() . $file->path.'/'.$file->name.'.'.$file->type);
        }

        return abort(403);
    }
}
