// On attache les fonctions à window pour qu'elles soient accessibles par onclick
window.loadProducts = function(categoryId) {
    fetch(`/api/categories/${categoryId}/resources`)
        .then(res => res.json())
        .then(data => {
            const list = document.getElementById(`products-${categoryId}`);
            list.innerHTML = "";

            data.forEach(resource => {
                const li = document.createElement("li");
                li.className = "text-primary cursor-pointer"; // Optionnel : pour le style
                li.style.cursor = "pointer";
                li.textContent = resource.name;
                
                // Appel de la fonction de détails au clic
                li.onclick = () => window.loadProductDetails(resource.id);
                
                list.appendChild(li);
            });
        })
        .catch(err => console.error("Erreur lors du chargement des produits:", err));
}

window.loadProductDetails = function(id) {
    // La ligne "const ul = ..." a été supprimée car categoryId n'existait pas ici
    fetch(`/api/resources/${id}`)
        .then(res => res.json())
        .then(p => {
            const card = document.getElementById("product-card");
            card.classList.remove("d-none");

            document.getElementById("p-name").textContent = p.name ?? "-";
            document.getElementById("p-cpu").textContent = p.cpu ?? "-";
            document.getElementById("p-ram").textContent = p.ram ?? "-";
            document.getElementById("p-storage").textContent = p.storage ?? "-";
            document.getElementById("p-os").textContent = p.os ?? "-";
            document.getElementById("p-location").textContent = p.location ?? "-";
            document.getElementById("p-status").textContent = p.status ?? "-";
        })
        .catch(err => console.error("Erreur lors du chargement des détails:", err));
}
