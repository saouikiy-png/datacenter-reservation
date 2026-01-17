document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".category-item").forEach(item => {
        item.addEventListener("click", () => {
            loadResources(item.dataset.categoryId);
        });
    });
});

function loadResources(categoryId) {
    const list = document.getElementById(`products-${categoryId}`);

    if (list.innerHTML !== "") {
        list.innerHTML = "";
        return;
    }

    fetch(`/resources/category/${categoryId}`)
        .then(response => response.json())
        .then(data => {
            list.innerHTML = "";

            if (data.length === 0) {
                list.innerHTML = "<li>Aucune ressource</li>";
                return;
            }

            data.forEach(resource => {
                const li = document.createElement("li");
                li.textContent = resource.name;
                li.addEventListener("click", () => showCard(resource));
                list.appendChild(li);
            });
        });
}

function showCard(r) {
    document.getElementById("r-name").textContent = r.name;
    document.getElementById("r-cpu").textContent = r.cpu ?? "-";
    document.getElementById("r-ram").textContent = r.ram ?? "-";
    document.getElementById("r-storage").textContent = r.storage ?? "-";
    document.getElementById("r-os").textContent = r.os ?? "-";
    document.getElementById("r-location").textContent = r.location ?? "-";
    document.getElementById("r-status").textContent = r.status ?? "-";

    document.getElementById("resource-card")
        .classList.remove("hidden");
}

function closeCard() {
    document.getElementById("resource-card").classList.add("hidden");
}
