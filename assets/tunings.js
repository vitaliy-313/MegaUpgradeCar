document.addEventListener("change", function (e) {
    if (e.target.classList.contains("type")) {
        postJSON("/app/admin/tables/adminOrderJsLoader.php", e.target.value, "getTypeTuniug").then(function (value) {
            document.querySelector(".dopSelect").innerHTML = ""
            document.querySelector(".dopSelect").insertAdjacentHTML("beforeend", `
                <select class="tuning" name="tuning">
                
                </select>
                <div class="priceForSelect">
                
                </div>
            `)
            let select = document.querySelector(".tuning")
            value.basketInProduct.forEach(element => {
                select.insertAdjacentHTML("beforeend", `
                <option value="${
                    element.id
                }">${
                    element.name
                }</option>
                `)
            });
            postJSON("/app/admin/tables/adminOrderJsLoader.php", select.value, "getPrice").then(function (value) {
                document.querySelector(".priceForSelect").innerHTML = `<h2>${
                    value.basketInProduct.price
                }₽</h2>`
            })
        })

    }
    console.log(postJSON("/app/admin/tables/adminOrderJsLoader.php", e.target.value, "getTypeTuniug"))

    if (e.target.classList.contains("tuning")) {
        postJSON("/app/admin/tables/adminOrderJsLoader.php", e.target.value, "getPrice").then(function (value) {
            document.querySelector(".priceForSelect").innerHTML = `<h2>${
                value.basketInProduct.price
            }₽</h2>`
        })
    }
})
