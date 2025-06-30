<div>
    <h1>Register</h1>

    @dump(session()->all())

    {{-- Display any validation errors --}}

    @if($message = session()->get('message'))
        {{ $message }}
    @endif

    <form action="{{ route('register') }}" method="POST" class="flex flex-col gap-3">
        @csrf

        <div>
            <input type="text" name="name" id="nome" placeholder="Nome" value="{{ old('name') }}">

            @error('name')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <input type="text" name="email" id="email" placeholder="Email" value="{{ old('email') }}">

            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <input type="text" name="email_confirmation" id="email_confirmation" placeholder="Email Confirmation">
        </div>

        <div>
            <input type="password" name="password" id="password" placeholder="Senha">

            @error('password')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Entrar</button>
    </form>
</div>
