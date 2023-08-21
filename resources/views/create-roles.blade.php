<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List of Roles</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

  <div class="container">
    <h1>Create Roles</h1>
    @if(session('success'))
    <div class="alert alert-success mt-3">
      <span class="badge badge-success">Success</span> {{ session('success') }}
    </div>
    @endif
    @if(session('danger'))
    <div class="alert alert-danger mt-3">
      <span class="badge badge-danger">Delete</span> {{ session('danger') }}
    </div>
    @endif
    @if(session('exist'))
    <div class="alert alert-danger mt-3">
      <span class="badge badge-danger">Role</span> {{ session('exist') }}
    </div>
    @endif
    <form action="{{ route('store.roles') }}" method="POST">
      @csrf

      <h2>Create Role</h2>
      <div class="form-group">
        <label for="role_name">Role Name:</label>
        <input type="text" class="form-control" name="role_name" id="role_name" required>
      </div>

      <button type="submit" class="btn btn-primary">Create Role</button>
    </form>

    <hr>

    <div>
      <h1>List of Roles</h1>

      <div class="table-responsive">
        <table class="table table-bordered" id="rolesTable">
          <thead>
            <tr>
              <th>Role Name</th>
              <th>Permissions</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($roles as $role)
            <tr>
              <td>{{ $role->name }}</td>
              <td>
                @foreach ($role->permissions as $permission)
                <span class="badge badge-primary">{{ $permission->name }}</span>
                @endforeach
              </td>
              <td>
                <a href="{{ route('edit.role', ['role' => $role->id]) }}" class="btn btn-info btn-sm mr-2">
                  <i class="fas fa-edit"></i> <!-- Font Awesome icon for edit -->
                </a>
                <form action="{{ route('delete.role', ['role' => $role->id]) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash-alt"></i> <!-- Font Awesome icon for delete -->
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
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