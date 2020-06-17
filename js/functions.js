let getData = function(){boxDimension();};

function boxDimension (){
    console.log("Entro a la funcion");
    const divide = 5000;
    let intWidth = document.getElementById("widthContent").value;
    let intHeight = document.getElementById("heightContent").value;
    let intDepth = document.getElementById("depthContent").value;

    if(intWidth == ""){
        document.getElementById("widthContent").focus();
    }else{
        if(intHeight == ""){
            document.getElementById("heightContent").focus();
        }else{
            if(intDepth == ""){
                document.getElementById("depthContent").focus();
            }else{
                let result = (intWidth * intHeight * intDepth) / 5000;
                console.log(intWidth + " " + intHeight + " " + intDepth);
                document.getElementById("result").innerHTML;
                document.getElementById("result").innerHTML = result + " Soles";
                document.getElementById("widthContent").value = "";
                document.getElementById("heightContent").value = "";
                document.getElementById("depthContent").value = "";
                
                console.log("Finalizo: " + result); 

            }
        }
    }   
}
//isNaN funcion si es numerico? 