const plusElements = document.querySelectorAll('.plus');
const verticalElements = document.querySelectorAll('.vertical');
const horizontalElements = document.querySelectorAll('.horizontal');
const deroulantElements = document.querySelectorAll('.deroulant');
const plusLinkElements = document.querySelectorAll('.plus-link');

document.addEventListener('DOMContentLoaded', () => {
	deroulantElements.forEach((deroulant) => {
		deroulant.style.display = 'none';
	});
});

function showDeroulantMobile(e) {
	if (
		Array.from(plusElements).includes(e.target) ||
		Array.from(plusLinkElements).includes(e.target) ||
		Array.from(verticalElements).includes(e.target) ||
		Array.from(horizontalElements).includes(e.target)
	) {
		deroulantElements.forEach((deroulant) => {
			deroulant.style.display = 'flex';
		});
	} else {
		deroulantElements.forEach((deroulant) => {
			deroulant.style.display = 'none';
		});
	}
}

window.addEventListener('click', showDeroulantMobile);
window.addEventListener('touchstart', showDeroulantMobile);