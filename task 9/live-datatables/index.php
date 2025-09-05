<?php
// index.php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Live DataTable Add/Edit/Delete</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
    <script src="ajax.js"></script>
</head>
<body>
<div class="container">
    <h2>Live DataTable Add/Edit/Delete</h2>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#recordModal">Add Record</button>
    <br><br>
    <table id="recordListing" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Age</th>
                <th>Skills</th>
                <th>Address</th>
                <th>Designation</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
    </table>
</div>

<!-- Modal -->
<div id="recordModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="recordForm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Add Record</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" />
                    <input type="hidden" name="action" id="action" value="addRecord" />
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input type="number" name="age" id="age" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Skills</label>
                        <input type="text" name="skills" id="skills" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" id="address" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Designation</label>
                        <input type="text" name="designation" id="designation" class="form-control" />
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
