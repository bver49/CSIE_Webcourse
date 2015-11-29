/* 設置變數 */
var totalphoto=21;      //相片總數
var totalmusic=3;      //音樂總數
var pos = 5;              //第一張照片由左至右數過來的位置


/*  固定參數  */
var fixpos=pos-1;
var num = 1;                             //第一張照片編號
var setfirst=totalphoto-fixpos+1;        //最左邊開始的照片編號
var timer;


function setid(){
     document.pic.src="img/" + num + ".jpg";
    var barpic = document.getElementsByClassName("choose");
    for(i in barpic){
        if(setfirst == num){
            barpic[i].className+=" active";
        }
        barpic[i].id=setfirst;
        barpic[i].src="img/" + setfirst + ".jpg";
        setfirst++;
        if (setfirst>totalphoto) {
            setfirst=1;
        };
    }
}

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
    if (num > totalphoto) {
        num = 1;
    }
    document.pic.src = "img/" + num + ".jpg";
    fixedbar(num);

};

function prev() {
    event.preventDefault();
    num = num - 1;
    if (num == 0) {
        num = totalphoto;
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
        if (num > totalphoto) {
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
    if (id > totalphoto ) {
        id = id - totalphoto;
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
    var start = startnum-fixpos;
    if(start<=0){
        start=start+totalphoto;
    }
    var bar = document.getElementsByClassName("choose");
    for (i in bar) {
        bar[i].src = "img/" + start + ".jpg";
        start++;
        if (start > totalphoto) {
            start = 1;
        }
    }

};


function player() {    
    var musicnum = 2;
    var audio = document.getElementById("player");
    audio.addEventListener("ended", function() {
        audio.src = "res/" + musicnum + ".mp3";
        musicnum++;
        if (musicnum > totalmusic) {
            musicnum = 1;
        }
        audio.play();
    });
}