<x-app-layout>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <div class="row justify-content-center items-center w-50 m-auto mt-2 p-2">
            <div class="col-5">
                <img src="{{$user->image}}" alt="" class="w-20 h-20 rounded-full">
            </div>
            <div class="col-7 flex flex-col">
                <div class="flex gap-5 items-center justify-content-between">
                    <div class="name font-bold">
                        {{$user->name}}
                    </div>
                    @if (auth()->id() == $user->id)
                        <a href="/edit/{{$user->username}}" class="btn btn-secondary ">Edit profile</a>
                    @endif
                    
                </div>
                {{-- user info --}}
                <div class="flex items-center my-2 ">
                   <div class="username">
                        {{$user->username}}
                   </div>
                </div>
                <div class="flex items-center ">
                    <p>{!! nl2br(e($user->bio)) !!}</p>
                </div>
                    {{-- End user info --}}

                {{-- user state --}}
                    <div class="flex items-center font-bold mt-2">
                        {{$user->posts()->count()}}
                        {{$user->posts()->count()>1 ? 'posts' : 'post'}}
                    </div>
                    
                {{-- End user state --}}
                
            </div>
        </div>
        <hr>
        {{-- End Top --}}
        {{-- Body --}}
        
        <div class="row justify-content-center gap-3 mt-4">
            @if (auth()->id() == $user->id or $user->private_account == 0)
                @foreach ($user->posts as $post)
            {{-- @dd(asset("$post->image")) --}}
                <div class="col-3 bg-dark p-3 flex justify-content-center items-center">
                    <a href="/p/{{$post->id}}">
                        <img src="{{asset("$post->image")}}" class="h-auto">
                    </a>
                </div>
            @endforeach
            @else
            <div class="flex justify-content-center items-center">
                <p>This accounet is private account you need follow</p>
            </div>
            @endif
            

        </div>
        {{-- End Body --}}
    </div>
</x-app-layout>