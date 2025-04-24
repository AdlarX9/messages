const chats = document.querySelector('.chats-navbar');
const showConv = document.querySelector('.show-conv');
const showMessages = document.querySelector('.show-messages');

showMessages.scrollTop = showMessages.scrollHeight;

let isMouseDown = false;
let chatsRect = chats.getBoundingClientRect();
let margin = chatsRect.left;
let largeur = margin + chatsRect.width;

function mouseDown(e) {
	if (
		isMouseDown === false &&
		e.clientX < largeur + margin * 2 &&
		e.clientX > largeur - margin * 2
	) isMouseDown = true;
};

function mouseUp() {
	isMouseDown = false;
};

function defineChats(e) {
	const x = e.clientX;
	if (isMouseDown === true) {
		chatsRect = chats.getBoundingClientRect();
		largeur = x
		document.body.style.setProperty('--largeur', largeur + 'px');
	}

	if (x > chatsRect.right && x < chatsRect.right + margin || isMouseDown === true) document.body.style.cursor = 'ew-resize';
	else document.body.style.cursor = 'auto';
};

function initializeVariables() {
	chatsRect = chats.getBoundingClientRect();
	if (window.innerWidth > 600) {
		document.body.style.setProperty('--largeur', 30 + 'vw');
		document.body.style.setProperty('--hauteur', 80 + 'px');
		window.addEventListener('mousedown', mouseDown);
		window.addEventListener('mouseup', mouseUp);
		window.addEventListener('mousemove', defineChats);
	}
	else {
		document.body.style.setProperty('--largeur', 0 + 'px');
	}
	if (chatsRect.width !== 0 && window.innerWidth <= 600) {
		showConv.style.display = 'flex';
	}
}

window.addEventListener('resize', initializeVariables);
window.addEventListener('orientationchange', initializeVariables);
window.addEventListener('DOMContentLoaded', initializeVariables);


showConv.onclick = () => {
	if (document.querySelector('.chat-remplissage').getBoundingClientRect().width === 0) {
		document.body.style.setProperty('--largeur', window.innerWidth - margin + 'px');
		document.body.style.setProperty('--hauteur', 0);
		showConv.style.display = 'none';
	}
};