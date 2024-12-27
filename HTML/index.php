<?php require_once("./../controllers/Controller.php"); ?>
<?php require_once("./header.php") ?>

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

<section class="p-5 flex items-center justify-center">
    <div class="flex items-center justify-center space-x-5">
        <div class="flex items-center justify-center space-x-3 border-2 rounded-lg p-2">
            <div class="flex items-center space-x-2">
                <svg fill="#000000" height="30px" width="30px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 282.334 282.334" xml:space="preserve">
                    <g>
                        <path d="M257.981,210.805c-0.535,0-1.065,0.023-1.592,0.058c-0.369,0.024-0.737,0.054-1.101,0.095l-30.401-57.075
                            c3.601-4.246,5.779-9.735,5.779-15.725c0-6.7-2.721-12.776-7.114-17.183l21.395-49.463c0.24,0.007,0.478,0.018,0.719,0.018
                            c0.535,0,1.065-0.023,1.591-0.058c12.688-0.823,22.761-11.402,22.761-24.295c0-13.428-10.925-24.353-24.353-24.353
                            s-24.353,10.925-24.353,24.353c0,6.7,2.721,12.776,7.114,17.183l-18.242,42.175c-10.822-32.378-37.789-57.426-71.299-65.548
                            c-2.746-10.439-12.264-18.162-23.553-18.162s-20.807,7.723-23.553,18.162c-36.245,8.786-64.833,37.373-73.619,73.618
                            C7.723,117.351,0,126.868,0,138.157s7.723,20.807,18.162,23.553c8.786,36.245,37.374,64.833,73.619,73.619
                            c2.746,10.439,12.264,18.162,23.553,18.162s20.807-7.723,23.553-18.162c34.632-8.395,62.272-34.868,72.329-68.826l28.193,52.929
                            c-3.601,4.246-5.779,9.735-5.779,15.725c0,13.428,10.925,24.353,24.353,24.353s24.353-10.925,24.353-24.353
                            S271.409,210.805,257.981,210.805z M264.334,235.157c0,3.503-2.85,6.353-6.353,6.353s-6.353-2.85-6.353-6.353
                            s2.85-6.353,6.353-6.353S264.334,231.654,264.334,235.157z M121.687,229.139c0,3.503-2.85,6.353-6.353,6.353
                            s-6.353-2.85-6.353-6.353s2.85-6.353,6.353-6.353S121.687,225.636,121.687,229.139z M136.616,217.32
                            c-4.164-7.469-12.141-12.534-21.282-12.534s-17.118,5.065-21.282,12.534c-28.126-7.569-50.312-29.754-57.881-57.881
                            c7.469-4.164,12.534-12.141,12.534-21.282s-5.065-17.118-12.534-21.282c7.569-28.126,29.754-50.311,57.881-57.88
                            c4.164,7.469,12.141,12.534,21.282,12.534s17.118-5.065,21.282-12.534c28.125,7.569,50.311,29.754,57.88,57.88
                            c-7.469,4.164-12.534,12.141-12.534,21.282s5.065,17.118,12.534,21.282C186.927,187.566,164.742,209.751,136.616,217.32z
                            M24.353,131.805c3.503,0,6.353,2.85,6.353,6.353s-2.85,6.353-6.353,6.353S18,141.66,18,138.157S20.85,131.805,24.353,131.805z
                            M108.981,47.177c0-3.503,2.85-6.353,6.353-6.353s6.353,2.85,6.353,6.353s-2.85,6.353-6.353,6.353S108.981,50.68,108.981,47.177z
                            M206.314,144.51c-3.503,0-6.353-2.85-6.353-6.353s2.85-6.353,6.353-6.353s6.353,2.85,6.353,6.353S209.817,144.51,206.314,144.51z
                            M252.02,47.177c0,3.503-2.85,6.353-6.353,6.353s-6.353-2.85-6.353-6.353s2.85-6.353,6.353-6.353S252.02,43.674,252.02,47.177z" />
                    </g>
                </svg>
                <span class="text-sm text-gray-600">Feature</span>
            </div>
            <div class="flex items-center space-x-2">
                <svg width="30px" height="30px" viewBox="0 0 281.25 281.25" id="svg2" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg">
                    <defs id="defs4" />
                    <g id="layer1" transform="translate(6402.3564,-4296.9987)">
                        <path d="m -6251.0783,4337.2868 a 4.6879687,4.6879687 0 0 0 -4.6875,4.6875 v 128.7945 a 4.6879687,4.6879687 0 0 0 0.9814,2.8674 l 19.4129,25.0965 a 4.6879687,4.6879687 0 0 0 7.4157,0 l 19.4147,-25.0965 a 4.6879687,4.6879687 0 0 0 0.9778,-2.8674 v -128.7945 a 4.6879687,4.6879687 0 0 0 -4.6875,-4.6875 z m 4.6875,9.375 h 29.4525 v 122.5067 l -14.7235,19.0338 -14.729,-19.0357 z m -109.3323,64.0191 a 4.6879687,4.6879687 0 0 0 -4.6875,4.6875 v 117.9053 a 4.6879687,4.6879687 0 0 0 4.6875,4.6875 h 187.9834 a 4.6879687,4.6879687 0 0 0 4.6875,-4.6875 v -117.9053 a 4.6879687,4.6879687 0 0 0 -4.6875,-4.6875 h -21.308 a 4.6875,4.6875 0 0 0 -4.6875,4.6875 4.6875,4.6875 0 0 0 4.6875,4.6875 h 16.6205 v 108.5303 h -178.6084 v -108.5303 h 74.3884 a 4.6875,4.6875 0 0 0 4.6875,-4.6875 4.6875,4.6875 0 0 0 -4.6875,-4.6875 z m 25.0964,78.1293 a 4.6875,4.6875 0 0 0 -4.6875,4.6875 4.6875,4.6875 0 0 0 4.6875,4.6875 h 50.6653 a 4.6875,4.6875 0 0 0 4.6875,-4.6875 4.6875,4.6875 0 0 0 -4.6875,-4.6875 z" id="rect8210" style="color:#000000;fill:#3d3d3d;fill-opacity:1;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;-inkscape-stroke:none" />
                    </g>
                </svg>
                <span class="text-sm text-gray-600">Basic</span>
            </div>
            <div class="flex items-center space-x-2">
                <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 19C9.23858 19 7 16.7614 7 14M12 19C14.7614 19 17 16.7614 17 14M12 19V14M7 14V11.8571C7 11.0592 7 10.6602 7.11223 10.3394C7.31326 9.76495 7.76495 9.31326 8.33944 9.11223C8.66019 9 9.05917 9 9.85714 9H14.1429C14.9408 9 15.3398 9 15.6606 9.11223C16.2351 9.31326 16.6867 9.76495 16.8878 10.3394C17 10.6602 17 11.0592 17 11.8571V14M7 14H4M17 14H20M17 10L19.5 7.5M4.5 20.5L8 17M7 10L4.5 7.5M19.5 20.5L16 17M14 6V5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5V6H14Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span class="text-sm text-gray-600">Bug</span>
            </div>
        </div>
        <button class="bg-[#007bff] text-white px-4 py-2 rounded shadow"><a href="./../controllers/Controller.php?action=select">Add Task</a></button>
    </div>
