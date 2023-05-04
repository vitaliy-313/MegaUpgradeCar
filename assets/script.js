document.querySelector("#agreement").addEventListener("change", (e)=>{
    document.querySelector("[name=btnRegister]").disabled = !e.target.checked
})