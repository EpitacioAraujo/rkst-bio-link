<div>
    <img
        src="{{ asset('storage/' . $user->profile->picture) }}"
        alt="Profile Picture"
        style="width: 150px; height: 150px; border-radius: 50%; background-color: #ccc;"
    />

    <div>{{ $user->name }}</div>

    <div>{{ $user->description }}</div>

    <ul>
        @foreach ($user->links as $link)
            <li style="display: flex; align-items: center; gap: 10px;">
                <a href="{{$link->url}}" target="__blank">{{ $link->title }}</a>
            </li>
        @endforeach
    </ul>
</div>
