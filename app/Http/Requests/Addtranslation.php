<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Addtranslation extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;

        //admin moderator editor
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required|min:3',
            'folder'  => 'required|max:6',
            'author'  => 'required|min:3',
            'site_title'  => 'required|max:255',
            'site_description'  => 'required|max:255',
            'site_keywords'  => 'required|max:255',
            'flag'  => 'sometimes|max:2048|image'
        ];
    }

    public function messages(){
        return [
            'name.required'  => 'Language Name is  Required',
            'name.min'  => 'Language Name is minimum 3 Characters',
            'folder.required'  => 'Folder Name is Required',
            'folder.max'  => 'Folder Name is maximum 6 Characters',
            'author.required'  => 'Author Name is required',
            'author.min'  => 'Author Name is minimum 3 Characters',
            'site_title.required'  => 'Site Title Name is Required',
            'site_title.max'  => 'Site Title Name is maximum 255 Characters',
            'site_description.required'  => 'Site Description Name is Required',
            'site_description.max'  => 'Site Title Name is maximum 255 Characters',
            'site_keywords.required'  => 'Site Keyword Name is Required',
            'site_keywords.max'  => 'Site Title Name is maximum 255 Characters',
            'flag.sometimes'  => 'Flag must be image files',
            'flag.max'  => 'Flag must be image files',
            'flag.image'  => 'Flag must be image files'
        ];
    }
}
