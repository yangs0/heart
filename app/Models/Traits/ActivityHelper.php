<?php

/**
 * Created by PhpStorm.
 * User: ten_year
 * Date: 17-2-22
 * Time: 下午8:27
 */
namespace App\Models\Traits;
trait ActivityHelper{

    public function getActivityWithFilter($filter, $limit){
        $filter = $this->getActivityFilter($filter);
        return $this->applyFilter($filter)->paginate($limit);
    }

}