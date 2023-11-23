<x-app-layout>
    <div class="container">
        <div class="row    flex-row-reverse">
           <div class="col-3"style="min-height: 100%; ">
                @foreach (auth()->user()->randomUsers() as $user)
                <div class="flex items-center justify-content-between">
                    <div class="flex items-center mr-3">
                    <img src="{{$user->image}}" class="w-10 h-10 rounded-full m-2">
                    <a href="/p/{{$user->username}}" class="font-bold">{{$user->username}}</a>
                    </div>
                    <a href="" class="text-primary">Follow</a>
                </div>
                    
                @endforeach
                
            </div>
            
            @foreach ($posts as $post)
            <div class="col-8 my-3">
                <div class="w-[40rem] m-auto">
                    <x-post :post="$post"></x-post>
                </div>
                
            </div>
            <div class="col-3"></div>
            
            @endforeach
             
        </div>
       
    </div>
</x-app-layout>
