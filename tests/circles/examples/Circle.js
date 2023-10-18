import { Circles } from "./Circles.js";

export class Circle {
    constructor(circles, x, y, radius) {
        this.circles = circles;
        this.cHeight = circles.cHeight;
        this.cWidth = circles.cWidth;
        this.radius = radius;
        this.rangeX = this.cWidth - this.radius * 2;
        this.rangeY = this.cHeight - this.radius * 2;
        this.x = this.radius + Math.random() * this.rangeX;
        this.y = this.radius + Math.random() * this.rangeY;
        this.vx = Math.random() * 2;
        this.vy = Math.random() * 2;

        // this.circles = [];
        console.log(this.cWidth, this.rangeX, this.radius);
    }

    draw(ctx) {

        ctx.beginPath();
        ctx.strokeStyle = "green";
        ctx.fillStyle = "green";
        ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
        ctx.fill();
        ctx.stroke();
    }

    update() {
        this.x += this.vx;
        this.y += this.vy;
        this.physics();
        this.noOverlap();
    }

    physics() {
        if (this.radius + this.x > this.cWidth) this.vx = 0 - this.vx;
        if (this.x - this.radius < 0) this.vx = 0 - this.vx;
        if (this.y + this.radius > this.cHeight) this.vy = 0 - this.vy;
        if (this.y - this.radius < 0) this.vy = 0 - this.vy;

        this.x += this.vx;
        this.y += this.vy;
    }

    noOverlap() {

    }
}
