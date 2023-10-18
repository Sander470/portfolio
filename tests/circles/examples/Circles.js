import { Circle } from "./Circle.js";

export class Circles {
    constructor(cWidth, cHeight) {
        this.cHeight = cHeight;
        this.cWidth = cWidth;

        this.circles = [];
    }

    addCircle(x, y, radius) {
        let cc = new Circle(this, x, y, radius);
        this.circles.push(cc);
    }

    drawCircles(ctx) {
        this.circles.forEach((circle) => {
            circle.draw(ctx);
        });
    }

    updateCircles() {
        this.circles.forEach((circle) => {
            circle.update();
        });
    }
}
