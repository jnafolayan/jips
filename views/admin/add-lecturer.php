<?php
require_once('../../lib/layout.php');
$style = "../../static/stylesheets/admin/add-lecturer.css";

require_once('../../modules/Lecturer.php');
require_once('../../modules/Department.php');

$titles = ["Mr.", "Mrs.", "Miss", "Dr.", "Professor"];
$departments = Department::getDepartments();
$submitError = null;

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $employeeID = $_POST['employeeID'];
    $departmentID = $_POST['department'];

    $result = Lecturer::createLecturer($employeeID, $title, $firstName, $lastName, $departmentID);
    if ($result !== false) {
        header('location: view-lecturers.php');
    } else {
        $submitError = 'Unable to create new lecturer.';
    }
}
?>


<h1 id="form-title">Add New Lecturer</h1>
<?php
if ($submitError) {
    echo "<p class='text-danger'>$submitError</p>";
}
?>
<form id="new-lecturer-form" class="row" method="POST">
    <div class="mb-3 col-md-2">
        <label for="Title" class="form-label">Title</label>
        <select class="form-select" name="title" id="title" required>
            <?php
            foreach ($titles as $title) {
                echo "<option value='$title'>{$title}</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3 col-md-5">
        <label for="lastName" class="form-label">Lastname</label>
        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Lastname" required>
    </div>

    <div class="mb-3 col-md-5">
        <label for="firstName" class="form-label">Firstname</label>
        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Firstname" required>
    </div>

    <div class="mb-3 col-md-6">
        <label for="employeeID" class="form-label">Employee ID</label>
        <input type="text" class="form-control" id="employeeID" name="employeeID" placeholder="Employee ID" required>
    </div>

    <div class="mb-3 col-md-6">
        <label for="department" class="form-label">Department</label>
        <select class="form-select" name="department" id="department">
            <?php
            foreach ($departments as $dept) {
                $deptID = $dept['id'];
                $deptName = $dept['name'];
                echo "<option value='$deptID'>{$deptName}</option>";
            }
            ?>
        </select>
    </div>

    <div class="col-md-12">
        <input type="submit" name="submit" class="btn btn-success" id="submit-btn" value="Add Lecturer" />
    </div>
</form>