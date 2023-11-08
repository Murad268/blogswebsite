function chandeMode() {
	const mode = document.querySelector('.navbar__last__mode__switch')
	const circle = document.querySelector('.navbar__last__mode__switch__circle')
	mode.addEventListener('click', () => {
		mode.classList.toggle('active')
		circle.classList.toggle('active')
	})
}
function toggleNavbar() {
   const hamburger = document.querySelector('.navbar__hamburger');
   const navbar__center = document.querySelector('.navbar__center')
   hamburger.addEventListener('click', () => {
      hamburger.classList.toggle('active')
      navbar__center.classList.toggle('active')
   })
}




chandeMode()
toggleNavbar()
