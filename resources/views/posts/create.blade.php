<x-app-layout>
    <div class="container">
        <div class="row justify-content-center py-3 ">
            <div class="col-10 bg-white">
                <h1 class="h1">Create a new post</h1>
                {{-- Errors --}}
                <div class="flex">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                {{-- End Errors --}}

                {{-- Form --}}
                <form action="{{route('create_post')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-create-edite-form></x-create-edite-form>
                      <x-primary-button class="ml-4">
                        Post
                    </x-primary-button>
                </form>
                {{-- End Form --}}
            </div>
        </div>
    </div>
</x-app-layout>