<?php

use App\Category;
use App\Language;

class SiteHelpers{

    public function ifNoRecordDeleteImage(){
        $category = Category::all();
        $path = public_path(). '/backend/assets/uploads/images/';
        if(count($category) == 0){
            if(is_dir($path)){
                self::DirectoryDelete($path);
            }
        }
    }

    //Scan le dossier lang de Laravel afin de lire le INFO.JSON
    public static function languageOption(){
        $path = base_path().'/resources/lang/';
        $langs = scandir($path);
        $t = array();

        foreach($langs as $value){
            if($value === '.' || $value === '..'){
                continue;
            }
            if(is_dir($path.$value)){
                $fp = file_get_contents($path.$value.'/info.json');
                $fp = json_decode($fp, true);
                $t[] = $fp;
            }
        }
        return $t;
    }

    public  static  function  deleteTranslateFolders(){
        $languages = Language::orderBy('folder', 'asc')->get();
        $pathUpload = 'backend/assets/uploads/';
        if($languages->count() < 2){
            foreach($languages as $l){
                $dbLanguages[] = $l->folder;
            }
            $path = base_path().'/resources/lang/';
            $lang = scandir($path);

            foreach ($lang as $value) {
                if($value === '.' || $value === '..'){
                    continue;
                }
                if(is_dir($path.$value)){
                    foreach($dbLanguages as $dbLang){
                        if($value !='en'){
                            if($dbLang != $value){
                                //delete directories
                                self::DirectoryDelete($path.$value);
                            }
                        }
                    }
                }
            }
        }
    }

    public static function DirectoryDelete($dir){
        if(substr($dir, strlen($dir)-1,1)!='/')
            $dir .='/';
        if($handle = opendir($dir)){
            while($obj = readdir($handle)){
                if($obj != '.' && $obj !='..'){
                    if(is_dir($dir.$obj)){
                        if(!(self::DirectoryDelete($dir.$obj)))
                            return false;
                    }else{
                        if(is_file($dir.$obj)){
                            if(!unlink($dir.$obj))
                                return false;
                        }
                    }
                }
            }
            closedir($handle);
            if(!@rmdir($dir))
                return false;
            return false;
        }
        return false;
    }
}
