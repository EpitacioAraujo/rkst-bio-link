<div>

    <h1>Link register</h1>

    {{-- @dump(session()->all()) --}}

    @if($message = session()->get('message'))
        {{ $message }}
    @endif

    <form action="{{ route('links.create') }}" method="POST">
        @csrf

        <div>
            <input type="text" name="title" id="title" placeholder="Title" value="{{ old('title') }}">

            @error('title')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <input type="text" name="url" id="url" placeholder="Url" value="{{ old('url') }}">

            @error('url')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Salvar</button>
        <a href="{{ route('dashboard') }}">Voltar</a>
    </form>
</div>
