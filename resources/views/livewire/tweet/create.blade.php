<div>

    <textarea wire:model="body" class="w-full px-4 py-2 text-gray-700 bg-gray-200 rounded" rows="3" placeholder="What's up?"></textarea>
    @error('body')
        <p class="text-red-200 font-bold">{{ $message }}</p>
        
    @enderror

    <x-primary-button wire:click="createTweet" class="mt-2">Tweet-a-roo!</x-primary-button>
</div>
