<?php

namespace Modules\Admin\Http\Controllers;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use Modules\Admin\Http\Requests\RequestMenu;
use Modules\Admin\Models\Article\Article;
use Modules\Admin\Models\Menu\Menu;

use App\User;
class ChartController extends AdminBaseController
{
    public function index()
    {
        $users = User::select(\DB::raw("COUNT(*) as count"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(\DB::raw("Month(created_at)"))
                ->pluck('count');

        
        return view('admin::analytics.index', compact('users'));
    }
}