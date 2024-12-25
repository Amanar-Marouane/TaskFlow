<?php
session_start();
require_once("./Db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = false;
    if (empty($_POST['full_name'])) {
        $error = true;
        echo "Full name is required.<br>";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $_POST['full_name'])) {
        $error = true;
        echo "Full name can only contain letters and spaces.<br>";
    }

    if (empty($_POST['email'])) {
        $error = true;
        echo "Email is required.<br>";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error = true;
        echo "Invalid email format<br>";
    }

    if (! $error) {
        $db = new Db();
        $pdo = $db->connect();

        $stmt = $pdo->prepare("SELECT * FROM users WHERE full_name = :name OR email = :email;");
        $stmt->bindParam(':name', $_POST['full_name']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "The name Or The email already inserted!!";
        } else {
            $stmt = $pdo->prepare("INSERT INTO users (full_name, email) VALUES (:name, :email);");
            $stmt->bindParam(':name', $_POST['full_name']);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->execute();
            header("Location: ./index.php");
            exit();
        }
    }
}
?>
<?php require_once("./header.php") ?>

<section class="mt-8 flex flex-col items-center">
    <h2 class="text-lg font-semibold text-[#007bff] mb-4">Add User</h2>
    <form class="w-full bg-gray-100 border border-gray-300 rounded p-4 flex gap-5 flex-col items-center" action="./add_user.php" method="POST">
        <div class="w-1/4">
            <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
            <input type="text" id="full_name" name="full_name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#007bff] focus:border-[#007bff] sm:text-sm">
        </div>
        <div class="w-1/4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#007bff] focus:border-[#007bff] sm:text-sm">
        </div>
        <button type="submit" class="bg-[#007bff] text-white px-4 py-2 rounded shadow">Submit</button>
    </form>
</section>

<?php require_once("./footer.php") ?>