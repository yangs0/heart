<?php

namespace App\Http\Controllers;

use App\Repositories\FileRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadsController extends Controller{

    protected $fileRepository;
    public function __construct(FileRepository $fileRepository){
        $this->fileRepository = $fileRepository;
    }

    public function avatar(Request $request){
        $user = Auth::user();
        $avatarPath = $this->fileRepository->base64ImageUploads($request->input('avatar'),'/uploads/avatars', $user->name);
        $user->avatar = $avatarPath;
        $user->save();
        return response()->json(["status"=>"success","file_path"=>asset($avatarPath)]);
    }

    public function headImg(Request $request){
        $avatarPath = $this->fileRepository->base64ImageUploads($request->input('headImg'),'/uploads');
        return response()->json(["status"=>"success","file_path"=>asset($avatarPath)]);
    }
}
