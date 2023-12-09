import "../css/app.scss";

import 'lazysizes';

import Swiper from 'swiper';
import {Mousewheel, Navigation, Pagination, Scrollbar, Thumbs, Autoplay} from 'swiper/modules';
window.Swiper = Swiper;
window.SwiperMousewheel = Mousewheel;
window.SwiperNavigation = Navigation;
window.SwiperPagination = Pagination;
window.SwiperScrollbar = Scrollbar;
window.SwiperThumbs = Thumbs;
window.SwiperAutoplay = Autoplay;

import { Fancybox } from "@fancyapps/ui";
window.Fancybox = Fancybox;

import Utils from './layout/utils';
import Header from "./layout/header";

window.Utils = Utils;

document.addEventListener('DOMContentLoaded', () => {
	new Header();

	window.Utils.checkEnableJS();
	window.Utils.fixFullHeight();
	window.Utils.scrollWidth();
	['resize', 'orientationchange', 'scroll', 'mousewheel'].forEach((event) => {
		window.addEventListener(event, Utils.debounce(Utils.fixFullHeight, 20));
	});

	window.Utils.calculateVh();

	// Определяем является устройство с touch дисплеем
	document.documentElement.classList.add(Utils.isTouch() ? 'touch' : 'no-touch');
	document.documentElement.classList.add(Utils.detectFlexGap() ? 'flex-gap' : 'no-flex-gap');

	if (window.Utils.isTouch()) {
		document.head.querySelector('meta[name="viewport"]').setAttribute('content', 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no');
	}

	// Если нужно определяем браузер и тип OS
	window.Utils.detectDevice();

});
