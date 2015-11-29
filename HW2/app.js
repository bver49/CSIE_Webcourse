var num = 1;
var timer;

function view(x) {
    var preview = document.getElementById("big");
    if (x.className == "preview") {
        preview.src = x.src;
        preview.style.display = "block";

    } else {
        preview.style.display = "none";

    }

}

function next() {
    event.preventDefault();
    num = num + 1;
    if (num == 22) {
        num = 1;
    }
    document.pic.src = "img/" + num + ".jpg";
    fixedbar(num);

};

function prev() {
    event.preventDefault();
    num = num - 1;
    if (num == 0) {
        num = 21;
    }
    document.pic.src = "img/" + num + ".jpg";
    fixedbar(num);
};


function slideshow() {
    event.preventDefault();
    document.getElementById("start").style.display = "none";
    document.getElementById("prev").style.display = "none";
    document.getElementById("next").style.display = "none";
    document.getElementById("stop").style.display = "inline-block";
    var second = document.getElementById("second").value;
    timer = window.setInterval(function() {
        num = num + 1;
        if (num == 22) {
            num = 1;
        }
        fixedbar(num);
        document.pic.src = "img/" + num + ".jpg";
    }, second);
};

function slidestop() {
    event.preventDefault();
    document.getElementById("start").style.display = "inline-block";
    document.getElementById("prev").style.display = "inline-block";
    document.getElementById("next").style.display = "inline-block";
    document.getElementById("stop").style.display = "none";
    window.clearInterval(timer);
};


function showpic(x) {
    var pic = document.getElementById("show");
    var choose = x.src;
    pic.src = choose;
    var id = parseInt(x.id) + num - 1;
    if (id >= 22) {
        id = id - 21;
    }
    num = id;
    fixedbar(id);
};


function backimg() {
    event.preventDefault();
    var pic = document.getElementById("show");
    var file = pic.src;
    document.getElementById("main").style.backgroundImage = "url('" + file + "')";
}

function delbackimg() {
    event.preventDefault();
    document.getElementById("main").style.backgroundImage = "";
}

function down() {

    var a = document.createElement('a');
    a.href = "img/" + num + ".jpg";
    a.download = num;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
}

function fixedbar(startnum) {
    var start = startnum;
    var bar = document.getElementsByClassName("choose");
    for (i in bar) {
        bar[i].src = "img/" + start + ".jpg";
        start++;
        if (start == 22) {
            start = 1;
        }
    }

};


function player() {
    var music = 2;
    var audio = document.getElementById("player");
    audio.addEventListener("ended", function() {
        audio.src = "res/" + music + ".mp3";
        music++;
        if (music > 3) {
            music = 1;
        }
        audio.play();
    });
}