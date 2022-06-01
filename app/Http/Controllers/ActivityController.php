<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;

class ActivityController extends Controller
{

    const ITEMS_ON_PAGE  = 4;

    /**
     * Get pagination array group list of activity
     *
     * @return array \App\Activity
     */
    public function list(array $params = null)
    {
        $page_current = (empty($params['page']) ? 1 : intval($params['page']));
        $items_on_page = self::ITEMS_ON_PAGE;

        $list = Activity::select('url', DB::raw('count(*) as url_count'),DB::raw('max(visit_at) as visit_last'))
            ->groupBy('url')
            ->orderBy('url')
            ->paginate($items_on_page, ['*'], 'page', $page_current);

        return $list;
    }


    public function save(array $params)
    {
        $result = Activity::validate_and_save($params);
        return $result;
    }



}
