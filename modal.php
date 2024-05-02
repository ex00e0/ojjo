
<script>
let or=document.getElementById('a7');
let bg=document.getElementById('background');
let toReg=document.getElementById('toSignIn');
let toSign=document.getElementById('toLogIn');
let modalLog=document.getElementById('logInModal');
let modalSign=document.getElementById('signInModal');
let christ=document.getElementsByClassName('christ');

or.addEventListener('click', function(){
    bg.style.visibility='visible';
    modalLog.style.top='20vmax';
})

toReg.addEventListener('click', function(){
    modalLog.style.top='-50vmax';
    modalSign.style.top='20vmax';
})

toSign.addEventListener('click', function(){
    modalLog.style.top='20vmax';
    modalSign.style.top='-50vmax';
})

for(let i=0;i<christ.length;i++){
    christ[i].addEventListener('click', function(){
        modalLog.style.top='-50vmax';
        modalSign.style.top='-50vmax';
        bg.style.visibility='hidden';
    })
}
                let inputs = document.getElementsByClassName("input");//input
                let labels = document.getElementsByClassName("label");//label
                for(let i=0; i<inputs.length;i++) {
                    
                            inputs[i].onfocus = function( ){
                                labels[i].style.top = "0vmax";
                                labels[i].style.color = "white";
                                labels[i].style.paddingLeft = "0vmax";
                            }
                            inputs[i].onblur = function(){
                                labels[i].style.color = "#333";
                                labels[i].style.top = "1.6vmax";
                                labels[i].style.paddingLeft = "1vmax";

                    }}
// let inputs = document.getElementsByClassName("inputModal");
//                 let labelsForInputs = document.getElementsByClassName("labelModal");
//                 for (let i = 0; i < inputs.length; i++) {inputs[i].addEventListener("input", function () {inputs[i].style.paddingTop = "5%";
//                                                                                                             labelsForInputs[i].style.display = "block";
//                                                                                                             inputs[i].style.color = "black";} );}
</script>