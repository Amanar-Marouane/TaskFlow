<?php
require_once("./Db.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
}
$conn = new Db();
$conn->connect();
?>

<?php require_once("./header.php") ?>

<form class="bg-gray-100 border border-gray-300 rounded shadow p-4 space-y-4" action="./new_task.php" method="POST">
    <div class="flex items-center gap-2">
        <input type="text" name="title" placeholder="Task Title" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
    </div>

    <textarea name="description" rows="3" placeholder="Task Description" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>

    <input type="text" name="assignedTo" placeholder="Assigned to (e.g., User)" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">

    <div class="relative">
        <select name="taskType" class="block w-full px-4 py-2 border rounded-lg appearance-none focus:ring-2 focus:ring-blue-500 focus:outline-none">
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

    <div class="relative">
        <select name="status" class="block w-full px-4 py-2 border rounded-lg appearance-none focus:ring-2 focus:ring-blue-500 focus:outline-none">
            <option value="todo">To Do</option>
            <option value="inprogress">In Progress</option>
            <option value="done">Done</option>
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