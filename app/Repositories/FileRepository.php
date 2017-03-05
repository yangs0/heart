<?php
/**
 * Created by PhpStorm.
 * User: ten_year
 * Date: 16-12-23
 * Time: 下午3:04
 */

namespace App\Repositories;


class FileRepository{

    public function base64ImageUploads($img, $path, $filename=null){
        $destPath = realpath(public_path()."/".$path);

        if (isset($filename)){
            $filename = $filename.".png";
        }else{
            $filename = date('Y-m-d-H-i-s').'_'.uniqid().".png";
        }

        file_put_contents($destPath."/".$filename, base64_decode(substr(strstr($img,','),1)));

        return $path.'/'.$filename;
    }
}