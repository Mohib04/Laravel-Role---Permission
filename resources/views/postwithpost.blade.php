<!-- resources/views/posts/index.blade.php -->
<!DOCTYPE html>
<html>

<head>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
  <!-- Include Font Awesome CSS for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Custom CSS -->
  <style>
    .post-card {
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 15px;
      margin-bottom: 20px;
    }

    .post-card-title {
      font-size: 20px;
      margin-bottom: 10px;
    }

    .comments-section {
      margin-top: 15px;
      border-top: 1px solid #ddd;
      padding-top: 15px;
    }

    .comments-toggle {
      font-size: 18px;
      color: #6c757d;
      cursor: pointer;
    }

    .comments-toggle:hover {
      color: #007bff;
    }

    .comments-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .comment-item {
      margin-bottom: 10px;
    }

    .comment-icon {
      color: #28a745;
      margin-right: 5px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1 class="text-center mt-5">Posts with Comments</h1>

    @foreach ($postsWithComments as $post)
    <div class="card post-card">
      <div class="card-body">
        <h3 class="card-title text-uppercase post-card-title">{{ $post->title }} - <small class="text-opacity-25 ">post
            id: {{ $post->id
            }}</small>
        </h3>
        <p class="card-text">{{ $post->content }}</p>
      </div>
      <div class="comments-section">
        <h6 class="comments-toggle" data-bs-toggle="collapse" data-bs-target="#commentsCollapse{{ $post->id }}"
          aria-expanded="false" aria-controls="commentsCollapse{{ $post->id }}">
          <i class="fas fa-comments comment-icon"></i> Comments
        </h6>
        <div id="commentsCollapse{{ $post->id }}" class="collapse">
          @if ($post->comment_content)
          <ul class="comments-list">
            <li class="comment-item">
              <i class="fas fa-comment comment-icon"></i> {{ $post->comment_content }}
              <span class="text-muted">- User ID: {{ $post->comment_user_id }}</span>
            </li>
          </ul>
          @else
          <p class="text-muted">No comments yet.</p>
          @endif
        </div>
      </div>
    </div>
    @endforeach

    <div class="d-flex justify-content-center mt-4">

    </div>
  </div>

  <!-- Include Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <!-- Include Font Awesome JS for icons -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>

</html>