<div>

    <h1>Link edit</h1>

    @if($message = session()->get('message'))
        {{ $message }}
    @endif

    <form action="{{ route('links.update', $link) }}" method="post">
        @csrf
        @method('put')

        <div>
            <input type="text" name="title" id="title" placeholder="Title" value="{{ old('title') ?? $link->title }}">

            @error('title')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <input type="text" name="url" id="url" placeholder="Url" value="{{ old('url') ?? $link->url }}">

            @error('url')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Salvar</button>
        <a href="{{ route('dashboard') }}">Voltar</a>

    </form>
</div>
