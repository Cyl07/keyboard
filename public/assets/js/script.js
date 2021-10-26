let indices = document.getElementsByClassName("indice");

for (let index in indices){
    let html = indices[index].innerHTML.split(" ")[0];
    if (html < 1){
        indices[index].parentElement.classList.add("good");
    } else if(html < 2){
        indices[index].parentElement.classList.add("average");
    } else {
        indices[index].parentElement.classList.add("bad");
    }
}