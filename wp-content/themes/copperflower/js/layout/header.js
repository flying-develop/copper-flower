class Header {
	constructor()	{
		this.init();
	}
	
	init() {
		
		document.querySelector('header .menu-btn').addEventListener('click', () => {
			if (document.documentElement.classList.contains('menu-open')) {
				document.documentElement.classList.remove('menu-open');
				window.Utils.documentUnFixed();
			} else {
				document.documentElement.classList.add('menu-open');
				window.Utils.documentFixed(document.getElementById('navigation'));
			}
		}, {passive: false});

		['resize', 'orientationchange'].forEach(event => {
			window.addEventListener(event, () => {
				if (window.matchMedia('screen and (min-width: 1024px)').matches && document.documentElement.classList.contains('menu-open')) {
					document.documentElement.classList.remove('menu-open');
					window.Utils.documentUnFixed();
				}
			}, {passive: true});
		});

	}
}

export default Header;