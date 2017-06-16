/*
 Global variables
 */
var clicked; // The ball that is been clicked
var dragged; // The ball that is been dragged
var ballsList = document.getElementsByClassName('ball'); // All the elements with class='ball'
var gapsList = document.getElementsByClassName('gap'); // All the elements with class="gap"
var neighbourGaps; // The immediate gap neighbours of clicked & dragged
var gap; // Gap element
var time = -1; // Game timer: blank is limitless
var score = 0; // Scoring sums +15 points when moving
var displayTime; // #display-time element
var displayScore; // #display-score element
var countDown; // Count Down Interval
var possiblePositions = ['pos-1-3', 'pos-1-4', 'pos-1-5',
                        'pos-2-3', 'pos-2-4', 'pos-2-5',
                        'pos-3-1', 'pos-3-2', 'pos-3-3', 'pos-3-4', 'pos-3-5', 'pos-3-6', 'pos-3-7',
                        'pos-4-1', 'pos-4-2', 'pos-4-3', 'pos-4-4', 'pos-4-5', 'pos-4-6', 'pos-4-7',
                        'pos-5-1', 'pos-5-2', 'pos-5-3', 'pos-5-4', 'pos-5-5', 'pos-5-6', 'pos-5-7',
                        'pos-6-3', 'pos-6-4', 'pos-6-5',
                        'pos-7-3', 'pos-7-4', 'pos-7-5'];

// function chooseOptions() {
//     /*
//      Display the options section for choosing Gap position & Time
//      */
//     document.getElementById('welcome').style.display = 'none';
//     document.getElementById('play-options').style.display = 'flex';
// }

function createBoard() {

    document.getElementById('saveGameBtn').innerHTML = '<button type="button" class="btn btn-primary" onclick="saveGame()">Save Game</button>';

    /*
     Creates the board structure
     */
    // Retrieve the options from chooseOptions()
    if(document.getElementById('default-gap').checked == true) {
        gap = document.getElementById('default-gap').value;
    } else if(document.getElementById('random-gap').checked == true) {
        var randomNumber = Math.floor((Math.random() * 32) + 0);
        gap = possiblePositions[randomNumber];
    }

    if(document.getElementById('timer-option').value != "") {
        time = document.getElementById('timer-option').value;
    } else {
        time = 'Timeless';
    }

    var board = document.getElementById('board');
    var html = "";
    var id = "";

    // Building the board
    for (var row = 1; row <= 7; row++) {
        html += "<ul class='rowUl'>"
        for (var column = 1; column <= 7; column++) {
            id = "pos-" + row + "-" + column;

            switch (true) {
                case (row == 1 || row == 2 || row == 6 || row == 7) && (column == 1 || column == 2 || column == 6 || column == 7):
                    html += "<li id=" + id + " class='cell'></li>";
                    break;
                default:
                    html += "<li id=" + id + " class='cell ball' draggable='true' onclick='showPossibleMoves(this);'></li>";
                    break;
            }

        }
        html += "</ul>";
    }

    board.innerHTML = html;
    document.getElementById(gap).className = 'cell gap';
    displayTime = document.getElementById('display-time');
    displayScore = document.getElementById('display-score');
    countDown = setInterval(countDown, 1000);
    displayTime.innerHTML = time;
    ballsList = document.getElementsByClassName('ball');
    gapsList  = document.getElementsByClassName('gap');

    if (ballsList.length < 2) {
        document.getElementById('mainBoard').style.display = 'none';
        document.getElementById('mainMsg').style.display = 'block';
        document.getElementById('mainScore').innerHTML = score;
        document.getElementById('mainTime').innerHTML = time;
    }
}

function countDown() {
    if (time >= 0) {
        displayTime = document.getElementById('display-time').innerHTML = time--;
    } else if (time < 0){
        clearInterval(countDown);
        if (ballsList.length === 1) {
            score += 150;
        } else {
            score -= ballsList.length * 50;
        }

        alert('Time is over. Your puntuation is: ' + score);
        if(confirm('Go to the main page?')) {
            window.location.reload(false);
        } else {
            document.getElementById('play-container').style.display = 'none';
            document.getElementById('credits').style.display = 'block';
        }
    }
}

