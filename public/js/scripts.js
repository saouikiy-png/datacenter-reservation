document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".category-item").forEach(item => {
        item.addEventListener("click", () => {
            loadResources(item.dataset.categoryId);
        });
    });
});

function loadResources(categoryId) {
    const tbody = document.getElementById(`products-${categoryId}`);

    if (tbody.innerHTML !== "") {
        tbody.innerHTML = "";
        return;
    }

    fetch(`/resources/category/${categoryId}`)
        .then(res => res.json())
        .then(data => {
            tbody.innerHTML = "";

            if (data.length === 0) {
                tbody.innerHTML =
                    `<tr><td colspan="5">Aucune ressource</td></tr>`;
                return;
            }

            data.forEach(resource => {
                const tr = document.createElement("tr");
                tr.classList.add("resource-row");

                tr.innerHTML = `
                    <td>${resource.name}</td>
                    <td>${resource.cpu ?? "-"}</td>
                    <td>${resource.ram ?? "-"}</td>
                    <td>${resource.storage ?? "-"}</td>
                    <td>${resource.status}</td>
                `;

                tr.addEventListener("click", () => showCard(resource));
                tbody.appendChild(tr);
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
    document.getElementById("resource-card")
        .classList.add("hidden");
}
