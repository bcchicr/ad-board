<form action="{{ $action }}"
  method="POST">
  @csrf
  @if ($method)
    @method($method)
  @endif
  <button {{ $attributes }}
    type="submit">
    {{ $slot }}
  </button>
</form>
