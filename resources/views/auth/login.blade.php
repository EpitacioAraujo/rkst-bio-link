<div>

    <h1>Login</h1>

    {{-- @dump(session()->all()) --}}

    @if($message = session()->get('message'))
        {{ $message }}
    @endif

    <form action="login" method="POST">
        @csrf

        <div>
            <input type="text" name="email" id="email" placeholder="Email" required value="{{ old('email') }}">

            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <input type="password" name="password" id="password" placeholder="Senha" required>

            @error('password')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Entrar</button>
    </form>
</div>
