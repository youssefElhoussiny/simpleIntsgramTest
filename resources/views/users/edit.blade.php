<x-app-layout>
    <div class="container">
    
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{$error}}</p>
    @endforeach
@endif
<form class="w-75 m-auto" method="post" action="/update/{{$user->username}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Profile</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>
        
        <div class="mt-10 grid grid-cols-1  sm:grid-cols-6 items-center border p-2">

            <label for="private_account">Private account</label>
            <input type="checkbox" id="private_account" name="private_account" {{$user->private_account ? 'checked' : ''}}>

        </div>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-4">
            @error('username')
              <div class="alert alert-danger">
                {{$message}}
              </div>
            @enderror
                <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset   focus-within:ring-indigo-600 sm:max-w-md">
                        <input type="text" name="username" id="username" autocomplete="username" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" value="{{$user->username}}">
                    </div>
                </div>
          </div>

          <div class="sm:col-span-4">
            @error('name')
            <div class="alert alert-danger">
              {{$message}}
            </div>
          @enderror
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset   focus-within:ring-indigo-600 sm:max-w-md">
                        <input type="text" name="name" id="name" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" value="{{$user->name}}">
                    </div>
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset   focus-within:ring-indigo-600 sm:max-w-md">
                        <input type="text" name="email" id="email" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" value="{{auth()->user()->email}}">
                    </div>
                </div>
            </div>
      </div>
  
          <div class="col-span-full mt-3">
            <label for="bio" class="block text-sm font-medium leading-6 text-gray-900">Bio</label>
            <div class="mt-2">
              <textarea id="bio" name="bio" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{auth()->user()->bio}}</textarea>
            </div>
            <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about yourself.</p>
          </div>
  
          <div class="col-span-full">
            <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
            <div class="mt-2 flex items-center gap-x-3">
                {{--  --}}
              <img src="{{$user->image}}" class="h-12 w-12 text-gray-300 rounded-full">
              <input type="file" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" name="image">
            </div>
          </div>


          <div class="sm:col-span-4 mt-4">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
            <div class="mt-2">
                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset   focus-within:ring-indigo-600 sm:max-w-md">
                    <input type="password" name="password" id="password"  class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                </div>
                
            </div>
            <div class="sm:col-span-4 mt-3">
                <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Confime Password</label>
                <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset   focus-within:ring-indigo-600 sm:max-w-md">
                        <input type="password" name="password_confirmation" id="password_confirmation"  class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                    </div>
                    
                </div>
      </div>
  
         
        </div>
      </div>
  
  
    
    </div>
  
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
  </form>
  
    </div>
</x-app-layout>