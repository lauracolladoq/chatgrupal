<div>
    @if ($posts->count())
        <div class="main-middle">
            <!-- ------------------------------------------- Inicio Feed Aria ------------------------------------------- -->
            <div class="feeds">
                @foreach ($posts as $post)
                    <div class="feed">
                        <div class="feed-top">
                            <div class="user">
                                <div class="profile-picture">
                                    <img src="{{ Storage::url($post->user->avatar) }}" alt="" />
                                </div>
                                <div class="info">
                                    <h4><span>@</span>{{ $post->user->username }}</h4>
                                    <div class="time text-gry">
                                        <small>{{ $post->created_at->format('d/m/Y h:i:s') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="feed-img">
                            <img src="{{ Storage::url($post->imagen) }}" alt="" />
                        </div>
                        <div class="action-button">
                            <div class="interaction-button">
                                <span><i class="fas fa-heart"></i></span>
                                <span><i class="fa-regular fa-comment-dots"></i></span>
                                <span><i class="fa-solid fa-link"></i></span>
                            </div>
                        </div>

                        <div class="liked-by">
                            <span><img src="{{ Storage::url($post->usersLikes()->inRandomOrder()->value('avatar')) }}" alt="" /></span>
                            <span><img src="{{ Storage::url($post->usersLikes()->inRandomOrder()->value('avatar')) }}" alt="" /></span>
                            <p>Liked By <b>{{ $post->usersLikes()->inRandomOrder()->value('name') }} </b> and
                                <b>{{ $post->usersLikes->count()-1 }}</b> others</p>
                        </div>
                        <div class="caption">
                            <p>
                                <b>{{ $post->user->name }}</b>{{ $post->contenido }}
                                <span class="hars-tag">#prueba</span>
                                @endforeach
                            </p>
                        </div>
                        <div class="comments text-gry">View all comments</div>
                    </div>
                @endforeach
            </div>
            <!-- ------------------------------------------- Fin Feed Aria  ------------------------------------------- -->
        </div>
    @endif
</div>