</section>
<section class="container mx-auto p-4 min-h-screen bg-gray-200">
    <div class="grid grid-cols-3 gap-4">
        <!-- To Do List -->
        <div class="bg-gray-100 border border-gray-300 rounded p-4">
            <h2 class="text-lg font-semibold text-[#007bff] mb-4">To Do</h2>
            <div class="space-y-4">
                <!-- Task Template -->
                <?php
                $tasks = new Controller();
                $tasks->tasksRender("To do");
                ?>
            </div>
        </div>

        <!-- In Progress List -->
        <div class="bg-gray-100 border border-gray-300 rounded p-4">
            <h2 class="text-lg font-semibold text-[#007bff] mb-4">In Progress</h2>
            <div class="space-y-4">
                <!-- Task Template -->
                <?php
                $tasks->tasksRender("In progress");
                ?>
            </div>
        </div>

        <!-- Done List -->
        <div class="bg-gray-100 border border-gray-300 rounded p-4">
            <h2 class="text-lg font-semibold text-[#007bff] mb-4">Done</h2>
            <div class="space-y-4">
                <!-- Task Template -->
                <?php
                $tasks->tasksRender("Done");
                ?>
            </div>
        </div>
    </div>
</section>
<section class="mt-ad p-5 flex flex-col items-center">
    <h2 class="text-lg font-semibold text-[#007bff] mb-4">Team Members</h2>
    <div class="mb-4 flex flex-wrap justify-center gap-5">
        <?php
        $render = new Controller();
        $render->usersRender();
        ?>
    </div>
    <div>
        <button class="bg-[#007bff] text-white px-4 py-2 rounded shadow"><a href="./add_user.php">Add Member</a></button>
    </div>
    </div>
</section>

<?php require_once("./footer.php"); ?>