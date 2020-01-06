function reloadPage() {
	window.location.reload();
}
window.addEventListener('reload', reloadPage);
mui.ready(function() {
	//循环初始化所有下拉刷新，上拉加载。
	mui.each(document.querySelectorAll('.mui-content'), function(index, pullRefreshEl) {
		mui(pullRefreshEl).pullToRefresh({
			down: {
				callback: function() {
					var self = this;
					setTimeout(function() {
						reloadPage();
						console.log('下拉');
						self.endPullDownToRefresh();
					}, 1000);
				}
			},

		});
	});
});