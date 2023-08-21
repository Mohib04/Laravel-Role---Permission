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
    <h1 class="text-center mt-5">Posts</h1>

    @foreach ($posts->sortBy('id') as $post)
    <div class="card post-card">
      <div class="card-body">
        <h5 class="card-title post-card-title">Post ID: {{ $post->id }} - {{ $post->title }}</h5>
        <p class="card-text">{{ $post->content }}</p>
      </div>
      <div class="comments-section">
        <h6 class="comments-toggle" data-bs-toggle="collapse" data-bs-target="#commentsCollapse{{ $post->id }}"
          aria-expanded="false" aria-controls="commentsCollapse{{ $post->id }}">
          Comments
          <i class="fas fa-chevron-down"></i>
          <span class="badge bg-secondary" data-bs-toggle="tooltip" data-bs-placement="top"
            title="{{ $post->comments->count() }} comments">
            {{ $post->comments->count() }}
          </span>
        </h6>
        <div id="commentsCollapse{{ $post->id }}" class="collapse">
          <ul class="comments-list">
            @forelse ($post->comments as $comment)
            <li class="comment-item">
              <i class="fas fa-comment comment-icon"></i>
              {{ $comment->content }} - By: {{ $comment->user->name }}
            </li>
            @empty
            <li>No comments yet.</li>
            @endforelse
          </ul>
        </div>
      </div>
    </div>
    @endforeach

    <div class="d-flex justify-content-center mt-4">
      {{ $posts->links('pagination::bootstrap-4') }}
    </div>
  </div>

  <!-- Include Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <!-- Include Font Awesome JS for icons -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
  <!-- Initialize tooltips -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      var tooltips = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
      var tooltipList = tooltips.map(function (tooltip) {
        return new bootstrap.Tooltip(tooltip);
      });
    });
  </script>
</body>

</html>