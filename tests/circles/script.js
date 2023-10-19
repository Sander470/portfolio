const canvas = document.getElementById("myCanvas");
const ctx = canvas.getContext('2d');
canvas.setAttribute("height", window.innerHeight);
canvas.setAttribute("width", window.innerWidth);

document.addEventListener("mousemove", (event) => {
    ctx.clearRect(0, 0, canvas.width, canvas.height)
    drawCircles(10);
})

// drawCircles(20);
// setInterval(drawCircles(5), 1000);

// (function(){
//     ctx.clearRect(0, 0, canvas.width, canvas.height)
//     drawCircles(10);

//     setTimeout(arguments.callee, 100);
// })();


// drawCircle(canvas.width * 0.5, canvas.height * 0.5, 100);
// drawCircle(0, 0, 100);


function drawCircle(x, y, radius, i) { //i is only there for debug
    ctx.beginPath();
    ctx.strokeStyle = "black";
    ctx.fillStyle = "black";
    ctx.arc(x, y, radius, 0, Math.PI * 2, true);
    ctx.stroke();
    ctx.fill();


    // debug code to see which circles are being generated
    ctx.font="50px monospace";
    ctx.fillStyle="white";
    ctx.fillText(i, x, y);
}

function drawCircles(amount) {
    for (i = 0; i < amount; i++) {
        let x = 0; let y = 0; 
        const radius = 50 + (Math.random() * 80);

        let rangeX = canvas.width - (radius * 2);
        x = radius + rangeX * Math.random();
        let rangeY = canvas.height - (radius * 2);
        y = radius + rangeY * Math.random();

        drawCircle(x, y, radius, i);
        console.log("drawn circle " + i);
    }
}

// let thing = Math.random() + 1;
// console.log(thing);
// console.log(window.innerHeight);
// console.log(Math.random() * window.innerHeight);