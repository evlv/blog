<x-layout>

    <h1>{{ $post->title }}</h1>

    <p>
        By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">

            {{ $post->category->name }}
        </a>
    </p>

    <p>

        {{ $post->body }}
    </p>


    <div>
            <button>
            <a href="/">Go back</a>
        </button>
    </div>

</x-layout>
