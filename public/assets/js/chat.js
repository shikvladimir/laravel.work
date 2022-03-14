
    function openForm() {
    document.getElementById("myForm").style.display = "block";
}

    function closeForm() {
    document.getElementById("myForm").style.display = "none";
}


    let content = document.getElementById('content');
    let chat_name = document.getElementById('chat_name');
    let any_user_name = document.getElementById('any_user_name');

    content.oninput = function(){
        this.value = this.value.replace('>','*');
        this.value = this.value.replace('<','*');
        this.value = this.value.replace('$','*');
        this.value = this.value.replace('%','*');
        this.value = this.value.replace('/','*');
        this.value = this.value.replace('&','*');
    }

    chat_name.oninput = function(){
        this.value = this.value.replace('>','*');
        this.value = this.value.replace('<','*');
        this.value = this.value.replace('$','*');
        this.value = this.value.replace('%','*');
        this.value = this.value.replace('/','*');
        this.value = this.value.replace('&','*');
    }

    any_user_name.oninput = function(){
        this.value = this.value.replace('>','*');
        this.value = this.value.replace('<','*');
        this.value = this.value.replace('$','*');
        this.value = this.value.replace('%','*');
        this.value = this.value.replace('/','*');
        this.value = this.value.replace('&','*');
    }

