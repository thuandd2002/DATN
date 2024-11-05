<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Modules\Admin\Http\Requests\RequestSlide;
use Modules\Admin\Models\Slide\Slide;

class AdminSlideController extends AdminBaseController
{
    public function getListSlide()
    {
        $slides = Slide::all();
        \File::deleteDirectory(storage_path('framework/cache'));
        
        return view('admin::slide.index',compact('slides'));
    }

    public function create()
    {
        return view('admin::slide.create');
    }

    public function store(RequestSlide $requestSlide)
    {
        $data = $requestSlide->except('_token');
        $check_avatar = $this->uploadImage('sl_avatar');
        if ($check_avatar) $data['sl_avatar'] = $check_avatar;

        \DB::table('slides')->insert($data);

        $this->getMessagesSuccess('Thêm mới thành công');

        return redirect()->route('get.list.slide');
    }

    public function edit($id)
    {
        $slide = Slide::find($id);
        return view('admin::slide.update',compact('slide'));
    }

    public function update(RequestSlide $request,$id)
    {
        $data = $request->except('_token');
        $check_avatar = $this->uploadImage('sl_avatar');
        if ($check_avatar) $data['sl_avatar'] = $check_avatar;

        \DB::table('slides')->where('id',$id)
                ->update($data);

        \Cache::flush();
        \Cache::forget('slides');

        $this->getMessagesSuccess('Cập nhật thành công');
        return redirect()->route('get.list.slide');
    }

    public function delete(Request $request,$id)
    {

        $code = 0;
        if ($request->ajax())
        {
            $slide = Slide::findOrFail($id);
            $slide->delete();

            $code = 1;
        }

        \File::deleteDirectory(storage_path('framework/cache'));

        return \response([
            'code'      => $code,
        ]);
    }

    public function uploadImage($name)
    {
        
        if (Input::hasFile($name))
        {
            $image  = upload_image($name);
          
            if ($image['code'] != 1 ) return false;

            return $image['name'];
        }
    }

}
