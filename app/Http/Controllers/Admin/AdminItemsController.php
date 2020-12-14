<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Item;
use Auth;
use Validator;

class AdminItemsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::paginate(8);
        return view('admin/item/index', ['items' => $items]);
    }

    public function search(Request $request)
    {
      if($request->has('keyword')) {
        $items = Item::where('name', 'like', '%' .$request->get('keyword').'%')->paginate(8);
      }
      else{
        $items = Item::paginate(8);
      }
      return view('admin/item/index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
      //
    }

    public function new()
    {
        return view('admin/item/new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all() , [
        'name' => 'required',
        'amount' => 'required',
        'quantity' => 'required',
        'detail' => 'required',
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

      $item = new Item;
      $item->name = $request->name;
      $item->amount = $request->amount;
      $item->quantity = $request->quantity;
      $item->detail = $request->detail;

      if($request->case_volume !=null){
         $item->case_volume =  $request->case_volume;
      }

      if($request->item_type !=null){
        $item->item_type = $request->item_type;
      }

      if ($request->item_image !=null){
          $itemImage = time(). '.jpg';
          $request->item_image->storeAs('public/item_images', $itemImage);
          $item->item_image = $itemImage;
      }

      $item->save();

      return redirect('admin/items');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($item_id)
    {
        $item = Item::where('id', $item_id)->firstOrFail();

        if ($item->case_volume != null){
            $item_case = floor($item->quantity / $item->case_volume);
            $item_bulk = $item->quantity % $item->case_volume;

            return view('admin/item/show',compact('item','item_case','item_bulk'));
        }elseif ($item->case_volume == null){
          $item_case = null;
          $item_bulk = null;

          return view('admin/item/show' ,compact('item','item_case','item_bulk'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($item_id)
    {
        $item = Item::where('id', $item_id)->firstOrFail();
        return view('admin/item/edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $item_id)
    {
        $validator = Validator::make($request->all(), [
          'item_name' => 'required|string|max:255',
          'item_amount' => 'required|max:255',
          'item_quantity' => 'required|max:255',
          'detail' => 'required',
        ]);

        $item = Item::find($request->id);
        $item->name = $request->item_name;
        $item->amount = $request->item_amount;
        $item->quantity = $request->item_quantity;
        $item->detail = $request->detail;

        if ($request->item_image != null){
            $itemImage = $item->name ."_".time(). '.jpg';
            $request->item_image->storeAs('public/item_images', $itemImage);
            $item->item_image = $itemImage;

            $deleteItemImage = Item::find($item_id);
            $deleteItemName = $deleteItemImage->item_image;
            Storage::delete('public/item_images' . $deleteItemName);
        }

        $item->save();

        return redirect('admin/items/'.$item_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($item_id)
    {
      $deleteItemImage = Item::find($item_id);
      $deleteName = $deleteItemImage->item_image;
      if (Storage::exists('public/item_images/', $deleteName)){
        Storage::delete('public/item_images/' . $deleteName);
      }

      $item = Item::find($item_id);
      $item->delete();

      return redirect('/admin/items/');
    }
}
