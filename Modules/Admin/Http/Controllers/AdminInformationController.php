<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Modules\Admin\Http\Requests\RequestInformation;
use Modules\Admin\Models\Information\Information;

class AdminInformationController extends AdminBaseController
{
    public function getInfo()
    {
        $information = Information::first();

        return view('admin::information.index',compact('information'));
    }

    public function saveInfo(RequestInformation $requestInformation)
    {
        $data = $requestInformation->except('_token','if_logo');

        $information = Information::first();

        $check_avatar = $this->uploadImage('if_logo');
        if ($check_avatar) $data['if_logo'] = $check_avatar;
        
        $check_social = $this->uploadImage('if_social');
        if ($check_social) $data['if_social'] = $check_social;
        

        if ($information) {

            $information->update($data);
            $this->getMessagesSuccess("Update dữ liệu thành công");

        }else
        {
            Information::insert($data);
            $this->getMessagesSuccess();
        }

        
        \File::deleteDirectory(storage_path('framework/cache'));
        return redirect()->back();
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
