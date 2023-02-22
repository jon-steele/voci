<x-app-layout>
    @if (session('side') == 0)
        <p>{{ $cards[$index]->front; }}</p>
        <a href="{{ route('study.show', $deck) }}"><x-primary-button>flip</x-primary-button></a>
    @else
        <p>{{ $cards[$index]->back; }}</p>
        <a href="{{ route('study.show', $deck) }}"><x-primary-button>next</x-primary-button></a>
        
        {{ session(['index' => session('index') - 1]); }}

    @endif

</x-app-layout>