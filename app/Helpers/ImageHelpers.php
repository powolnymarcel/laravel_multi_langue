<?php


class ImageHelpers
{
    public static function storeImage($request, $field){
        $data = $request->except([$field]);
        if($request->file($field)){
            $chmod = 0777;
            $uploads_dir = '/backend/assets/uploads';
            if(!file_exists($uploads_dir)){
                \File::makeDirectory($uploads_dir, $chmod, true, true);
            }
            $file = $request->file($field);
            $request->file($field);
            $fileName = rename_file($file->getClientOriginalName(), $file->getClientOriginalExtension());

            $path = $uploads_dir.'/'.str_plural($field);
            $move_path = public_path(). $path;
            $file->move($move_path, $fileName);
            $data[$field] = $path.$fileName;
        }
        return $data;
    }
}