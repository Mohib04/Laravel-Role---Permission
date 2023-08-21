<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List of Roles</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

  <div class="container">

    <form action="{{ route('update.role', [$role->id]) }}" method="POST">
      @method('PUT')
      @csrf
      <h2>Update Role</h2>
      <div class="form-group">
        <input class="form-control" type="text" value="{{ $role->name }}" name="name" />
      </div>
      @if(session('error'))
      <div class="alert alert-danger mt-3">
        <span class="badge badge-danger">Error</span> {{ session('error') }}
      </div>
      @endif
      <button type="submit" class="btn btn-primary">Update Role</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#rolesTable').DataTable();
    });
  </script>
</body>

</html>