
document.querySelector("form").addEventListener("submit", function (event) {
    const startDate = new Date(document.getElementById("start-date").value);
    const endDate = new Date(document.getElementById("end-date").value);

    if (startDate >= endDate) {
        event.preventDefault();
        alert("End date must be after start date!");
    }
});
