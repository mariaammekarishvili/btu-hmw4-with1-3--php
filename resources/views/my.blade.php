@extends("layout.master")

@section("content")


	<div class="container">

		<div class="mb-5">
            <h3>
            	Author:
            </h3>
        	<div>{{ $author->name }}</div>
        	<div>{{ $author->email }}</div>
        </div>

		@foreach($posts as $post)

            <div class="flex items-center">
                <span class="underline text-red-900 dark:text-white">
                    {{$post->title}}
                </span>
            </div>

            <div class="ml-12">
                <div class="mt-2 text-red-600 dark:text-red-400 text-sm">
                    {{$post->content}}
                </div>
            </div>

	    @endforeach

    </div>

@endsection
