<x-app-layout>
  
   <div class="container">
    <div class="row justify-content-center post-image">

        {{-- Left side --}}

        <div class="col-7 p-2 bg-black h-full d-flex justify-content-center">

            <div class="image d-flex justify-content-center  ">
                <img src="{{asset($post->image)}}" alt="{{$post->description}}" >
            </div>

            {{-- asset("storage/".$post->image) --}}
        </div>

        {{-- End left side --}}

        {{-- Right Side --}}

        <div class="col-3 bg-white p-3 h-full flex flex-col">
            {{-- Top --}}
            
            <div class="flex items-center border-b-2 pb-2 justify-content-between">
                <div class="flex items-center">
                    <img src="{{$post->owner->image}}" alt="{{$post->owner->username}}" class="rounded-full mr-3 h-10 w-10">
                <a href="/{{$post->owner->username}}" class="font-bold">{{$post->owner->username}}</a>
                </div>
                @if ($post->user_id == auth()->id())
                    <div class="flex flex-end justify-content-between gap-2">

                    <a href="{{route("edit_post",$post->id)}}"><i class="fa-regular fa-pen-to-square"></i></a>
                    <form action="/p/delete/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure')">
                            <i class="fa-solid fa-trash text-red-600"></i>
                        </button>
                    </form>
                </div>
                @endif
                
            </div>
            {{-- End Top --}}

            {{-- Middel --}}
            <div class="grow overflow-y-auto mt-3">
                <div class="flex items-start ">
                    <img src="{{$post->owner->image}}" alt="{{$post->owner->username}}" class="rounded-full mr-3 h-10 w-10">
                    <div>
                        <a href="/{{$post->owner->username}}" class="font-bold mr-3">{{$post->owner->username}}</a>
                        {{$post->description}}
                    </div>
                </div>

                {{-- Comments --}}
                <div class="border-top mt-3">
                    @forelse ($post->comments as $comment)
                        <div class="flex item-center  py-2">
                            <img src="{{$comment->owner->image}}" alt="{{$comment->owner->username}}" class="rounded-full mr-3 h-10 w-10">
                            <div class="flex flex-col">
                                <div>
                                    <a href="/{{$comment->owner->username}}" class="font-bold">{{$comment->owner->username}}</a>
                                    {{$comment->body}}
                                </div>
                                <div class="mt-1 text-sm font-bold text-gray-400">
                                    {{$comment->created_at->diffForHumans(null ,true,true)}}
                                </div>
                            </div>
                        </div>
                    @empty
                        <h3 class="fs-4">It dont have comments yet</h3>
                    @endforelse
                </div>
                
                {{-- End Comments --}}
            </div>
            {{-- End Middel --}}

            {{-- Last --}}
            <div class="border-top">
                <form action="/p/{{$post->id}}/comment" method="POST">
                    @csrf

                        <textarea name="body" cols="30" rows="1" class="form-control mt-2 "></textarea>
                        <x-primary-button class="mt-2">
                            Comment
                        </x-primary-button>
                        
                </form>
            </div>
            {{-- End Last --}}
        </div>

        {{-- End Right Side --}}
    </div>
   </div>
</x-app-layout>