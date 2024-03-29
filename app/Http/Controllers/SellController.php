<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Enums\FullFilmentStatus;
use App\Enums\ReceiptStatus;
use App\Events\ProductOrdered;
use App\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SellController extends Controller
{

    public function create()
    {
        return view("sell.create");
    }


    public function store(Request $request) {
        $this->validate($request, [
            'total' => 'required'
        ]);

        $receiptData = $request->except(['items','customer']);
        $receiptData['is_fullFilled'] = FullFilmentStatus::FULFILLED;
        $receiptData['status'] = ReceiptStatus::PAID;
        $receiptData['serial_number'] = 'GR-'.date("y").date("m");


        /*$customerExists = Customer::query()->where('phone_number', $request->input("phone_number"))->first();
        if ($customerExists) {
            $receipt->fill(['customer_id' => $customerExists->id]);
        } else {
            $customer = Customer::create($request->input("customer"));
            $receipt->fill(['customer_id' => $customer->id]);
        }*/

        $receipt = Receipt::create($receiptData);
        if (!empty($request->input("items"))) {
            foreach($request->input("items") as $item) {
                $receiptItem = $receipt->items()->create([
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'total' => $item['total'],
                    'order_note' => @$item['order_note'],
                ]);

                try {
                    event(new ProductOrdered($receiptItem));
                } catch (\Exception $exception) {
                  Log::error($exception);
                }
                // dispatch event
            }
        }

        return response()->json([
            'message' => 'Successful',
            'data' => $receipt
        ]);
    }
}
