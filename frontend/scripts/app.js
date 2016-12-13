(() => {
	const event = (node, action, cb) => {
		if (node.addEventListener) {
			node.addEventListener(action, cb);
		} else {
			node.attachEvent('on' + action, cb);
		}
	};

	const clickListener = e => {
		const el = e.target;
		if (
			el.tagName == 'A' && 
			el.target == '' &&
			el.protocol == window.location.protocol &&
			el.host == window.location.host
		) {
			e.preventDefault();
			getPage(el.href, (status, data) => {
				if (status != 200 || !data) {
					window.location.href = href;
					return;
				}

				window.history.pushState(data, data.title, el.href);
				showData(data);
			});
		}
	};

	const getPage = (href, cb) => {
		var xhr = new XMLHttpRequest();
		xhr.open('POST', href);
		xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
		event(xhr, 'readystatechange', () => {
			if (xhr.readyState != 4) {
				return;
			}

			let data;
			try {
				data = JSON.parse(xhr.responseText);
			} catch (e) { 
				console.error(e); 
			}

			cb(xhr.status, data);
		});
		xhr.send();
	}

	const showData = data => {
		document.title = data.title
		document.querySelector('.content').innerHTML = data.content;

		Array.prototype.forEach.call(document.querySelectorAll('.menu a'), (el) => {
			el.classList.remove('menu__anchor_active');
		});

		const page = data.page == 'index' ? '' : data.page;
		document.querySelector(`.menu a[href="/${page}"]`).classList.add('menu__anchor_active');

		document.body.scrollTop = 0
	};

	event(window, 'popstate', e => {
		if (e.state) {
			showData(e.state);
		} else {
			window.location.reload();
		}
	});

	event(window, 'load', () => {
		event(document.body, 'click', clickListener);
	});

})();