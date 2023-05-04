document.addEventListener('click', async (e)=>{      
    if(e.target.classList.contains("more")){
        postJSON("/app/tables/moreJsLoader.php", e.target.dataset.id, "more").then(function(value){
            console.log(document.querySelector("body"))
            document.querySelector("body").insertAdjacentHTML("beforeend", `
            <div class="modal-wrapper">
                <div class="modalll">
                    <div id="showMore">

                    </div>
                </div>
            </div>
        `)
        value.productInBasket.forEach(element => {
            console.log(element)
            document.querySelector("#showMore").insertAdjacentHTML("beforeend", `
            <div class= "moreElement">
                <h2>${element.name}</h2>
                <h2>${element.price}₽</h2>
                <img src="/upload/tunings/${element.photo}" alt="" />
            
            </div>


            `)
        });
        if(document.querySelectorAll(".moreElement").length == 0){
            document.querySelector("#showMore").insertAdjacentHTML("beforeend", `

            <h2>Пока что ничего нет</h2>

            `)
        }
        modal = document.querySelector(".modal-wrapper");
        modal.addEventListener("click", function (e) {
            if (e.target == e.currentTarget) {
                modal.remove();
            }
        });
        document.addEventListener("keyup", function (e) {
            console.log(e.key);
            if (e.key == "Escape") {
                modal.remove();
            }
        });

        }) 
    }
})
    