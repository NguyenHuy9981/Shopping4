<?php
namespace App\Straits;

trait StraitUploadFile
{
    function UploadFile($request, $fieldName, $folderName) {
        if($request->hasFile($fieldName)){

            $file_name = $request[$fieldName]->getClientOriginalName();

            $request[$fieldName]->storeAs('public/'. $folderName .'/' . auth()->id(), $file_name);
            $path = 'public/storage/' .$folderName. '/'. auth()->id() .'/'. $file_name;
            return [
                'feature_image_name' => $file_name,
                'feature_image' => $path
            ];

        } else{
            return null;
        }
    }


    function UploadFile_Multiple($file, $folderName) {

            $file_name = $file->getClientOriginalName();

            $file->storeAs('public/'. $folderName. '/'. auth()->id(), $file_name);
            $path = 'public/storage/' .$folderName. '/'. auth()->id() .'/'. $file_name;
            return [
                'extra_image_name' => $file_name,
                'extra_image' => $path
            ];

        
    }

   
}