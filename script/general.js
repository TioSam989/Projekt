function generatePass(){
        const codeChar = ["0","1","2","3","4","5","6","7","8","9", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t" ,"u", "v", "w", "x", "y","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
        var code = '';
        
        for (let index = 0; index < 5; index++) {
            
            var random = Math.floor(Math.random() * codeChar.length );
            code += `${codeChar[random]}`;
            
        }
        
        // console.log(code);
        document.getElementById('code').value = `${code}`;
        return code;
    
}

function loadPage(){
    setTimeout(function() {
        swal({
            title: "Wow!",
            text: "Message!",
            type: "success"
        }, function() {
            window.location = "https://google.com";
        });
    }, 1000);
}

function loadImage(file) {
    console.log("entrei na func")
    return new Promise((resolve) => {
        const reader = new FileReader();

        reader.onload = function () {
            setTimeout(function () {
                resolve(reader.result);
            }, 300);
        }
        reader.readAsDataURL(file);
    });
}

async function preview_image({ target: { files: [file] } }) {
    const img = document.getElementById("output_image");
    img.src = "https://media2.giphy.com/media/fzTKGYBpzSvEQ/giphy.gif?cid=ecf05e47ewwc0luw7quxom1og3mtg0i1rfk9uk7djqkvb1yk&rid=giphy.gif";
    const imageUrl = await loadImage(file);
    console.log("isso ocorre ANTES do then!!!")
    img.src = imageUrl;
}

function slideShowImagesBox(){

    var imgs = ['./images/10PE.jpg','./images/10PE.png','./images/10PP.jpg','./images/10PP.png','./images/10PP.png','./images/10PQ.jpg','./images/10PQ.jpg','./images/11PD.jpg','./images/11PI.jpg','./images/11PI.jpg','./images/11PP.jpg','./images/11PQ.jpg','./images/11PQ.png','./images/12PE.jpg','./images/12PI.jpg'];
    var last = imgs.length-1;
    document.getElementById("imgChanger").style.backgroundImage = `url('${imgs[last]}')`;
    var index = 0
    // setInterval(function(){
            setInterval(function(){
                if(index == imgs.length){
                    index = 0;
                }
                document.getElementById("imgChanger").style.backgroundImage = `url('${imgs[index]}')`;
                index++
            },3000)
        
    // }, 3000);
    
}

function sendMail(toMail, toNome, fromWho, msg, whereGoAfter){
    
    var tempParams = {
        to_email: toMail,
        to_name: toNome,
        from_name: fromWho,
        message: msg,
    };

    emailjs.send("contactus190","template_36h7o4r", tempParams)
        .then(function(res){
            console.log('sucess: ', res.status);
            window.location.href = `${whereGoAfter}`;
        })
}


function toHexa(num){
    for (var index = 0; index < num +1; index++) {
        var stringIndex = index.toString(16)
        console.log('pos: '+ index +' - num: '+ stringIndex );
    }
}
