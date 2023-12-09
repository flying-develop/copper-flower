import { disableBodyScroll, enableBodyScroll, clearAllBodyScrollLocks } from 'body-scroll-lock';
import {detect as detectBrowser} from 'detect-browser';

class Utils {

	static isTouch() {
		return Boolean('ontouchstart' in window ||
			(window.DocumentTouch && document instanceof window.DocumentTouch) ||
			navigator.msMaxTouchPoints > 0 ||
			navigator.maxTouchPoints);
	}

	static detectFlexGap() {

		let flex = document.createElement('div');
		flex.style.display = 'flex';
		flex.style.flexDirection = 'column';
		flex.style.rowGap = '1px';

		flex.appendChild(document.createElement('div'));
		flex.appendChild(document.createElement('div'));

		document.body.appendChild(flex);
		const isSupported = flex.scrollHeight === 1;
		flex.parentNode.removeChild(flex);

		return isSupported;
	}


	static checkEnableJS() {
		document.documentElement.classList.remove('not-js');
	}

	static detectDevice() {
		const detect = detectBrowser(window.navigator.userAgent);

		if (detect.name) {
			document.documentElement.classList.add(detect.name);
		}
		if (detect.os) {
			const osname = detect.os.toLocaleLowerCase();

			document.documentElement.classList.add(osname.split(' ').join('-'));
		}
	}

	static documentFixed(element) {
			document.documentElement.classList.add('html-no-scrolled');
			disableBodyScroll(element, {reserveScrollBarGap: true, allowTouchMove: true, position: 'fixed'});
	}

	static documentUnFixed() {
			clearAllBodyScrollLocks();
			document.documentElement.classList.remove('html-no-scrolled');
	}

	static slideUp(target, duration= 500) {
			target.style.transitionProperty = 'height, margin, padding';
			target.style.transitionDuration = duration + 'ms';
			target.style.boxSizing = 'border-box';
			target.style.height = target.offsetHeight + 'px';
			target.offsetHeight;
			target.style.overflow = 'hidden';
			target.style.height = 0;
			target.style.paddingTop = 0;
			target.style.paddingBottom = 0;
			target.style.marginTop = 0;
			target.style.marginBottom = 0;
			window.setTimeout( () => {
					target.style.display = 'none';
					target.style.removeProperty('height');
					target.style.removeProperty('padding-top');
					target.style.removeProperty('padding-bottom');
					target.style.removeProperty('margin-top');
					target.style.removeProperty('margin-bottom');
					target.style.removeProperty('overflow');
					target.style.removeProperty('transition-duration');
					target.style.removeProperty('transition-property');
					//alert("!");
			}, duration);
	}

	static slideDown(target, duration= 500) {
			target.style.removeProperty('display');
			let display = window.getComputedStyle(target).display;

			if (display === 'none')
					display = 'block';

			target.style.display = display;
			let height = target.offsetHeight;
			target.style.overflow = 'hidden';
			target.style.height = 0;
			target.style.paddingTop = 0;
			target.style.paddingBottom = 0;
			target.style.marginTop = 0;
			target.style.marginBottom = 0;
			target.offsetHeight;
			target.style.boxSizing = 'border-box';
			target.style.transitionProperty = "height, margin, padding";
			target.style.transitionDuration = duration + 'ms';
			target.style.height = height + 'px';
			target.style.removeProperty('padding-top');
			target.style.removeProperty('padding-bottom');
			target.style.removeProperty('margin-top');
			target.style.removeProperty('margin-bottom');
			window.setTimeout( () => {
					target.style.removeProperty('height');
					target.style.removeProperty('overflow');
					target.style.removeProperty('transition-duration');
					target.style.removeProperty('transition-property');
			}, duration);
	}

	static getScrollTop() {
			return (window.pageYOffset || document.scrollTop) - (document.clientTop || 0) || 0;
	}

	static numberToDigit(value) {
			return Number(value).toLocaleString('ru-RU');
	}

	static debounce(func, timeout = 300) {
			let timer = null;

			return (...args) => {
					clearTimeout(timer);
					timer = setTimeout(() => {
							func.apply(this, args);
					}, timeout);
			};
	}

	static throttle(fun, time) {
			let lastCall = null;

			return (args) => {

					const previousCall = lastCall;

					lastCall = Date.now();

					if (previousCall === undefined || (lastCall - previousCall) > time) {
							fun(args);
					}
			};
	}

	static getWindowWidth() {
			return Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
	}

	static getWindowHeight() {
			return Math.max(document.documentElement.clientHeight, window.innerHeight || 0)
	}

	static scrollWidth() {
			let div = document.createElement('div');
			div.classList.add('scroll-check');
			div.style.overflowY = 'scroll';
			div.style.width = '50px';
			div.style.height = '50px';
			div.style.visibility = 'hidden';
			document.body.appendChild(div);
			let scrollWidth = div.offsetWidth - div.clientWidth;
			document.body.removeChild(div);
			document.documentElement.style.setProperty('--scrollWidth', scrollWidth + 'px');
	}

	static formDataLog(formData) {
			const newData = {};

			for (const pair of formData.entries()) {
					if (!newData[pair[0]]) {
							newData[pair[0]] = [];
					}

					newData[pair[0]] = pair[1];
			}

			// eslint-disable-next-line no-console
			console.table(newData);

			const object = {};
			formData.forEach((value, key) => object[key] = value);
			console.log(object);
	}

	static declOfNum(number, words) {
			number = Math.abs(number);

			if (number % 10 == 1 && number % 100 != 11) {
					return words[0];
			}
			if (number % 10 >= 2 && number % 10 <= 4 && (number % 100 < 10 || number % 100 >= 20)) {
					return words[1];
			}
			return words[2];

	}

	static modalOpen(modal, auth = false) {

			if (auth) {
					document.documentElement.classList.add('auth-opened');
			} else {
					document.documentElement.classList.add('modal-popup-opened');
			}

			modal.classList.add('triggered');
			this.documentFixed(modal);
			setTimeout(() => {
					modal.classList.add('showed');
			}, 20);
	}

	static modalClose(modal, auth = false) {
			modal.classList.remove('showed');
			setTimeout(() => {
					modal.classList.remove('triggered');

					if (auth) {
							document.documentElement.classList.remove('auth-opened');
					} else {
							document.documentElement.classList.remove('modal-popup-opened');
					}
					this.documentUnFixed();
			}, 300);
	}

	static calculateVh() {
		const vh = window.innerHeight * 0.01;
		document.documentElement.style.setProperty('--loadedVH', `${vh}px`);
		document.documentElement.classList.add('vh-calculated-loaded');
	}

	static fixFullHeight() {
		const vh = window.innerHeight * 0.01;

		document.documentElement.style.setProperty('--vh', `${vh}px`);
		document.documentElement.classList.add('vh-calculated');
	}

}

export default Utils;
