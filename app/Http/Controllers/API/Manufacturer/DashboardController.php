<?php

namespace App\Http\Controllers\API\Manufacturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ManufacturerEnquiry;
use App\Models\ManufacturerProduct;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
      $quotes = ManufacturerEnquiry::where('customer_id', $request->user()->id)->count();
      $orders = Order::where('manufacturer_id', $request->user()->id)->count();
      $products = ManufacturerProduct::where('customer_id', $request->user()->id)->count();
      $entries = ManufacturerEnquiry::where('customer_id', $request->user()->id)->latest()->take(5)->get();
      foreach ($entries as $_key => $entry) {
        $items_list = array();
        $entry->type = $entry->enquery->enquery_type;
        if($entry->enquery->enquery_type == 'selected') {
          foreach ($entry->enquery->items as $key => $item) {
            $items_list[$key]['quantity'] = $item->quantity;
            $items_list[$key]['color_code'] = $item->color_code;
            $items_list[$key]['title'] = $item->title;
            $items_list[$key]['subtitle'] = $item->subtitle;
            $items_list[$key]['category'] = $item->category->name;
            $items_list[$key]['subcategory'] = $item->subcategory->name;
            $items_list[$key]['requirement'] = $item->requirement->name??null;
            $items_list[$key]['width'] = $item->width;
            $items_list[$key]['warp'] = $item->warp;
            $items_list[$key]['weft'] = $item->weft;
            $items_list[$key]['count'] = $item->count;
            $items_list[$key]['reed'] = $item->reed;
            $items_list[$key]['pick'] = $item->pick;
            $items_list[$key]['image'] = $item->product->image_list;
          }
          $entry->items = $items_list;
        } else{
          $items_list[0]['quantity'] = null;
          $items_list[0]['color_code'] = $entry->enquery->color_code;
          $items_list[0]['title'] = $entry->enquery->title;
          $items_list[0]['subtitle'] = $entry->enquery->subtitle;
          $items_list[0]['category'] = $entry->enquery->category->name;
          $items_list[0]['subcategory'] = $entry->enquery->subcategory->name;
          $items_list[0]['requirement'] = $entry->enquery->requirement->name??null;
          $items_list[0]['width'] = $entry->enquery->width;
          $items_list[0]['warp'] = $entry->enquery->warp;
          $items_list[0]['weft'] = $entry->enquery->weft;
          $items_list[0]['count'] = $entry->enquery->count;
          $items_list[0]['reed'] = $entry->enquery->reed;
          $items_list[0]['pick'] = $entry->enquery->pick;
          $items_list[0]['image'] = [];
          $entry->items = $items_list;
        }
      }
      return response()->json([
          'status' => true,
          'quotes' => $quotes,
          'orders' => $orders,
          'products' => $products,
          'latest_quotes' => $entries
      ]);
    }
}
