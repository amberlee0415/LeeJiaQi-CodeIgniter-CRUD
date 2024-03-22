<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lee Jia Qi</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h1>CRUD</h1>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-success mb-2 btn-add-user">Add User</button>
        </div>
        <table class="table table-bordered table-striped" id="users-list">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($users): ?>
                    <?php foreach($users as $user): ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm btn-edit-user">Edit</button>
                                <a href="<?php echo base_url('delete/' .$user['id']) ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="modal" id="addUserModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="addUserForm" name="add_create" action="<?= site_url('/submit-form'); ?>">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="editUserModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="editUserForm" name="edit_update">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>

    <script>
        $(document).ready( function () {
            $('#users-list').DataTable();
        } );
    </script>

    <script>
        $(document).ready(function(){
            // Show modal when "Add User" button is clicked
            $('.btn-add-user').click(function(){
                $('#addUserModal').modal('show');
            });

            $('.btn-edit-user').click(function(){
                // Get the associated user data
                var id = $(this).closest('tr').find('td:eq(0)').text(); // Assuming ID is in the first column
                var name = $(this).closest('tr').find('td:eq(1)').text(); // Assuming Name is in the second column
                var email = $(this).closest('tr').find('td:eq(2)').text(); // Assuming Email is in the third column

                // Populate modal fields with user data
                $('#editUserModal').find('#name').val(name);
                $('#editUserModal').find('#email').val(email);

                // Set the form action URL with the user ID
                $('#editUserForm').attr('action', '<?= site_url('/update-form/') ?>' + id);

                // Show the edit modal
                $('#editUserModal').modal('show');
            });
        });
    </script>
</body>
</html>