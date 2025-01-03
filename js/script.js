document.addEventListener("DOMContentLoaded", function () {
    var toggleOpen = document.getElementById('toggleOpen');
    var toggleClose = document.getElementById('toggleClose');
    var collapseMenu = document.getElementById('collapseMenu');

    function handleClick() {
        if (collapseMenu.style.display === 'block') {
            collapseMenu.style.display = 'none';
        } else {
            collapseMenu.style.display = 'block';
        }
    }

    toggleOpen.addEventListener('click', handleClick);
    toggleClose.addEventListener('click', handleClick);

    let importance = document.querySelector("#importance");
    let taskType = document.querySelector("#taskType");
    let toHide = document.querySelector("#toHide");

    if (importance && taskType) {
        importance.style.display = "none";
        toHide.style.display = "none";
        taskType.addEventListener("change", () => {
            if (taskType.value === "basic") {
                importance.style.display = "none";
                toHide.style.display = "none";
            } else{
                importance.style.display = "block";
                toHide.style.display = "block";
            }
        })
    }
})

function toggleStatusForm() {
    const form = document.getElementById('status-form');
    form.classList.toggle('hidden');
}

function toggleReassignForm() {
    const form = document.getElementById('reassign-form');
    form.classList.toggle('hidden');
}