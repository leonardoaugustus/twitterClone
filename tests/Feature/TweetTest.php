<?php

use App\Http\Livewire\Tweet\Create;
use App\Models\Tweet;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Livewire\livewire;

it('should be able to create a tweet', function () {

    $user = User::factory()->create();

    actingAs($user);

    livewire(Create::class)
        ->set('body', 'my first tweet')
        ->call('createTweet')
        ->assertEmitted('tweet::created');

    assertDatabaseCount('tweets', 1);

    expect(Tweet::first())
        ->body->toBe('my first tweet')
        ->created_by->toBe($user->id);
});
