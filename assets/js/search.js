const search = document.forms.searchForm.search;

const searchResult = document.querySelector("#searchResult");
document.forms.searchForm.addEventListener("submit", (e)=>{
    e.preventDefault()
})
search.addEventListener("input",()=>{
    searchResult.innerHTML ="";
    console.log(search);
    fetch("./controller/SearchController.php?input="+search.value)
    .then((response)=>{return response.json()})
    .then((json)=>{
        json.forEach(element => {
            searchResult.innerHTML += `<a  href = "./film.php?id_movie=${element.id_movie}">${element.title}</a><br>`
        });
    })
})