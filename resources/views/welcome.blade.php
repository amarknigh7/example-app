<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Data Input</title>
    <style>
        .container {
            display: none;
        }
        .container.active {
            display: block;
        }
    </style>
</head>
<body>
    <!-- Tab Navigation -->
    <div id="tabNavigation">
        <button id="tabAddEmployee" class="tab-button active">Tambah Karyawan</button>
        <button id="tabViewData" class="tab-button">Lihat Data Karyawan</button>
    </div>

    <!-- Add Employee Form -->
    <div id="addEmployee" class="container active">
        <form class="form" id="employeeForm">
            <h2 class="form__title">Tambah Karyawan</h2>
            <input type="text" placeholder="Nama" class="input" name="Nama" required/>
            <input type="text" placeholder="ID Karyawan" class="input" name="ID" required/>
            <textarea placeholder="Alamat" class="input" name="Alamat" required></textarea>
            <button class="btn" type="submit">Simpan</button>
        </form>
    </div>

    <!-- View Employee Data -->
    <div id="viewEmployeeData" class="container">
        <h2>Data Karyawan</h2>
        <div id="employeeList"></div>
        <button id="backToAddEmployee">Kembali ke Menu Tambah Karyawan</button>
    </div>

    <script>
        // Tab Navigation
        document.querySelectorAll('.tab-button').forEach(function(tab) {
            tab.addEventListener('click', function() {
                document.querySelectorAll('.tab-button').forEach(function(t) {
                    t.classList.remove('active');
                });
                this.classList.add('active');

                // Hide all containers
                document.querySelectorAll('.container').forEach(function(container) {
                    container.classList.remove('active');
                });

                // Show corresponding container
                var targetId = this.id.replace('tab', '').toLowerCase();
                document.getElementById(targetId).classList.add('active');
            });
        });

        document.getElementById('employeeForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission

            // Get form data
            var formData = new FormData(this);
            var nama = formData.get('Nama');
            var id = formData.get('ID');
            var alamat = formData.get('Alamat');

            // Display form data
            var employeeData = "<p>Nama: " + nama + "</p><p>ID Karyawan: " + id + "</p><p>Alamat: " + alamat + "</p>";

            // Append the data to the employee list
            document.getElementById('employeeList').innerHTML = employeeData;

            // Clear the form after submission (optional)
            this.reset();
        });

        // Go back to add employee form from view data
        document.getElementById('backToAddEmployee').addEventListener('click', function(event) {
            event.preventDefault();
            document.querySelectorAll('.tab-button').forEach(function(tab) {
                tab.classList.remove('active');
            });
            document.getElementById('tabAddEmployee').classList.add('active');

            document.querySelectorAll('.container').forEach(function(container) {
                container.classList.remove('active');
            });
            document.getElementById('addEmployee').classList.add('active');
        });
    </script>
</body>
</html>
