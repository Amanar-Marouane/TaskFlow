<?php if (isset($_GET['error'])): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error: </strong>
        <span class="block sm:inline"><?= htmlspecialchars($_GET['error']); ?></span>
        <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path d="M14.348 5.652a1 1 0 011.415 0l.086.086a1 1 0 010 1.415L11.415 11l4.434 4.434a1 1 0 01-1.415 1.415L10 12.415l-4.434 4.434a1 1 0 01-1.415-1.415L8.585 11 4.152 6.566a1 1 0 011.415-1.415L10 9.585l4.348-4.348z" />
            </svg>
        </button>
    </div>
<?php endif; ?>
<?php require_once("./header.php") ?>

<section class="mt-8 flex flex-col items-center">
    <h2 class="text-lg font-semibold text-[#007bff] mb-4">Add User</h2>
    <form class="w-full bg-gray-100 border border-gray-300 rounded p-4 flex gap-5 flex-col items-center" action="./../controllers/Controller.php?action=add" method="POST">
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