function getPossibleMoves(cell) {
    /*
     Feeds neighbourGaps array with possible movements for the ball
     Fired by:
     - onclick event: showPossibleMoves(this)
     - ondrop event: drop(event)
     */
    var row = parseInt(cell.id.slice(4, 5)); // Cell's row
    var column = parseInt(cell.id.slice(6, 7)); // Cell's column

    // If the nearest neighbour to cell is a ball and next to it is a gap, save it to neighbourGaps
    var upBall = "pos-" + parseInt(row - 1) + "-" + column;
    var downBall = "pos-" + parseInt(row + 1) + "-" + column;
    var rightBall = "pos-" + row + "-" + parseInt(column + 1);
    var leftBall = "pos-" + row + "-" + parseInt(column - 1);

    var upGap = "pos-" + parseInt(row - 2) + "-" + column;
    var downGap = "pos-" + parseInt(row + 2) + "-" + column;
    var rightGap = "pos-" + row + "-" + parseInt(column + 2);
    var leftGap = "pos-" + row + "-" + parseInt(column - 2);

    for(var i = 0; i < ballsList.length; i++) {
        for(var j = 0; j < gapsList.length; j++) {
            if(upBall == ballsList[i].id && upGap == gapsList[j].id) {
                neighbourGaps.push(upGap);
            } else if(downBall == ballsList[i].id && downGap == gapsList[j].id) {
                neighbourGaps.push(downGap);
            } else if(rightBall == ballsList[i].id && rightGap == gapsList[j].id) {
                neighbourGaps.push(rightGap);
            } else if(leftBall == ballsList[i].id && leftGap == gapsList[j].id) {
                neighbourGaps.push(leftGap);
            }
        }
    }
}

function showPossibleMoves(cell) {
    /*
     - Shows possible moves related to the element (ball) that fires the event.
     - Possible moves depend on the target event position; must be: className='gap' && position + 2
     - When clicking in other ball, the previous style must be cleared up.
     */
    if(cell.className == 'cell ball') {
        // If is not the first click
        if(neighbourGaps != undefined && clicked != undefined) {
            for(var i = 0; i < neighbourGaps.length; i++) {
                if( document.getElementById(neighbourGaps[i]).className == 'cell gap') {
                    document.getElementById(neighbourGaps[i]).style.border = '5px solid #F1D67F';
                } else {
                    document.getElementById(neighbourGaps[i]).style.border = 0;
                }
            }
            var popped = clicked.pop();
            if(popped.className == 'cell gap') {
                popped.style.border = '5px solid #F1D67F';
            } else if(popped.className == 'cell ball') {
                popped.style.border = 0;
            } else if(document.getElementById(dragged).className == 'cell ball') {
                document.getElementById(dragged).style.border = 0;
            }
        }

        neighbourGaps = [];
        clicked = [];
        clicked.push(cell);

        getPossibleMoves(cell);

        // Giving borders for the clicked ball and the neighbour gaps
        for(var i = 0; i < neighbourGaps.length; i++) {
            if(document.getElementById(neighbourGaps[i]).className == 'cell gap') {
                document.getElementById(neighbourGaps[i]).style.border = '5px solid #21B180';
            }
        }

        if(cell.className != 'cell gap' ) {
            cell.style.border = '5px solid gray';
        }
    }
}

document.addEventListener("drag", function (event) {
}, false);

document.addEventListener("dragstart", function (event) {
    if(event.target.className != 'cell gap') {
        dragged = event.target.id;
        neighbourGaps = [];
        getPossibleMoves(event.target);
        event.target.style.border = 0;
    }
    event.dataTransfer.setData('Text', this.id);
}, false);

document.addEventListener("dragend", function (event) {
}, false);

document.addEventListener("dragover", function (event) {
    // prevent default to allow drop
    event.preventDefault();
}, false);

document.addEventListener("dragenter", function (event) {
}, false);

document.addEventListener("dragleave", function (event) {
}, false);

