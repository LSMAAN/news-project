<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <div class="container mt-4">
        <a href="{{ request()->url() }}" class="text-decoration-none">
            <h1 class="text-center fst-italic fw-bold text-dark">THE NEWS</h1>
        </a>
    </div>
    <hr class="hr hr-blurry" />
    <div class="my-4">
        <div class="container text-center mx-auto w-50">
                <form action="">
                    <div class="mx-auto text-center mb-3">
                        <div class="d-flex">
                                <input type="search" name="search" class="form-control" placeholder="Search by title or author">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse mb-2">
                        <div class="dropdown">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Sort By
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'title']) }}">Title</a></li>
                                <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'creator']) }}">Author</a></li>
                                <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'pubDate']) }}">Publish Date</a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            @foreach ($newsItems as $newsItem)
            <h3 class="text-start text-wrap fw-semibold">{{ $newsItem->title }}</h3>
            <div>
                <a class="link-offset-2 link-underline link-underline-opacity-0 link-dark" href="{{ $newsItem->link }}">
                    <div>
                        <div class="row">
                            <div class="col-8 text-start">
                                @if (empty($newsItem->description))
                                    {{ $newsItem->title }}
                                @else
                                    {{ $newsItem->description }}
                                @endif
                                {{ $newsItem->description }}</div>
                            <div class="col-4"><img src="{{ $newsItem->image_url }}" class="img-fluid ghost" alt="{{ $newsItem->title }}" onerror="showDefaultImage(this)"></div>
                        </div>
                    </div>
                </a>
                <div class="mt-2 d-flex justify-content-between text-muted fst-italic">
                    <div> Upadted on : {{ \Carbon\Carbon::parse($newsItem->pubDate)->format('M d, Y, H:i T') }}</div>
                    <div>
                        @if (!empty($newsItem->creator))
                        - {{ $newsItem->creator }}
                        @else
                            - Unknown
                        @endif
                    </div>
                </div>
            </div>
            <hr class="hr"/>
            <script>
                function showDefaultImage(img) {
                  // Replace the broken image URL with the default image URL
                  img.src = '{{ asset('images/no-image.jpg') }}';
                }
            </script>
        @endforeach
        <div class="d-flex justify-content-center">
            {{ $newsItems->appends(request()->query())->links() }}
        </div>
        </div>
    </div>
  </body>
</html>