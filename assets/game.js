var myGamePiece;
var myBackground;
var myObstacles = [];
var myScore;

function key() {
  var text = event.key;
  if (text === "w" || text === "ArrowUp") {
    myGamePiece.speedY = -2;
  } else if (text === "s" || text === "ArrowDown") {
    myGamePiece.speedY = +2;
  } else if (text === "d" || text === "ArrowRight") {
    myGamePiece.speedX = +2;
  } else if (text === "a" || text === "ArrowLeft") {
    myGamePiece.speedX = -2;
  } else {
    myGamePiece.speedX = 0;
    myGamePiece.speedY = 0;
  }
}

function key2() {
  var text = event.key;
  if (text === "w" || text === "ArrowUp") {
    myGamePiece.speedY = 0;
  } else if (text === "s" || text === "ArrowDown") {
    myGamePiece.speedY = 0;
  } else if (text === "d" || text === "ArrowRight") {
    myGamePiece.speedX = 0;
  } else if (text === "a" || text === "ArrowLeft") {
    myGamePiece.speedX = 0;
  }
}

function startGame() {
    var colourss = document.getElementById('warna').value;
    var useres = document.getElementById('nama');
    useres.style.color = colourss;
    document.getElementById('container1').remove();
  myGamePiece = new component(30, 30, colourss, 10, 120);
  myBackground = new component(750, 420, "assets/bege.jpg", 0, 0, "background");
  myScore = new component("20px", "arial", "black", 520, 25, "text");
  myObstacles = [];
  myGameArea.start();
}


var myGameArea = {
  canvas: document.createElement("canvas"),
  start: function () {
    this.canvas.width = 700;
    this.canvas.height = 400;
    this.context = this.canvas.getContext("2d");
    document.body.insertBefore(this.canvas, document.body
      .childNodes[0]);
    this.frameNo = 0;
    this.interval = setInterval(updateGameArea, 20);
  },
  clear: function () {
    this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
  },
  stop: function () {
    clearInterval(this.interval);
    let restart = document.getElementById('ulang');
    let exit = document.getElementById('keluar');
     restart.removeAttribute('style');
     exit.removeAttribute('style');
  }
}

function component(width, height, color, x, y, type) {
  this.type = type;
  if (type == "image" || type == "background") {
    this.image = new Image();
    this.image.src = color;
  }
  this.width = width;
  this.height = height;
  this.speedX = 0;
  this.speedY = 0;
  this.x = x;
  this.y = y;
  this.update = function () {
    ctx = myGameArea.context;
    if (this.type == "text") {
      ctx.font = this.width + " " + this.height;
      ctx.fillStyle = color;
      ctx.fillText(this.text, this.x, this.y);
    }
    if (type == "image" || type == "background") {
      ctx.drawImage(this.image,
        this.x,
        this.y,
        this.width, this.height);
      if (type == "background") {
        ctx.drawImage(this.image, this.x + this.width, this.y, this.width, this.height);
      }
    } else {
      ctx.fillStyle = color;
      ctx.fillRect(this.x, this.y, this.width, this.height);
    }
  }
  this.newPos = function () {
    this.x += this.speedX;
    this.y += this.speedY;
    if (this.type == "background") {
      if (this.x == -(this.width)) {
        this.x = 0;
      }
    }
  }
  this.crashWith = function (otherobj) {
    var myleft = this.x;
    var myright = this.x + (this.width);
    var mytop = this.y;
    var mybottom = this.y + (this.height);
    var otherleft = otherobj.x;
    var otherright = otherobj.x + (otherobj.width);
    var othertop = otherobj.y;
    var otherbottom = otherobj.y + (otherobj.height);
    var crash = true;
    if ((mybottom < othertop) || (mytop > otherbottom) || (myright < otherleft) || (myleft > otherright)) {
      crash = false;
    }
    return crash;
  }
}

function updateGameArea() {
  var x, height, gap, minHeight, maxHeight, minGap, maxGap;
  for (i = 0; i < myObstacles.length; i += 1) {
    if (myGamePiece.crashWith(myObstacles[i])) {
      myGameArea.stop();
      return;
    }
  }
  myGameArea.clear();
  myGameArea.frameNo += 1;
  myBackground.speedX = -1;
  myBackground.newPos();
  myBackground.update();
  if (myGameArea.frameNo == 1 || everyinterval(150)) {
    x = myGameArea.canvas.width;
    minHeight = 20;
    maxHeight = 200;
    height = Math.floor(Math.random() * (maxHeight - minHeight + 1) + minHeight);
    minGap = 50;
    maxGap = 200;
    gap = Math.floor(Math.random() * (maxGap - minGap + 1) + minGap);
    myObstacles.push(new component(20, height, "green", x, 0));
    myObstacles.push(new component(20, x - height - gap, "green", x, height + gap));
  }
  for (i = 0; i < myObstacles.length; i += 1) {
    myObstacles[i].speedX = -2;
    myObstacles[i].newPos();
    myObstacles[i].update();
  }
  myScore.text = "SCORE: " + myGameArea.frameNo;
  myScore.update();
  myGamePiece.newPos();
  myGamePiece.update();
}

function everyinterval(n) {
  if ((myGameArea.frameNo / n) % 1 == 0) {
    return true;
  }
  return false;
}

function exit() {
  window.location.reload();
}

var btnulng= document.getElementById('ulang');
var btnkluar = document.getElementById('keluar');
var content =document.getElementById('container1');

function ulang(){
    document.body.append(content);
    myGameArea.stop();
    myGameArea.clear();
    startGame();
    btnkluar.style="display:none;";
    btnulng.style="display:none;";
}