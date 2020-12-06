let getData = function(){boxDimension();};

function boxDimension (){
    console.log("Entro a la funcion");
    const divide = 5000;
    let intWidth = document.getElementById("widthContent").value;
    let intLong = document.getElementById("longContent").value;
    let intDepth = document.getElementById("depthContent").value;

    if(intWidth == ""){
        document.getElementById("widthContent").focus();
    }else{
        if(intLong == ""){
            document.getElementById("longContent").focus();
        }else{
            if(intDepth == ""){
                document.getElementById("depthContent").focus();
            }else{
                let result = Math.ceil((intWidth * intLong * intDepth) / 5000);
                console.log(intWidth + " " + intLong + " " + intDepth);
                document.getElementById("result").innerHTML;
                document.getElementById("result").innerHTML = result + " Kg";
                document.getElementById("widthContent").value = "";
                document.getElementById("longContent").value = "";
                document.getElementById("depthContent").value = "";
                
                console.log("!Finalizo: " + result); 

            }
        }
    }   
}
//isNaN funcion si es numerico? 