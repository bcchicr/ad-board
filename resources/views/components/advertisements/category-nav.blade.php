<nav aria-label="breadcrumb">
  <ol class="breadcrumb mb-0">
    <li class="breadcrumb-item fw-bold"><a
        href="{{ route('ads.index', ['super-category' => $category->superCategory->id]) }}">{{ $category->superCategory->name }}</a>
    </li>
    <li class="breadcrumb-item"><a
        href="{{ route('ads.index', ['category' => $category->id]) }}">{{ $category->name }}</a></li>
  </ol>
</nav>
