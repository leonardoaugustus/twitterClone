<div>
    @foreach ($tweets as $tweet)
     <div class="mt-10 text-white text-lg">
        {{ $tweet->body }}
     </div>
    @endforeach
</div>
