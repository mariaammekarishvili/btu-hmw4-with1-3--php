<?php

namespace App\Http\Controllers;

use App\Notifications\PostApprovedNotification;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class PostsController extends Controller
{

	public function show() {
		// $posts = Post::all();
		$posts = DB::table("posts")
			// ->take("posts.id", "posts.title", "posts.text", "users.name", "users.email")
			->join("users", "posts.user_id", "=", "users.id")
			->get();
		return view("list", compact("posts"));
	}

	public function deleteById($id) {
		Post::findOrFail($id)->delete();
		return Redirect::back();
	}


	public function create() {
		return view("create");
	}


	public function createPostRecord(Request $request) {

		$post = new Post();
		$post->title = $request->get("news_title");
		$post->text = $request->get("news_text");
        $post->user_id = Auth::id();
        $post->save();


		return Redirect::back()->with("message", "information add");
	}


	public function update($id) {
		$post = Post::find($id);
		// dd($post);
		return view("update", compact("post"));
	}


	public function updateRecord(Request $request) {
		$post = Post::find($request->get("id"));
		$post->title = $request->get("news_title");
		$post->text = $request->get("news_text");
		$post->save();
		return Redirect::back()->with("message", "information add");
	}

	public function ownPosts() {
        $posts = Post::all()->where('user_id', Auth::id());
        $author = User::find(Auth::id());
        return view('my', compact('posts', 'author'));
    }
    public function approve(Post $post){

        if ($post->is_approves==false){
            $post->is_approves=true;
            $data=[
                "text"=>'post with id of'.'  '.$post->id.'  '.'has been approved'
            ];

        }else{
            $post->is_approves=false;
            $data=[
                "text"=>'post with id of'.'  '.$post->id.'  '.'has been dis_approved'
            ];
        }
        $post->save();
        $user=User::find(1);
        $user->notify(new PostApprovedNotification($data));
    }

}
