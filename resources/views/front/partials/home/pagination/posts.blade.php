<div class="container">
    <div class="row">

        <div class="wow fadeInUp col-md-12 col-sm-12 text-center" data-wow-delay="0.5s">
            <h2>Blog</h2>
            <p>Saznajte sve o najnovijim dešavanjima kod nas</p>
        </div>

        @foreach($posts as $post)

            <div class="wow fadeInUp col-md-6 col-sm-12" data-wow-delay="0.9s">
                <div class="blog-thumb">
                    <span class="blog-date">{{ $post->created_at->format('d.m.Y.') }}</span>
                    <h3 class="blog-title"><a href="{{ url('/posts/'.$post->id) }}">{{ $post->title }}</a></h3>
                    <h5 id="blog-author">{{ $post->user->first_name }} {{ $post->user->last_name }}</h5>
                </div>
            </div>

        @endforeach

    </div>
</div>

<div id="post_pagination" class="wow fadeInUp text-center" data-wow-delay="1.2s">{{ $posts->links() }}</div>
