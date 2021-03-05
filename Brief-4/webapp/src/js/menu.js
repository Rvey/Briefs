window.onload = () => {
	const menuClosed = document.querySelector('.menu-closed')
	const menu = document.querySelector('.links')

	menuClosed.onclick = () => {
		menu.classList.toggle('links-active')

		if (Array.from(menu.classList).includes('links-active')) {
			menuClosed.src = "./src/img/menu_open_white_24dp.svg"
		} else {
			menuClosed.src = "./src/img/menu_white_24dp.svg"
		}
	}

}
