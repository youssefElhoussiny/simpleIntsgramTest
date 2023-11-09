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
                    <div class="mb-3 bg-light py-2">
                        <label for="formFile" class="form-label lead">The Image:</label>
                        <input class="form-control" type="file" id="formFile" name="image" >
                        <p class="text-dark display-7 mt-2">PNG , JPG , JPEG ,GIF</p>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label lead">The Description:</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                      </div>
                      <x-primary-button class="ml-4">
                        Post
                    </x-primary-button>
                </form>
                {{-- End Form --}}
            </div>
        </div>
    </div>
</x-app-layout>