<div>

    <h1>Profile</h1>

    @if($message = session()->get('message'))
        {{ $message }}
    @endif

    <form action="{{ route('profile.edit', $profile) }}" method="post" enctype="multipart/form-data">

        {{-- CSRF token for security --}}
        @csrf
        @method('put')

        <div>
            <img src="{{ asset('storage/' . $profile->picture) }}" alt="Profile Picture" style="width: 150px; height: 150px; border-radius: 50%; background-color: #ccc;">
            <input type="file" name="picture" id="picture" value="{{ old('picture') ?? $profile->picture }}" />

            @error('picture')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <input type="text" name="handler" id="handler" placeholder="Handler" value="{{ old('handler') ?? $profile->handler }}" />

            @error('handler')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <textarea name="description" id="description" placeholder="Description">{{ old('description') ?? $profile->description }}</textarea>

            @error('description')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Salvar</button>
        <a href="{{ route('dashboard') }}">Voltar</a>

    </form>
</div>
