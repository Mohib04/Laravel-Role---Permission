<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Post Comment Dropdown</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

  <div class="container">
    <div class="row mt-5">
      <div class="col-md-8">
        <form method="post" action="{{ route('processForm') }}">
          @csrf
          <div class="form-group">
            <label for="user">Select User:</label>
            <select class="form-control" id="user" name="user_id">
              @foreach($users as $user)
              <option value="{{ $user->id }}">{{ $user->id }} {{ $user->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="post">Select Post:</label>
            <select class="form-control" id="post" name="post_id">
              <option value="">Select a post</option>
            </select>
          </div>
          <div class="form-group">
            <label for="comment">Select Comment:</label>
            <select class="form-control" id="comment" name="comment_id">
              <option value="">Select a comment</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <!-- Display selected IDs after submission -->
        @if(isset($selectedIds))
        <div class="mt-3">
          Selected User ID: {{ $selectedIds['user_id'] ?? 'N/A' }}<br>
          Selected Post ID: {{ $selectedIds['post_id'] ?? 'N/A' }}<br>
          Selected Comment ID: {{ $selectedIds['comment_id'] ?? 'N/A' }}
        </div>
        @endif
      </div>
    </div>
  </div>

  <!-- Include jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function () {
      $('#user').change(function () {
        var userId = $(this).val();
        if (userId) {
          $.ajax({
            type: 'GET',
            url: '{{ route('getPosts') }}',
            data: { user_id: userId },
            success: function (data) {
              $('#post').html('<option value="">Select a post</option>');
              $.each(data.posts, function (index, post) {
                $('#post').append('<option value="' + post.id + '">' + post.title + post.id + '</option>');
              });
            }
          });
        } else {
          $('#post').html('<option value="">Select a post</option>');
        }
      });

      $('#post').change(function () {
        var postId = $(this).val();
        if (postId) {
          $.ajax({
            type: 'GET',
            url: '{{ route('getComments') }}',
            data: { post_id: postId },
            success: function (data) {
              $('#comment').html('<option value="">Select a comment</option>');
              $.each(data.comments, function (index, comment) {
                $('#comment').append('<option value="' + comment.id + '">' + comment.content + '</option>');
              });
            }
          });
        } else {
          $('#comment').html('<option value="">Select a comment</option>');
        }
      });
    });
  </script>

</body>

</html>