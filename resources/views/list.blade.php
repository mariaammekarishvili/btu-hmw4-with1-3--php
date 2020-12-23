@extends("layout.master")

@section("content")

	<div class="container">

		@foreach($posts as $post)

        <div class="mt-8 bg-blue dark:bg-red-800 overflow-hidden shadow mt-3 p-2 sm:rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-1">

                <div class="p-6 border-t border-red-200 dark:border-red-700">
                    <div class="ml-12">
                        <div class="mt-2 text-red-600 dark:text-red-400 text-sm">
                            {{ $post->text }}
                            <p>Author: {{ $post->name }}</p>

                            <div>
                                @if($post->is_approves)
                                    <button type="submit" class="fa fa-check btn-approved" url="{{route('approve',$post->id)}}"></button>
                                @else
                                    <button type="submit" class="fa fa-thumbs-up btn-approve" url="{{route('approve',$post->id)}}"></button>
                                @endif
                            </div></div>
                    </div>
                </div>
            </div>

        </div>

        @endforeach
    </div>
    <script type="text/javascript">
        $(document).ready(function (){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.btn-approve', function (e){
                e.preventDefault();
                $this=$(this);
                $.ajax({
                    type: 'POST',
                    url: $this.attr('url'),
                    success: function (){
                        $this.removeClass('fa-thumbs-up');
                        $this.addClass('fa-check');
                    }
                });
            });

            $(document).on('click', '.btn-approved', function (e){
                e.preventDefault();
                $this=$(this);
                $.ajax({
                    type: 'POST',
                    url: $this.attr('url'),
                    success: function (){
                        $this.removeClass('fa-check');
                        $this.addClass('fa-thumbs-up');
                    }
                });
            });
        });

    </script>


@endsection
