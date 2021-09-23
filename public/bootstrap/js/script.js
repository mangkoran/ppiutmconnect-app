function allContent(){
    const allCategory = document.querySelectorAll('.type-content');
    for(let i=0; i<allCategory.length; i++){
        allCategory[i].style.display = "";
    }
}

function newsContent(){
    const allCategory = document.querySelectorAll('.type-content');
    for(let i=0; i<allCategory.length; i++){
        if(allCategory[i].classList.contains("news")){
            allCategory[i].style.display = "";
        }
        else{
            allCategory[i].style.display="none";
        }
    }
}


function opregContent(){
    const allCategory = document.querySelectorAll('.type-content');
    for(let i=0; i<allCategory.length; i++){
        if(allCategory[i].classList.contains("opreg")){
            allCategory[i].style.display = "";
        }
        else{
            allCategory[i].style.display="none";
        }
    }
}