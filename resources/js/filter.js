const checkboxesS = document.querySelectorAll('input[name="size[]"]');
const checkboxes = document.querySelectorAll('input[name="color[]"]');

function loadCheckboxStatus() {
    const savedStatus = JSON.parse(localStorage.getItem('checkboxStatus')) || {};
    checkboxes.forEach(checkbox => {
        checkbox.checked = savedStatus[checkbox.value] || false;
    });
}

function saveCheckboxStatus() {
    const status = {};
    checkboxes.forEach(checkbox => {
        status[checkbox.value] = checkbox.checked;
    });
    localStorage.setItem('checkboxStatus', JSON.stringify(status));
}

loadCheckboxStatus();

// Menambahkan event listener untuk setiap checkbox
checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', saveCheckboxStatus);
});

function loadCheckboxStatusS() {
    const savedStatusS = JSON.parse(localStorage.getItem('checkboxStatusS')) || {};
    checkboxesS.forEach(checkbox => {
        checkbox.checked = savedStatusS[checkbox.value] || false;
    });
}

function saveCheckboxStatusS() {
    const status = {};
    checkboxesS.forEach(checkbox => {
        status[checkbox.value] = checkbox.checked;
    });
    localStorage.setItem('checkboxStatusS', JSON.stringify(status));
}

loadCheckboxStatusS();

// Menambahkan event listener untuk setiap checkbox
checkboxesS.forEach(checkbox => {
    checkbox.addEventListener('change', saveCheckboxStatusS);
});