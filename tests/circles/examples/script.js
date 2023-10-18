import { Circle } from "./Circle.js";
import { Circles } from "./Circles.js";

window.addEventListener('load', function () {



    const canvas = document.querySelector("canvas");
    const ctx = canvas.getContext("2d");

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    let cc = new Circles(canvas.width, canvas.height);
    
    for (let i = 0; i < 15; i++) {
        cc.addCircle(20, 20, 100);
    };
    cc.drawCircles(ctx);


    move();
    function move() {
        requestAnimationFrame(move);
    
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        cc.drawCircles(ctx);
        cc.updateCircles();
    }

});
