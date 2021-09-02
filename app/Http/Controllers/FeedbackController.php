<?php

namespace App\Http\Controllers;


use App\Models\File;
use App\Models\Order;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    public function index() {
        return view('feedback');
    }

    public function createOrder(Request $request) {

        $validated = $request->validate([
            'name' => ['string','required'],
            'phone' => ['required', 'regex:/\+{1}([0-9]){11}/'],
            'company' => ['string','required'],
            'order_name' => ['string','required'],
            'message' => ['string','required'],
            'file' => 'max:5120',
        ]);

        $order = new Order();
        $order->id_user = Auth::id();
        $order->name = $request->post('name');
        $order->phone = $request->post('phone');
        $order->company = $request->post('company');
        $order->order_name = $request->post('order_name');
        $order->message = $request->post('message');

        if($request->hasFile('file'))
        {
            $file = $request->file('file');

            $path = '/uploads/orders';
            $fileName= 'file_'.Auth::id().'_'.time();
            $type = $file->extension();

            $file->move(public_path().$path, $fileName.'.'.$type);

            $fileModel = new File([
                'name' => $fileName,
                'type' => $type,
                'path' => $path
            ]);
            $fileModel->save();

            $order->id_file = $fileModel->id;
        }

        $order->save();

        return redirect()->back()->with('status', 'Заявка успешно отправлена');
    }
}
