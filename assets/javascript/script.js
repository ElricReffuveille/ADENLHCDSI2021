// At least 1 majuscule, 1 minuscule, 1 number and 8 or more characters.
const regex = /(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}/g;

$("#submit").on("click",function (e){

    let valid = 0;

    let name = document.getElementById("name").value ;
    let pass = document.getElementById("pass").value ;

    if((pass.length === 0) && (!regex.test(pass))){
        $(".alertPass").css("display","block")
    }else{
        $(".alertPass").css("display","none")
        valid++;
    }

    if(name.length === 0){
        $(".alertName").css("display","block")
    }else{
        $(".alertName").css("display","none")
        valid++;
    }

    if(valid===2){
        console.log({name:name , pass:pass})
    }
})