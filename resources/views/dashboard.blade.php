<h1> Dashboard </h1>

<div>
    Bem vindo, {{ auth()->user()->name }}!

    <br />

    <div>
        <a href="{{ route('profile.edit') }}">Editar perfil</a>
    </div>

    <br />

    <div>
        <a href="{{ route('links.create') }}">Criar novo link</a>
    </div>

    <ul>
        @foreach ($links as $link)
            <li style="display: flex; align-items: center; gap: 10px;">
                @unless ($loop->first)
                    <form action="{{ route('links.moveUp', $link) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit">↑</button>
                    </form>
                @endunless

                @unless ($loop->last)
                    <form action="{{ route('links.moveDown', $link) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit">↓</button>
                    </form>
                @endunless

                <a href=" {{ route('links.update', $link)}} ">{{ $link->title }}</a>

                <form action="{{ route('links.destroy', $link) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este link?')">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
