
function show(state, id){
    if(id!=null)
        document.getElementById(id).style.display = state;
    else{
        document.getElementById('Fpp-window-manual').style.display = state;
        document.getElementById('Fpp-window-about').style.display = state;
        document.getElementById('Fpp-window-contact').style.display = state;
    }
    document.getElementById('Fpp-background').style.display = state;
}

