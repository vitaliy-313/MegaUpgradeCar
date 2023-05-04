//получение данных
async function getData(route, params = "") {
    if (params != "") {
      route += `?${params}`;
    }
    let responce = await fetch(route);
    return await responce.json();
  }
  
  //передача данных в формате json
  async function postJSON(route, data, action) {
    let responce = await fetch(route, {
      method: "POST",
      headers: {
        "Content-Type": "application/json;charset=UTF-8",
      },
      body: JSON.stringify({ data, action }),
    });
  
    return await responce.json();
  }