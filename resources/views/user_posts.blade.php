<h1>{{ $user->name }}'s Posts</h1>

<ul>
  @foreach ($posts as $post)
  <li>
    <h3>{{ $post->title }}</h3>
    <p>{{ $post->content }}</p>
  </li>
  @endforeach
</ul>