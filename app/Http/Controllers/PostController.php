<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * LISTADO DE DATOS
     */
    public function index(){
        return view('posts.index',[
            'posts'=>Post::latest()->orderBy('id')->paginate()
        ]);
    }
    /**
     * FORMULARIO DE CREAR
     */
    public function create ( Post $post){
        return view('posts.create',['post'=>$post]);
    }
     /**
     * CREAR FINALMENTE
     */

    public function store(Request $request){
            // Validación de datos, not null sent
            $request ->validate([
                'title'=>'required',
                'body'=>'required'
            ]);
        $post = $request->user()->posts()->create(
            [ 'title'=> $title= $request->title,
              'slug' => Str::slug($title),
              'body' => $request->body]);
           
            
              return redirect()->route('posts.edit',$post);
            }
    /**
     * FORMULARIO DE EDITAR
     */
    public function edit ( Post $post){
        return view('posts.edit', ['post'=>$post]);
    }
    /**
     * EDITAR FINALMENTE
     */

    public function update(Request $request, Post $post){
        
        // Validacion de datos no vacíos
        $request ->validate([
            'title'=>'required',
            'body'=>'required'
        ]);
    $post -> update([
          'title'=> $title= $request->title,
          'slug' => Str::slug($title),
          'body' => $request->body]);
        
          return redirect()->route('posts.edit',$post);
        }

    public function destroy(Post $post){
        $post->delete();
        return back();
    }


}
