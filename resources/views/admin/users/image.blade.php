@if($image = @file_get_contents('../public/images/userS/'.$image))
    <img @error('photo') is-invalid @enderror
        src="{{ url('images/userS/'.$image) }}" alt="profilephoto"
        class="img-responsive img-circle image-size" data-toggle="modal"
        data-target="#exampleStandardModal{{ $id }}">
@else
<img @error('photo') is-invalid @enderror
        src="{{ Avatar::create($name)->toBase64() }}" alt="profilephoto"
        class="img-responsive img-circle image-size" data-toggle="modal"
        data-target="#exampleStandardModal{{ $id }}">

@endif