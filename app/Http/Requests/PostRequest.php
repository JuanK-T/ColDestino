<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // Limita el acceso a cierta secciones y lo habilita solo para los usuarios que cumplan las condiciones
    public function authorize()
    {
       return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        $post = $this->route()->parameter('post');

        // REGLA DE VALIDACIONES
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:posts',
            'status' => 'required|in:1,2,3',
            'file' => 'image'
        ];

        if($post){
            $rules['slug'] = 'required|unique:posts,slug,'.$post->id;
        }

        if($this->status == 3 || $this->status == 2){
            // Array merge me fusiona dos arrays
            $rules = array_merge($rules,[
                'category_id' => 'required',
                'tags' => 'required',
                'extract' => 'required',
                'body' => 'required'
            ]);
        }

        return $rules;
    }
}
