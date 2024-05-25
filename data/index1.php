<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa Kampus Tawa Tawa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="../asset/logokampus.png" alt="" width="100" height="100"><a class="navbar-brand" href="#">Universitas Tawa Tawa</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>
               
            </ul>
        </div>
    </nav>

    
    <div class="container">

<?php
function load_data() {
    return json_decode(file_get_contents('students.json'), true);
}

function save_data($students) {
    file_put_contents('students.json', json_encode($students, JSON_PRETTY_PRINT));
}

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

if ($page == 'home') {
    $students = load_data();
    echo '<h1 class="mt-5">Data Mahasiswa Lolos Tahun 2023/2024</h1>';
    echo '<table class="table mt-3">';
    echo '<thead class="thead-dark"><tr><th>#</th><th>Nama</th><th>Jurusan</th><th>Tahun Masuk</th><th>Status</th></tr></thead>';
    echo '<tbody>';
    foreach ($students as $student) {
        $status_color = ($student['status'] == 'Lolos') ? 'success' : 'danger';
        echo "<tr><th scope='row'>{$student['id']}</th><td>{$student['name']}</td><td>{$student['major']}</td><td>{$student['year_of_admission']}</td><td><span class='badge badge-{$status_color}'>{$student['status']}</span></td></tr>";
    }
    echo '</tbody></table>';
} elseif ($page == 'add') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $students = load_data();
        $new_id = end($students)['id'] + 1;
        $new_student = [
            'id' => $new_id,
            'name' => $_POST['name'],
            'major' => $_POST['major'],
            'year_of_admission' => $_POST['year_of_admission'],
            'status' => $_POST['status']
        ];
        $students[] = $new_student;
        save_data($students);
        header('Location: ?page=home');
    }

    echo '<h1 class="mt-5">Edit Data Mahasiswa</h1>';
    echo '<form method="POST" class="mt-3">';
    echo '<div class="form-group"><label for="name">Nama</label><input type="text" class="form-control" id="name" name="name" value="' . $student['name'] . '" required></div>';
    echo '<div class="form-group"><label for="student_id">NIM</label><input type="text" class="form-control" id="student_id" name="student_id" value="' . $student['student_id'] . '" required></div>';
    echo '<div class="form-group"><label for="major">Jurusan</label><input type="text" class="form-control" id="major" name="major" value="' . $student['major'] . '" required></div>';
    echo '<div class="form-group"><label for="year_of_admission">Tahun Masuk</label><input type="number" class="form-control" id="year_of_admission" name="year_of_admission" value="' . $student['year_of_admission'] . '" required></div>';
    echo '<button type="submit" class="btn btn-primary">Simpan</button></form>';
} elseif ($page == 'delete') {
    $id = $_GET['id'];
    $students = load_data();
    $students = array_filter($students, fn($s) => $s['id'] != $id);
    save_data(array_values($students));
    header('Location: ?page=home');
}
?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
