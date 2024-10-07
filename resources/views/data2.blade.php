@foreach($genres as $genre)
    @php
        $moviegenreitems = [];

        foreach ($menu_data as $key => $item) {
            $gmovie = \DB::table('movies')
                ->select('movies.id as id', 'movies.title as title', 'movies.type as type', 'movies.status as status', 'movies.genre_id as genre_id', 'movies.thumbnail as thumbnail', 'movies.slug as slug', 'movies.is_custom_label as is_custom_label', 'movies.label_id as label_id')
                ->where('movies.is_upcoming', '!=', 1)
                ->where('movies.genre_id', 'LIKE', '%' . $genre->id . '%')->where('movies.id', $item->movie_id)->first();

            if ($gmovie) {
                $moviegenreitems[] = $gmovie;
            }

            if ($section->order == 1) {
                arsort($moviegenreitems);
            }

            if (count($moviegenreitems) == $section->item_limit) {
                break;
            }
        }

        foreach ($menu_data as $key => $item) {
            $gtvs = \DB::table('tv_series')
                ->join('seasons', 'seasons.tv_series_id', '=', 'tv_series.id')
                ->select('seasons.id as seasonid', 'tv_series.genre_id as genre_id', 'tv_series.id as id', 'tv_series.type as type', 'tv_series.status as status', 'tv_series.title as title', 'tv_series.thumbnail as thumbnail', 'seasons.season_slug as season_slug', 'tv_series.is_custom_label as is_custom_label', 'tv_series.label_id as label_id')->where('tv_series.genre_id', 'LIKE', '%' . $genre->id . '%')
                ->where('tv_series.id', $item->tv_series_id)->first();

            if ($gtvs) {
                $moviegenreitems[] = $gtvs;
            }

            if ($section->order == 1) {
                arsort($moviegenreitems);
            }

            if (count($moviegenreitems) == $section->item_limit * 2) {
                break;
            }
        }

        $moviegenreitems = array_values(array_filter($moviegenreitems));
    @endphp

    @if (!empty($moviegenreitems))
        <div class="genre-main-block">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="genre-dtl-block">
                            <h5 class="section-heading">{{ $genre->name }} in {{ $menu->name }}</h5>
                            <p class="section-dtl">{{ __('at the big screen at home') }}</p>
                            <a href="{{ $auth && getSubscription()->getData()->subscribed ? route('show.in.genre', $genre->id) : route('show.in.guest.genre', $genre->id) }}" class="see-more">
                                <b>{{ __('View All') }}</b>
                            </a>
                        </div>
                    </div>

                    @if ($section->view == 1)
                        <div class="col-md-9">
                            <div class="genre-main-slider owl-carousel">
                                @foreach ($moviegenreitems as $item)
                                    @if ($item->status == 1)
                                        @php
                                            $imagePath = $item->type == 'M' ? 'images/movies/thumbnails/' : 'images/tvseries/thumbnails/';
                                            $image = $imagePath . $item->thumbnail;
                                            $imageData = base64_encode(@file_get_contents($image));
                                            $src = $imageData ? 'data: ' . mime_content_type($image) . ';base64,' . $imageData : url('images/default-thumbnail.jpg');
                                        @endphp
                                        <div class="genre-slide">
                                            <div class="genre-slide-image genre-image home-prime-slider">
                                                @if ($auth && getSubscription()->getData()->subscribed)
                                                    <a href="{{ $item->type == 'M' ? url('movie/detail', $item->slug) : url('show/detail', $item->season_slug) }}">
                                                        <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="genre-image">
                                                    </a>
                                                @else
                                                    <a href="{{ $item->type == 'M' ? url('movie/guest/detail', $item->slug) : url('show/guest/detail', $item->season_slug) }}">
                                                        <img data-src="{{ $src }}" class="img-responsive owl-lazy" alt="genre-image">
                                                    </a>
                                                @endif

                                                @if ($item->is_custom_label == 1 && isset($item->label_id))
                                                    <span class="badge bg-info">{{ $item->label->name }}</span>
                                                @endif
                                            </div>

                                            <div class="genre-slide-dtl">
                                                <h5 class="genre-dtl-heading">
                                                    @if ($auth && getSubscription()->getData()->subscribed)
                                                        <a href="{{ $item->type == 'M' ? url('movie/detail/' . $item->slug) : url('show/detail/' . $item->season_slug) }}">{{ $item->title }}</a>
                                                    @else
                                                        <a href="{{ $item->type == 'M' ? url('movie/guest/detail/' . $item->slug) : url('show/guest/detail/' . $item->season_slug) }}">{{ $item->title }}</a>
                                                    @endif
                                                </h5>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if ($section->view == 0)
                        <div class="col-md-9">
                            <div class="cus_img">
                                @foreach ($moviegenreitems as $item)
                                    @php
                                        $imagePath = $item->type == 'M' ? 'images/movies/thumbnails/' : 'images/tvseries/thumbnails/';
                                        $image = $imagePath . $item->thumbnail;
                                        $imageData = base64_encode(@file_get_contents($image));
                                        $src = $imageData ? 'data: ' . mime_content_type($image) . ';base64,' . $imageData : url('images/default-thumbnail.jpg');
                                    @endphp
                                    @if ($item->status == 1)
                                        <div class="col-lg-4 col-md-9 col-xs-6 col-sm-6">
                                            <div class="genre-slide-image genre-grid home-prime-slider">
                                                @if ($auth && getSubscription()->getData()->subscribed)
                                                    <a href="{{ $item->type == 'M' ? url('movie/detail', $item->slug) : url('show/detail', $item->season_slug) }}">
                                                        <img data-src="{{ $src }}" class="img-responsive lazy" alt="genre-image">
                                                    </a>
                                                @else
                                                    <a href="{{ $item->type == 'M' ? url('movie/guest/detail', $item->slug) : url('show/guest/detail', $item->season_slug) }}">
                                                        <img data-src="{{ $src }}" class="img-responsive lazy" alt="genre-image">
                                                    </a>
                                                @endif

                                                @if ($item->is_custom_label == 1 && isset($item->label_id))
                                                    <span class="badge bg-info">{{ $item->label->name }}</span>
                                                @endif
                                            </div>

                                            <div class="genre-slide-dtl">
                                                <h5 class="genre-dtl-heading">
                                                    @if ($auth && getSubscription()->getData()->subscribed)
                                                        <a href="{{ $item->type == 'M' ? url('movie/detail/' . $item->slug) : url('show/detail/' . $item->season_slug) }}">{{ $item->title }}</a>
                                                    @else
                                                        <a href="{{ $item->type == 'M' ? url('movie/guest/detail/' . $item->slug) : url('show/guest/detail/' . $item->season_slug) }}">{{ $item->title }}</a>
                                                    @endif
                                                </h5>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <br />
    @endif
@endforeach