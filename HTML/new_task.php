<?php
require_once("./../db/Db.php");
$db = new Db();
$pdo = $db->connect();
?>

<?php require_once("./header.php") ?>

<form class="bg-gray-100 border border-gray-300 rounded shadow p-4 space-y-4" action="./../controllers/Controller.php?action=create" method="POST">
    <div class="flex items-center gap-2">
        <input type="text" name="title" placeholder="Task Title" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
    </div>

    <textarea name="description" rows="3" placeholder="Task Description" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>

    <div class="relative">
        <select name="assignedTo" class="block w-full px-4 py-2 border rounded-lg appearance-none focus:ring-2 focus:ring-blue-500 focus:outline-none">
            <option disabled>-- Assigned to --</option>
            <option value="0">Not assigned</option>
            <?php
            $stmt = $pdo->prepare("SELECT user_id, full_name FROM users;");
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
                echo "<option value=" . $row['user_id'] . ">" . $row['full_name'] . "</option>";
            }
            ?>
        </select>
        <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
        </div>
    </div>

    <div class="relative">
        <select name="taskType" id="taskType" class="block w-full px-4 py-2 border rounded-lg appearance-none focus:ring-2 focus:ring-blue-500 focus:outline-none">
            <option disabled>-- Task Type --</option>
            <option value="basic">Basic</option>
            <option value="bug">Bug</option>
            <option value="feature">Feature</option>
        </select>
        <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
        </div>
    </div>

    <div class="relative" id="toHide">
        <select name="importance" id="importance" class="block w-full px-4 py-2 border rounded-lg appearance-none focus:ring-2 focus:ring-blue-500 focus:outline-none">
            <option disabled>-- Importance --</option>
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
            <option value="Critical">Critical</option>
        </select>
        <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
        </div>
    </div>
    <div class="relative">
        <select name="status" class="block w-full px-4 py-2 border rounded-lg appearance-none focus:ring-2 focus:ring-blue-500 focus:outline-none">
            <option disabled>-- Status --</option>
            <option value="To do">To Do</option>
            <option value="In Progress">In Progress</option>
            <option value="Done">Done</option>
        </select>
        <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
        </div>
    </div>

    <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">
        Save Task
    </button>
</form>


<?php require_once("./footer.php") ?>