<?php

use App\Http\Livewire\Timeline;
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

it('should make sure that only authenticated users can create a tweet', function () {
    livewire(Create::class)
        ->set('body', 'my first tweet')
        ->call('createTweet')
        ->assertForbidden();

    actingAs(User::factory()->create());

    livewire(Create::class)
        ->set('body', 'my first tweet')
        ->call('createTweet')
        ->assertEmitted('tweet::created');
});

test('body is required', function () {
    actingAs(User::factory()->create());

    livewire(Create::class)
        ->set('body', null)
        ->call('createTweet')
        ->assertHasErrors(['body' => 'required']);
});

test('the tweet body should hava a max lenght of 140 caracters', function () {
    actingAs(User::factory()->create());

    livewire(Create::class)
        ->set('body', str_repeat('a', 141))
        ->call('createTweet')
        ->assertHasErrors(['body' => 'max']);
});


it('should show the tweet on the timeline', function () {
    $user = User::factory()->create();

    actingAs($user);

    livewire(Create::class)
        ->set('body', 'my first tweet')
        ->call('createTweet')
        ->assertEmitted('tweet::created');

    livewire(Timeline::class)
        ->assertSee('my first tweet');
});
