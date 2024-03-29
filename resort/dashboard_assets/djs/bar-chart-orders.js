new Chartist.Bar('.barChartOrders', {
	labels: ['Q1', 'Q2', 'Q3', 'Q4'],
	series: [
		[
			{meta: 'Online', value: 2000},
			{meta: 'Online', value: 4000},
			{meta: 'Online', value: 6000},
			{meta: 'Online', value: 8000},
		],
		[
			{meta: 'Direct', value: 3000},
			{meta: 'Direct', value: 5000},
			{meta: 'Direct', value: 7000},
			{meta: 'Direct', value: 9000},
		],
	],
}, {
	reverseData: true,
	seriesBarDistance: 15,
	height: "130px",
	chartPadding: {
		right: 0,
		left: 20,
		top: 0,
		bottom: 0,
	},
	axisY: {
		offset: 30
	},
	plugins: [
		Chartist.plugins.tooltip()
	],
});