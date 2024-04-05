@php
  $superCategory = $category->superCategory;
@endphp

<nav aria-label="breadcrumb">
  <ol class="breadcrumb mb-0">
    <li class="breadcrumb-item fw-bold"><a
        href="{{ route('ads.index', [$superCategory->name]) }}">{{ $superCategory->name }}</a>
    </li>
    <li class="breadcrumb-item"><a
        href="{{ route('ads.index', [$superCategory->name, $category->name]) }}">{{ $category->name }}</a>
    </li>
  </ol>
</nav>
