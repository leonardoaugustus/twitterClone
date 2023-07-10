<?php

namespace App\Http\Livewire\Tweet;

use App\Models\Tweet;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Create extends Component
{
    use AuthorizesRequests;
    public ?string $body = null;

    public function render()
    {
        return view('livewire.tweet.create');
    }

    public function createTweet()
    {
        $this->authorize('create', Tweet::class);

        $this->validate([
            'body' => 'required',
        ]);

        Tweet::query()->create([
            'body' => $this->body,
            'created_by' =>  auth()->id(),
        ]);

        $this->emit('tweet::created');
    }
}
