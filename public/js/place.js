var emptyHtml;
var emptyBoard;

emptyBoard = document.getElementById('empty-board');
emptyHtml = "";
var id = "";

var placedBall = false; // Tells if a ball has been placed on the empty board.

// Building the board
for (var row = 1; row <= 7; row++) {
    emptyHtml += "<ul class='rowUl'>";
    for (var column = 1; column <= 7; column++) {
        id = "pos-" + row + "-" + column;

        switch (true) {
            case (row === 1 || row === 2 || row === 6 || row === 7) && (column === 1 || column === 2 || column === 6 || column === 7):
                emptyHtml += "<li id=" + id + " class='cell'></li>";
                break;
            default:
                emptyHtml += "<li id=" + id + " class='cell gap'></li>";
                break;
        }

    }
    emptyHtml += "</ul>";
}

emptyBoard.innerHTML = emptyHtml;
document.addEventListener('click', placeBall);

function placeBall(event) {
	/**
	 * [if description]
	 * @param  {[type]} document [description]
	 * @return {[type]}          [description]
	 */

    if(document.getElementById(event.target.id).className == 'cell gap') {
        var pos = document.getElementById(event.target.id);
        pos.className = 'cell ball';
    } else if(document.getElementById(event.target.id).className == 'cell ball') {
        var pos = document.getElementById(event.target.id);
        pos.className = 'cell gap';
    }

    emptyHtml = document.getElementById('empty-board');
    placedBall = true;

}

function startGame() {

    if (!placedBall) {
        alert('Place the balls before!');
        window.location.reload();
    }

    document.getElementById('saveGameBtn').innerHTML = '<button type="button" class="btn btn-primary" onclick="saveGame()">Save Game</button>';

    document.removeEventListener('click', placeBall);
    document.addEventListener('click', showPossibleMoves);

	/**
	 * [if description]
	 * @param  {[type]} document [description]
	 * @return {[type]}          [description]
	 */

    if(document.getElementById('place-timer-option').value != "") {
        time = document.getElementById('place-timer-option').value;
    } else {
        time = 'Timeless';
    }

    var html = "";
    var id = "";

    //document.getElementById('place-board').appendChild(emptyBoard);

    var ballPositions = document.getElementsByClassName('ball');

    for(var i = 0; i < ballPositions.length; i++) {
        document.getElementById(ballPositions[i].id).setAttribute('draggable', true);
        document.getElementById(ballPositions[i].id).addEventListener('click', function(){ showPossibleMoves(this) });
    }

    displayTime = document.getElementById('display-time-place');
    displayScore = document.getElementById('display-score-place');
	countDown = setInterval(placeCountDown, 1000);
    displayTime.appendChild(document.createTextNode(time));
    ballsList = document.getElementsByClassName('ball');
    gapsList  = document.getElementsByClassName('gap');

    if (ballsList.length < 2) {
        document.getElementById('mainBoard').style.display = 'none';
        document.getElementById('mainMsg').style.display = 'block';
        document.getElementById('mainScore').innerHTML = score;
        document.getElementById('mainTime').innerHTML = time;
    }
}

function placeCountDown() {
	if (time >= 0) {
		displayTime = document.getElementById('display-time-place').innerHTML = time--;
	} else if (time < 0){
		clearInterval(countDown);
		if (ballsList.length == 1) {
			score += 150;
		} else {
			score -= ballsList.length * 50;
		}

		alert('Time is over. Your puntuation is: ' + score);
		if(confirm('Go to the main page?')) {
			window.location.reload(false);
		} else {
			document.getElementById('place-container').style.display = 'none';
			document.getElementById('credits').style.display = 'flex';
		}
	}
}
