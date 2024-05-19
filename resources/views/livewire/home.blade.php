<div>
    @if ($posts->count())
        <div class="main-middle">
            <!-- ------------------------------------------- Inicio Feed Aria ------------------------------------------- -->
            <div class="feeds">
                <div>
                    @livewire('new-post')
                </div>

                @foreach ($posts as $post)
                    <div class="feed">
                        <div class="feed-top">
                            <div class="user">
                                <div class="profile-picture">
                                    <img src="{{ Storage::url('users-avatar/' . $post->user->avatar) }}" alt="" />
                                </div>
                                <div class="info">
                                    <h4 class="font-extrabold text-[16px]"><span>@</span>{{ $post->user->username }}</h4>
                                    <div class="time text-gray">
                                        <small>{{ $post->created_at->format('d/m/Y h:i:s') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="feed-img">
                            <img src="{{ Storage::url($post->imagen) }}" alt="" />
                        </div>
                        <div class="action-button">
                            <button wire:click="like({{ $post->id }})">
                                <i @class([
                                    'fa-regular fa-heart',
                                    'fa-solid fa-heart liked' => in_array(
                                        $post->id,
                                        $misLikes->pluck('id')->toArray()),
                                ])></i>
                            </button>
                            <button id="toggleComments-{{ $post->id }}">
                                <i class="fa-regular fa-comment-dots"></i>
                            </button>
                            <span><i class="fa-solid fa-link"></i></span>
                        </div>

                        @if ($post->usersLikes->count() == 0)
                            <p>0 Likes</p>
                            <!-- Si solo tiene un like, aparece que es likeado por esa persona y solo aparece su foto -->
                        @elseif ($post->usersLikes->count() == 1)
                            <div class="liked-by">
                                <span><img
                                        src="{{ Storage::url('users-avatar/' . $post->usersLikes()->inRandomOrder()->value('avatar')) }}"
                                        alt="" /></span>
                                <p>Liked By <b>{{ $post->usersLikes()->inRandomOrder()->value('name') }}</b></p>
                            </div>
                        @else
                            <!-- Si tiene más de un like, aparece que es likeado por dos personas random y cuantas personas más -->
                            <div class="liked-by">
                                <span><img
                                        src="{{ Storage::url('users-avatar/' . $post->usersLikes()->inRandomOrder()->value('avatar')) }}"
                                        alt="" /></span>
                                <span><img
                                        src="{{ Storage::url('users-avatar/' . $post->usersLikes()->inRandomOrder()->value('avatar')) }}"
                                        alt="" /></span>
                                <p>Liked By <b>{{ $post->usersLikes()->inRandomOrder()->value('name') }}</b> and
                                    <b>{{ $post->usersLikes->count() - 1 }}</b> others
                                </p>
                            </div>
                        @endif

                        <div class="caption">
                            <p>
                                <span class="pr-1 font-bold">{{ $post->user->name }}</span>{{ $post->contenido }}
                            </p>
                            <div class="tags pt-2 flex flex-wrap gap-2">
                                @foreach ($post->tags as $tag)
                                    <span
                                        class="px-1 py-0.5 bg-[{{ $tag->color }}] rounded-full mr-1">{{ $tag->nombre }}</span>
                                @endforeach
                            </div>
                        </div>

                        <div id="comments-{{ $post->id }}" class="comments" style="display: none;">
                            @if (count($post->comments))
                                @foreach ($post->comments as $comment)
                                    <div class="comment">
                                        <div class="profile-picture">
                                            <img src="{{ Storage::url('users-avatar/' . $comment->user->avatar) }}"
                                                alt="" />
                                        </div>
                                        <div class="comment-body">
                                            <p class="font-extrabold">{{ $comment->user->username }}</p>
                                            <p>
                                                {{ $comment->contenido }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>No comments yet</p>
                            @endif

                        </div>

                    </div>
                @endforeach
            </div>
            <!-- ------------------------------------------- Fin Feed Aria  ------------------------------------------- -->
        </div>
    @else
        <p>
            "New to the game? 🌟 Still haven't found your crew? Time to dive into Explore! Discover a realm of endless
            inspiration and awesome content creators just waiting to be found. Tap into Explore and kickstart your
            journey today! 🚀</p>
    @endif
</div>
