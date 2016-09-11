<?php

namespace App\Http\Controllers;

use App\Language;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Addtranslation;
use Illuminate\Support\Facades\Redirect;
use File;
use App\Helpers;

class ConfigController extends Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function getIndex(){
        return view('backend.pages.translations.index');
    }

    public function getAddtranslation(){
        return view('backend.pages.translations.add-trans-form');
    }

    public function getEdittranslation(Request $request){

        if(!is_null($request->input('edit'))){
            $folder = $request->input('edit');
            $file = (!is_null($request->input('file')) ? $request->input('file') : 'back.php');
            $files = scandir(base_path().'/resources/lang/'.$request->input('edit').'/');
            $cur_lang = Language::whereFolder($folder)->first();
            $str = \File::getRequire(base_path().'/resources/lang/'.$request->input('edit').'/'.$file);
            $data = [
                'file' => $file,
                'files' => $files,
                'lang' => $request->input('edit'),
                'stringLangs' => $str
            ];

            return view('backend.pages.translations.edit-trans-form', compact('data', 'cur_lang'));
        }
    }
    
    public function postAddtranslation(Addtranslation $request){
        // return $input = $request->all();
        //Le path de l'app
        $basepath =  base_path();

        $input = $request->all();

        //Va permettre de créer un dossier 'pl' ou 'de'... à l'endroit des translations statique de LARAVEL
        $folder=$input['folder'];
        $name=$input['name'];
        $author = $input['author'];
        $chmod = 0777;
        //Chemin de stockage des dossiers lang
        $uploads_dir = $basepath.'/resources/lang/'.$folder;

        //Si le dossier n'existe pas
        if(!file_exists($uploads_dir)){
            //Ajout du dossier
            \File::makeDirectory($uploads_dir, $chmod, true, true);

        }
        //Si il existe
        else{
            flash()->error('Error', 'Folder already exist');
            return redirect::back();
        }

        // Creation de info.json
        $info = json_encode(['name' => $name, 'folder' => $folder, 'author' => $author]);
                //'r' : Ouvre en lecture seule, et place le pointeur de fichier au début du fichier.
                //'r+' : Ouvre en lecture et écriture, et place le pointeur de fichier au début du fichier.
                //'w' : Ouvre en écriture seule ; place le pointeur de fichier au début du fichier et réduit la taille du fichier à 0. Si le fichier n'existe pas, on tente de le créer.
                //'w+' : Ouvre en lecture et écriture ; place le pointeur de fichier au début du fichier et réduit la taille du fichier à 0. Si le fichier n'existe pas, on tente de le créer.
                //'a' : Ouvre en écriture seule ; place le pointeur de fichier à la fin du fichier. Si le fichier n'existe pas, on tente de le créer.
                //'a+' : Ouvre en lecture et écriture ; place le pointeur de fichier à la fin du fichier. Si le fichier n'existe pas, on tente de le créer.
                //'x' : Crée et ouvre le fichier en lecture seule ; place le pointeur de fichier au début du fichier. Si le fichier existe déjà, fopen() va échouer, en retournant FALSE et en générant une erreur de niveau E_WARNING. Si le fichier n'existe pas, fopen() tente de le créer. Ce mode est l'équivalent des options O_EXCL|O_CREAT pour l'appel système open(2) sous-jacent. Cette option est supportée à partir de PHP 4.3.2 et fonctionne uniquement avec des fichiers locaux.
                //'x+' : Crée et ouvre le fichier en lecture et écriture ; place le pointeur de fichier au début du fichier. Si le fichier existe déjà, fopen() va échouer, en retournant FALSE et en générant une erreur de niveau E_WARNING. Si le fichier n'existe pas, fopen() tente de le créer. Ce mode est l'équivalent des options O_EXCL|O_CREAT pour l'appel système open(2) sous-jacent. Cette option est supportée à partir de PHP 4.3.2, et fonctionne uniquement avec des fichiers locaux.
       $fopen = fopen($basepath.'/resources/lang/'. $folder . '/info.json', 'w+');

        //Creation du JSON, Inscription des data json
        fwrite($fopen, $info);
        //Close cursor
        fclose($fopen);

        // Listing des fichier présents dans lang/en
        $files = scandir($basepath.'/resources/lang/en');
        //Pour chaques fichier présent, créer une copie dans le nouveau folder créer, si on a crée 'de' le dossier 'de' sera populé
        // des fichiers présent dans lang/en
        foreach($files as $file){
            if($file !='.' && $file != '..' && $file != 'info.json'){
                $copy = copy($basepath.'/resources/lang/en/'.$file, $basepath.'/resources/lang/'.$folder.'/'.$file);
            }
        }
        //Other proccess image to server , db save etc.

        if($copy)
        {
            //resmi gönder
            //db kayıt yap
            $data = \ImageHelpers::storeImage($request, 'flag');
            Language::create($data);
            flash()->success('Success' , 'Translation is added successfully');
            return redirect::back();
        }
        else{
            flash()->error('Error', 'Translation not adding');
            return redirect::back();
        }
       
    }
}
