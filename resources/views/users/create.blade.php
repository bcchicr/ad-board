<x-layout>
  <x-simple-link :href="route('ads.index')" text="На главную" />
  <x-card class="mb-3 p-4">
    <h2 class="text-center">Регистрация</h2>
    <form class="" action="{{ route('users.store') }}" method="POST">
      @csrf
      <div class="col-10 offset-1 col-md-6 offset-md-3">
        <div class="mb-3">
          <label for="title-field" class="form-label">Логин:</label>
          <input class="form-control" id="title-field" name="name"
            type="text" value="{{ old('name') }}" required>
          @error('name')
            <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="password-field" class="form-label">Пароль:</label>
          <input class="form-control" id="password-field" name="password"
            type="password" required>
          @error('password')
            <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-4">
          <label for="password-confirmation-field" class="form-label">Пароль еще
            раз:</label>
          <input class="form-control" id="password-confirmation-field"
            name="password_confirmation" type="password" required>
        </div>
        <button class="d-block w-100 btn btn-primary btn-md-lg mb-3"
          type="submit">Зарегистрироваться</button>
        <p class="text-center">
          Уже есть аккаунт?
          <a href="{{ route('users.login') }}" class="">Войти</a>
        </p>
      </div>
    </form>
  </x-card>
</x-layout>
