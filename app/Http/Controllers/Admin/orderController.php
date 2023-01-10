<?php

namespace App\Http\Controllers\Admin;

use App\Mail\OrderMail;
use App\Models\DetailsOrder;
use App\Models\Order;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Payment;
use App\Models\GiftCard;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class orderController extends Controller
{
    private $order;
    private $orderRepo;

    public function __construct(OrderRepository $repository)
    {
        $this->middleware(
            'permission:order-list|order-create|order-edit|order-delete',
            ['only' => ['index', 'notSent', 'show']]
        );
        //        $this->middleware('permission:order-create', ['only' => ['create','store']]);
        $this->middleware('permission:order-edit', [
            'only' => ['edit', 'update', 'status'],
        ]);
        $this->middleware('permission:order-delete', [
            'only' => ['destroy', 'detailDestroy', 'status'],
        ]);

        $this->order = new Order();
        $this->orderRepo = $repository;
    }

    public function index()
    {
        if (Cache::has('orders')) {
            $orders = Cache::get('orders');
        } else {
            $orders = $this->order
                ->with(['address', 'giftCard', 'users', 'payment'])
                ->paginate(15);
        }
        return view('admin.orders.index', compact('orders'));
    }

    public function notSent()
    {
        $orders = $this->order
            ->where('order_status', 0)
            ->with(['address', 'giftCard', 'users', 'payment'])
            ->paginate(5);
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $this->orderRepo->checkId($id);
        $order = $this->order
            ->with(['address', 'payment', 'giftCard', 'users', 'detailsOrder'])
            ->where('order_id', $id)
            ->first();
        return view('admin.orders.show', compact('order'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $order = $this->orderRepo->destroy($id);
        return $this->orderRepo->passViewAfterDeleted($order, 'orders');
    }

    public function detailDestroy($id)
    {
        $this->orderRepo->checkId($id);
        $d_order = DetailsOrder::findOrFail($id)->delete();
        return $this->orderRepo->passViewAfterDeleted(
            $d_order,
            'detailsOrders'
        );
    }

    public function status($id, $status)
    {
        $order = $this->orderRepo->find($id);
        $email = $order->client_email;
        if ($status == 'sent') {
            $editedOrder = $order->update(['order_status' => 2]);
            $order = ['code' => "$order->track_code", 'status' => 'sent '];
        } elseif ($status == 'delivered') {
            $editedOrder = $order->update(['order_status' => 3]);
            $order = ['code' => "$order->track_code", 'status' => 'posted'];
        }
        //should be on jobs
        //        Mail::to($email)->send(new OrderMail($order));
        if (!isset($editedOrder)) {
            $editedOrder = false;
        }
        return $this->orderRepo->passResponse($editedOrder, 'orders', 'status');
    }

    public function create()
    {
        return view('admin.orders.create');
    }

    public function storeorder(Request $request)
    {
        // dd(request()->user()->user_id);
        request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'state' => 'required',
            'city' => 'required',
            'area' => 'required',
            'street' => 'required',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
            'number' => 'required',
            'postal_code' => 'required',
            'order_status' => 'required',
            'Payments' => 'required',
            'total_price' => 'required',
            'client_name' => 'required',
            'email' => 'required',
            'details' => 'required',
            'gift_name' => 'required',
        ]);
        
        Order::create([
            'user_id' => request()->user()->user_id,
            'gift_id' => '1',
            'order_status' => request('order_status'),
            'track_code' => request('track_code'),
            'client_name' => request('client_name'),
            'client_phone'=> request('phone_number'),
            'client_email' => request('email'),
            'total_price' => request('total_price'),
            'details' => request('details'),
        ]);
        Payment::create([
            'user_id' => request()->user()->user_id,
            'order_id' => '1',
            'status'=>request()->input('Payments'),
            'payment_status'=> request()->input('Payments') == 1 ? 'Completed' : 'Invalid',
            'sub_total'=> request()->input('total_price'),
        ]);
        // GiftCard::create([
        //     'gift_name'=>request()->input('gift_name'),
        // ]);
        // Address::create([
        //     'name'=>request()->input('name'),
        //     'surname'=>request()->input('surname'),
        //     'state'=>request()->input('state'),
        //     'city'=>request()->input('city'),
        //     'area'=>request()->input('area'),
        //     'street'=>request()->input('street'),
        //     'phone_number'=>request()->input('phone_number'),
        //     'number'=>request()->input('number'),
        //     'postal_code'=>request()->input('postal_code'),
        //     'street'=>request()->input('street'),
        //     'addressable_type'=>'App\Models\Order',
        //      'addressable_id'=>'1'
        // ]);

        return redirect()->back();
    }
}
