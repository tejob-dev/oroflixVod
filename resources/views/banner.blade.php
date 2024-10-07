@if(isset($banner) && $banner != NULL)
@foreach($banner as $banner_data)
<div class="banneadd-main-block">
        <a href="{{$banner_data->link}}" title="" target="__blank">
                @php
                        $imagePath = $banner_data->image ? 'images/banneradd/' . $banner_data->image : 'images/default-thumbnail.jpg';
                        $imageData = base64_encode(@file_get_contents($imagePath));
                        $src = $imageData ? 'data: ' . mime_content_type($imagePath) . ';base64,' . $imageData : null;
              @endphp
              <img src="{{$src}}" class="img-fluid" alt="">
        </a>
</div>
@endforeach
@endif