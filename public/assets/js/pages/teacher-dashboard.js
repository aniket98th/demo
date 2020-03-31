"use strict";
// Class definition
var KTChartJSDemo = function() {

	var AverageHomework = function() {
		var barChartData = {
			labels: ['January'],
			datasets: [{
				label: 'Dataset 1',
				backgroundColor: '#6e4ff5',
				borderColor: '#6e4ff5',
				borderWidth: 1,
				data: [
					5,
					8,
					25
				]
			}, {
				label: 'Dataset 2',
				backgroundColor: '#f6aa33',
				borderColor: '#f6aa33',
				borderWidth: 1,
				data: [
					4,
					14,
					21

				]
			}]

		};

		var ctx = $('#Average-Homework');
		var myBarChart = new Chart(ctx, {
			type: 'bar',
			data: barChartData,
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					//text: 'Vertical Bar Chart'
				}
			}
		});
	}

	var Punctuallity = function() {
		var barChartAllData = {
			labels: ['January'],
			datasets: [{
				label: 'Dataset 1',
				backgroundColor: '#6e4ff5',
				borderColor: '#6e4ff5',
				borderWidth: 1,
				data: [
					5,
					8,
					25
				]
			}, {
				label: 'Dataset 2',
				backgroundColor: '#f6aa33',
				borderColor: '#f6aa33',
				borderWidth: 1,
				data: [
					4,
					14,
					21
				]
			}]

		};

		var kt_chart = $('#Punctuallity');
		var myKtBarChart = new Chart(kt_chart, {
			type: 'bar',
			data: barChartAllData,
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					//text: 'Vertical Bar Chart'
				}
			}
		});
	}

	var DemoConversions = function() {
		var barChartAllData = {
			labels: ['January'],
			datasets: [{
				label: 'Dataset 1',
				backgroundColor: '#6e4ff5',
				borderColor: '#6e4ff5',
				borderWidth: 1,
				data: [
					5,
					8,
					25
				]
			}, {
				label: 'Dataset 2',
				backgroundColor: '#f6aa33',
				borderColor: '#f6aa33',
				borderWidth: 1,
				data: [
					4,
					14,
					21
				]
			}]

		};

		var kt_chart = $('#demo-conversions');
		var myKtBarChart = new Chart(kt_chart, {
			type: 'bar',
			data: barChartAllData,
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					//text: 'Vertical Bar Chart'
				}
			}
		});
	}

	var CustomerReviews = function() {
		var barChartAllData = {
			labels: ['January'],
			datasets: [{
				label: '5 Star',
				backgroundColor: '#6e4ff5',
				borderColor: '#6e4ff5',
				borderWidth: 1,
				data: [
					10
				]
			}, {
				label: '4 Star',
				backgroundColor: '#f6aa33',
				borderColor: '#f6aa33',
				borderWidth: 1,
				data: [
					7
				]
			}, {
				label: '3 Star',
				backgroundColor: '#646c9a',
				borderColor: '#646c9a',
				borderWidth: 1,
				data: [
					5
				]
			}, {
				label: '2 Star',
				backgroundColor: '#93a2dd',
				borderColor: '#93a2dd',
				borderWidth: 1,
				data: [
					3
				]
			}, {
				label: '1 Star',
				backgroundColor: '#9816f4',
				borderColor: '#9816f4',
				borderWidth: 1,
				data: [
					2
				]
			}]

		};

		var kt_chart = $('#Customer-Reviews');
		var myKtBarChart = new Chart(kt_chart, {
			type: 'bar',
			data: barChartAllData,
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					//text: 'Vertical Bar Chart'
				}
			}
		});
	}
   
    var Absence = function() {
        if ($('#Absence').length == 0) {
            return;
        }

        var randomScalingFactor = function() {
            return Math.round(Math.random() * 100);
        };

        var config = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [
                        50, 42
                    ],
                    backgroundColor: [
                        KTApp.getStateColor('warning'),
                        KTApp.getStateColor('brand'),
                        KTApp.getStateColor('success')
                    ]
                }],
                labels: [
                    'Total Classes',
                    'Attended'
                ]
            },
            options: {
                cutoutPercentage: 84,
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false,
                    position: 'top',
                },
                title: {
                    display: false,
                    text: 'Technology'
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                },
                tooltips: {
                    enabled: true,
                    intersect: false,
                    mode: 'nearest',
                    bodySpacing: 5,
                    yPadding: 10,
                    xPadding: 10, 
                    caretPadding: 0,
                    displayColors: false,
                    backgroundColor: KTApp.getStateColor('brand'),
                    titleFontColor: '#ffffff', 
                    cornerRadius: 4,
                    footerSpacing: 0,
                    titleSpacing: 0
                }
            }
        };

        var ctx = document.getElementById('Absence').getContext('2d');
        var myDoughnut = new Chart(ctx, config);
    }
    
    var TestScore = function() {
        if ($('#TestScore').length == 0) {
            return;
        }

        var randomScalingFactor = function() {
            return Math.round(Math.random() * 100);
        };

        var config = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [
                        50, 42
                    ],
                    backgroundColor: [                                                                 
                        KTApp.getStateColor('warning'),
                        KTApp.getStateColor('brand'),
                        KTApp.getStateColor('success')
                    ]
                }],
                labels: [       
                    'On time',     
                    'Late'    
                ]
            },
            options: {
                cutoutPercentage: 84,
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false,
                    position: 'top',
                },
                title: {
                    display: false,
                    text: 'Technology'
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                },
                tooltips: {
                    enabled: true,
                    intersect: false,
                    mode: 'nearest',
                    bodySpacing: 5,
                    yPadding: 10,
                    xPadding: 10, 
                    caretPadding: 0,
                    displayColors: false,
                    backgroundColor: KTApp.getStateColor('brand'),
                    titleFontColor: '#ffffff', 
                    cornerRadius: 4,
                    footerSpacing: 0,
                    titleSpacing: 0
                }
            }
        };

        var ctx = document.getElementById('TestScore').getContext('2d');
        var myDoughnut = new Chart(ctx, config);
    }

	return {
		// public functions
		init: function() {
			// bar charts
			AverageHomework();
			Punctuallity();
			DemoConversions();
			CustomerReviews();
			Absence();
			TestScore();

		}
	};
}();

jQuery(document).ready(function() {
    KTChartJSDemo.init();
});