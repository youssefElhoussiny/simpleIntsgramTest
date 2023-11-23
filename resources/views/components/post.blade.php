<div class="card ">
   <div class="card-title d-flex p-3 items-center">
        <div class="card-image w-9 h-9 rounded-full mr-2">
            <img src="{{$post->owner->image}}" class=" w-9 h-9 rounded-full">
        </div>
        <a href="/p/{{$post->owner->username}}" class="font-bold">{{$post->owner->username}}</a>
   </div>
   <div class="card-image max-h[35rem] overflow-hidden">
        <img src="{{$post->image}}" alt="">
   </div>
   <div class="card-body">
        <div class="card-text">
            {{$post->description}}
        </div>
        <div class="card-link text-secondary my-1">
            @if ($post->comments()->count())   
            <a href="/p/{{$post->id}}">{{$post->comments()->count()}} comments</a>
            @else
            no comments yet
            @endif
        </div>
        <div class="card-text text-secondary font-bold">
            {{$post->created_at->diffForHumans()}}
        </div>
        <div class="card-text text-secondary font-bold">
            <a href="/like/{{$post->id}}">
                @if ($post->liked())
                    <i class="fa-regular fa-heart fa-lg text-red-600"></i>
                @else
                    <i class="fa-regular fa-heart fa-lg "></i>
                @endif
                
            </a>
            
        </div>
   </div>
   <div class="card-footer px-1 py-2">
        <form action="/p/{{$post->id}}/comment" method="post" class="d-flex">
            @csrf
            <textarea name="body"  cols="9" rows="1" class="form-control mr-2"></textarea>
            <x-primary-button class="mt-2">
                Comment
            </x-primary-button>
            
        </form>
   </div>
</div>