document.addEventListener("drop", function (event) {
    // prevent default action (open as link for some elements)
    if(event.preventDefault) { event.preventDefault(); }
    if(event.stopPropagation) { event.stopPropagation(); }

    var dropRow = parseInt(event.target.id.slice(4, 5));
    var dropColumn = parseInt(event.target.id.slice(6, 7));

    var dragRow = parseInt(dragged.slice(4, 5));
    var dragColumn = parseInt(dragged.slice(6, 7));

    var row = dropRow - dragRow;
    var column = dropColumn - dragColumn
    var id;

    for(var i = 0; i < neighbourGaps.length; i++) {
        if(event.target.id == neighbourGaps[i]) {
            // The gap converts to a ball
            event.target.style.cssText = null;
            event.target.className = 'cell ball';
            event.target.style.border = '0';
            event.target.style.background = "url('http://127.0.0.1:8000/images/ball.svg') center";
            event.target.style.backgroundSize = '6vh';
            event.target.style.backgroundRepeat = 'no-repeat';
            document.getElementById(neighbourGaps[i]).setAttribute('draggable', true);
            event.target.addEventListener('click', function(){ showPossibleMoves(this) });

            // The dragged ball converts to a gap
            document.getElementById(dragged).style.cssText = null;
            document.getElementById(dragged).className = 'cell gap';
            document.getElementById(dragged).style.border = '5px solid #F1D67F';
            document.getElementById(dragged).style.background = '#D8BF7D';
            document.getElementById(dragged).style.backgroundSize = '0';
            document.getElementById(dragged).style.backgroundRepeat = 'no-repeat';
            document.getElementById(dragged).removeEventListener('click', showPossibleMoves);

            // The ball in the middle gets eaten.
            switch(true) {
                case row === -2 && column === 0:
                    id = "pos-" + parseInt(dragRow - 1) + "-" + parseInt(dragColumn);
                    document.getElementById(id).className = 'cell gap';
                    document.getElementById(id).style.border = '5px solid #F1D67F';
                    document.getElementById(id).style.background = '#D8BF7D';
                    document.getElementById(id).removeEventListener('click', showPossibleMoves);
                    break;
                case row === 2 && column === 0:
                    id = "pos-" + parseInt(dragRow + 1) + "-" + parseInt(dragColumn);
                    document.getElementById(id).className = 'cell gap';
                    document.getElementById(id).style.border = '5px solid #F1D67F';
                    document.getElementById(id).style.background = '#D8BF7D';
                    document.getElementById(id).removeEventListener('click', showPossibleMoves);
                    break;
                case row === 0 && column === -2:
                    id = "pos-" + parseInt(dragRow) + "-" + parseInt(dragColumn - 1);
                    document.getElementById(id).className = 'cell gap';
                    document.getElementById(id).style.border = '5px solid #F1D67F';
                    document.getElementById(id).style.background = '#D8BF7D';
                    document.getElementById(id).removeEventListener('click', showPossibleMoves);
                    break;
                case row === 0 && column === 2:
                    id = "pos-" + parseInt(dragRow) + "-" + parseInt(dragColumn + 1);
                    document.getElementById(id).className = 'cell gap';
                    document.getElementById(id).style.border = '5px solid #F1D67F';
                    document.getElementById(id).style.background = '#D8BF7D';
                    document.getElementById(id).removeEventListener('click', showPossibleMoves);
                    break;
            }
            // If the movement is correct, sum +15 to score.
            score += 15;
            if (document.getElementById('display-score') !== null) {
                document.getElementById('display-score').innerHTML = score;
            } else {
                document.getElementById('display-score-place').innerHTML = score;
            }
        }
    }

    // If there is a previous click, remove the border style and add default border to the dragged ball.
    if(clicked !== undefined ) {
        document.getElementById(clicked[0].id).style.border = 0;
        document.getElementById(dragged).style.border = '5px solid #F1D67F';
        // Also, give the default border to all the gaps.
        for(var i = 0; i < gapsList.length; i++) {
            document.getElementById(gapsList[i].id).style.border = '5px solid #F1D67F';
        }
    }

    if (ballsList.length < 2) {
        document.getElementById('mainBoard').style.display = 'none';
        document.getElementById('mainMsg').style.display = 'block';
        document.getElementById('mainScore').innerHTML = score;
        document.getElementById('mainTime').innerHTML = time;
    }

}, false);