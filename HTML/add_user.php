<?php
require_once("./Db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # code...
}
$db = new Db();
$pdo = $db->connect();
?>
<?php require_once("./header.php") ?>

<section class="mt-8 flex flex-col items-center">
    <h2 class="text-lg font-semibold text-[#007bff] mb-4">Add User</h2>
    <form class="w-full bg-gray-100 border border-gray-300 rounded p-4 flex gap-5 flex-col items-center">
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