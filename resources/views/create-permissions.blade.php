<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Permissions</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

  <div class="container">
    <h1>Create Permissions</h1>

    <form action="{{ route('store.permissions') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="permission_name">Permission Name:</label>
        <input type="text" class="form-control" name="permission_name" id="permission_name" required>
      </div>

      <button type="submit" class="btn btn-primary">Create Permission</button>
    </form>

    <h2>List of Permissions</h2>

    <div class="list-group">
      @foreach ($permissions as $permission)
      <div class="list-group-item">{{ $permission->name }}</div>
      @endforeach
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>