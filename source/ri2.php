<?php include("header.php"); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.1/p5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.1/addons/p5.dom.min.js"></script>
  
<script>
    'use strict';



var centY;
var x = 0;
var y = 0;
var r = 50;
var theta = 0;

var x1 = 0;
var y1 = 0;
var r1 = 100;
var theta1 = 0;

function setup() {
    let canvas = createCanvas(600, 300);
    canvas.parent('canvas');
    centY = height/2;
    background(230);
    strokeWeight(1);
    stroke(255);
    line(0, 150, 600, 150);
    drawCurve();
}

function drawCurve() {
    for (var i=0; i<width; i++) {
    strokeWeight(2);
    stroke(0);
    x++;
    y = centY+r*sin(radians(theta));
    theta+=1;
    point(x, y);
    }

    for (var i=0; i<width; i++) {
    strokeWeight(2);
    stroke(0);
    x1++;
    y1 = centY+r1*cos(radians(theta1));
    theta1+=1;
    point(x1, y1);
    }
}
/*
function setup() {
    //createCanvas(400, 400);

    let canvas = createCanvas(400, 400);
    canvas.parent('canvas');
    noFill();

    buttonIncA = createButton("A UP");
    buttonIncA.parent('button');
    //buttonIncA.position(width - 50, height - 80);
    buttonIncA.mousePressed(function() { a++; });

    buttonDecA = createButton("A DOWN");
    buttonDecA.parent('button');
    //buttonDecA.position(width - 10, height - 80);
    buttonDecA.mousePressed(function() { a = Math.max(1, a-1); });

    buttonIncB = createButton("B UP");
    buttonIncB.parent('button');
    //buttonIncB.position(width - 50, height - 50);
    buttonIncB.mousePressed(function() { b++; });

    buttonDecB = createButton("B DOWN");
    buttonDecB.parent('button');
    //buttonDecB.position(width - 10, height - 50);
    buttonDecB.mousePressed(function() { b = Math.max(1, b-1); });

    slider = createSlider(0, 360);
    slider.parent('button');

    //slider.position(width - 50, height - 20);

}

function draw() {    
    background(255);
    translate(width/2, height/2);

    // XY 軸
    stroke(188, 188, 188);
    line(-width, 0, width, 0);
    line(0, -height, 0, height);

    // 曲線上を移動する円
    var delta = slider.value();
    var t = frameCount * 0.03;
    var r = 100;
    stroke(0);
    ellipse( r * sin(a * t),
            -r * sin(b * t + radians(delta)),
            10,
            10);              

    // 曲線
    for (var i = 0; i < 360; i++) {
        var x1 = r * sin(a * radians(i));
        var y1 = r * sin(b * radians(i) + radians(delta));

        var x2 = r * sin(a * radians(i+1));
        var y2 = r * sin(b * radians(i+1) + radians(delta));
        line(x1, -y1, x2, -y2);
    }

    text("a: " + a, width/2 - 90, height/2 - 65);
    text("b: " + b, width/2 - 90, height/2 - 35);
    text("delta: " + delta, width/2 - 120, height/2 - 5);
}
*/
</script>

<h2>sinカーブ</h2>
<div id="canvas"></div>
<div id="button"></div>

<?php include("footer.php"); ?>