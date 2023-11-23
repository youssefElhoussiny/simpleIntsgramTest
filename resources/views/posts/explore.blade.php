<x-app-layout>
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-3 w-[30rem] h-[30rem]">
                
                <a href="/p/{{$post->id}}"><img src="/{{$post->image}}" alt=""></a>
            </div>
        @endforeach
        <div class="mt-5 flex justify-content-center">
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>
