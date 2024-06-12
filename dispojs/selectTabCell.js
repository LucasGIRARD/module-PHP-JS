var dragState = false;
var theTable = document.getElementById("dispoTable");

addEvent(window, 'mouseup', dragStop, false);
addEvent(window, 'mousedown', dragStart, false);
addEvent(theTable, 'mouseover', extend, false);

function dragStart(e) {
	if (e.target.localName == "td" && (e.target.className == "" || e.target.className == "selected")) {
		dragState = true;
		highlight(e.target);
	}
}
function extend(e) {
	if (dragState == true && e.target.localName == "td" && (e.target.className == "" || e.target.className == "selected")) {
		highlight(e.target);
	}
}
function dragStop() {
	dragState = false;
}

function highlight(td) {
	if (dragState) {
		currentCell = td.cellIndex;
		dragRow = td.parentNode.rowIndex;

		var row = theTable.getElementsByTagName("tr")[dragRow];
		if (row) {
			var cells = row.getElementsByTagName("td");
			var cell = cells[currentCell].getElementsByTagName("input")[0];

			if (cell.value == 1) {
				cells[currentCell].className = "";
				cell.value = "";
			} else {
				cells[currentCell].className = "selected";
				cell.value = 1;
			}
		}
	}
}

//cross-browser event handling for IE 5+, NS6+, Mozilla/Gecko
function addEvent(elm, evType, fn, useCapture) {
	if (elm.addEventListener) {
		elm.addEventListener(evType, fn, useCapture);
		return true;
	}
	else if (elm.attachEvent) {
		var r = elm.attachEvent('on' + evType, fn);
		return r;
	}
	else {
		elm['on' + evType] = fn;
		return true;
	}
}

//returns the object that received the event in a browser neutral manner
function getEventTarget(e) {
	if (window.event && window.event.srcElement) {
		return window.event.srcElement;
	}
	if (e && e.target) {
		return e.target;
	}
	return null
}