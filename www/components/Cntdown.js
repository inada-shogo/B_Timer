function onedigit(i) {
    return ("" + i).slice(-1);
}

// (6) Function to obtain the tenth number
function tendigit(i) {
    var str = "0" + i;
    return str.slice(-2, str.length - 1);
}

// (2) Function that is called every second
function clock() {
    // (3) Obtain "figure" class(image of the number)
    var figures = document.getElementsByClassName('figure');
    // (4) Obtain the "date" ID (Date display area)
    var date = document.getElementById('date');

    // (5) Obtain the current time
    var now = new Date();

    // (7) Set the digits for the minutes
    figures[0].src = 'images/' + tendigit(now.getMinutes()) + '.png';
    figures[1].src = 'images/' + onedigit(now.getMinutes()) + '.png';

    // (7) Set the digits for the seconds
    figures[2].src = 'images/' + tendigit(now.getSeconds()) + '.png';
    figures[3].src = 'images/' + onedigit(now.getSeconds()) + '.png';

}

// (1) Program that is executed when the app is started
setInterval(clock, 1000);