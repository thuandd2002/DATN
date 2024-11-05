<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Models\Store\Store;

class AdminStoreController extends AdminBaseController
{
    public function getListStore()
    {
        $stores = Store::all();

        return view('admin::store.index',compact('stores'));
    }

    public function create()
    {
        return view('admin::store.create');
    }

    public function store(Request $request)
    {
        $store = $request->except('_token','save','s_file');

        //Kiểm tra file
        if ($request->hasFile('s_file')) {
            $file = $request->s_file;

            $file->move(public_path(), $file->getClientOriginalName());

            $store['s_file'] = $file->getClientOriginalName();
        }

        $this->getMessagesSuccess();
        \File::deleteDirectory(storage_path('framework/cache'));

        \DB::table('stores')->insert($store);

        return redirect()->route('get.list.store');
    }

    public function edit($id)
    {
        $store = Store::findOrFail($id);
        return view('admin::store.update',compact('store'));
    }

    public function update(Request $request,$id)
    {
        $store = $request->except('_token','save','s_file');

        //Kiểm tra file
        if ($request->hasFile('s_file')) {
            $file = $request->s_file;

            $file->move(public_path(), $file->getClientOriginalName());

            $store['s_file'] = $file->getClientOriginalName();
        }

        \DB::table('stores')->where('id',$id)->update($store);

        $this->getMessagesSuccess('Cập nhật');
        \File::deleteDirectory(storage_path('framework/cache'));

        return redirect()->route('get.list.store');
    }

    public function delete(Request $request,$id)
    {
        $code = 0;
        if ($request->ajax())
        {
            $store = Store::findOrFail($id);
            $store->delete();

            $code = 1;
        }

        \File::deleteDirectory(storage_path('framework/cache'));

        return \response([
            'code'      => $code,
        ]);
    }
}
