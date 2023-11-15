<div {{$attributes}}>
    <div class="mb-3 bg-light py-2">
        <label for="formFile" class="form-label lead">The Image:</label>
        <input class="form-control" type="file" id="formFile" name="image" >
        <p class="text-dark display-7 mt-2">PNG , JPG , JPEG ,GIF</p>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label lead">The Description:</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$post->description ?? ''}}</textarea>
      </div>
</div>