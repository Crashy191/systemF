/*
 * Author: Abdullah A Almsaeed
 * Date: 4 Jan 2014
 * Description:
 *      This is a demo file used only for the main dashboard (index.html)
 **/

/* global moment:false, Chart:false, Sparkline:false */
var salesGraphChart;
$(function () {
  'use strict'

  // Make the dashboard widgets sortable Using jquery UI
  $('.connectedSortable').sortable({
    placeholder: 'sort-highlight',
    connectWith: '.connectedSortable',
    handle: '.card-header, .nav-tabs',
    forcePlaceholderSize: true,
    zIndex: 999999
  })
  $('.connectedSortable .card-header').css('cursor', 'move')

  // jQuery UI sortable for the todo list
  $('.todo-list').sortable({
    placeholder: 'sort-highlight',
    handle: '.handle',
    forcePlaceholderSize: true,
    zIndex: 999999
  })

  // bootstrap WYSIHTML5 - text editor
  $('.textarea').summernote()

  $('.daterange').daterangepicker({
    ranges: {
      Today: [moment(), moment()],
      Yesterday: [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days': [moment().subtract(6, 'days'), moment()],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'This Month': [moment().startOf('month'), moment().endOf('month')],
      'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment().subtract(29, 'days'),
    endDate: moment()
  }, function (start, end) {
    // eslint-disable-next-line no-alert
    alert('You chose: ' + start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
  })

  /* jQueryKnob */
  $('.knob').knob()

  // jvectormap data
  var visitorsData = {
    US: 0, // USA
    SA: 0, // Saudi Arabia
    CA: 0, // Canada
    DE: 0, // Germany
    FR: 0, // France
    CN: 0, // China
    AU: 0, // Australia
    BR: 0, // Brazil
    IN: 0, // India
    GB: 0, // Great Britain
    RU: 0 // Russia
  }
  // World map by jvectormap
  $('#world-map').vectorMap({
    map: 'usa_en',
    backgroundColor: 'transparent',
    regionStyle: {
      initial: {
        fill: 'rgba(255, 255, 255, 0.7)',
        'fill-opacity': 1,
        stroke: 'rgba(0,0,0,.2)',
        'stroke-width': 1,
        'stroke-opacity': 1
      }
    },
    series: {
      regions: [{
        values: visitorsData,
        scale: ['#ffffff', '#0154ad'],
        normalizeFunction: 'polynomial'
      }]
    },
    onRegionLabelShow: function (e, el, code) {
      if (typeof visitorsData[code] !== 'undefined') {
        el.html(el.html() + ': ' + visitorsData[code] + ' new visitors')
      }
    }
  })

  // Sparkline charts
  var sparkline1 = new Sparkline($('#sparkline-1')[0], { width: 80, height: 50, lineColor: '#92c1dc', endColor: '#ebf4f9' })
  var sparkline2 = new Sparkline($('#sparkline-2')[0], { width: 80, height: 50, lineColor: '#92c1dc', endColor: '#ebf4f9' })
  var sparkline3 = new Sparkline($('#sparkline-3')[0], { width: 80, height: 50, lineColor: '#92c1dc', endColor: '#ebf4f9' })

  sparkline1.draw([0, 0, 0, 0, 0, 0, 0, 0, 0])
  sparkline2.draw([0, 0, 0, 0, 0, 0, 0, 0, 0])
  sparkline3.draw([0, 0, 0, 0, 0, 0, 0, 0, 0])

  // The Calender
  $('#calendar').datetimepicker({
    format: 'L',
    inline: true
  })

  // SLIMSCROLL FOR CHAT WIDGET
  $('#chat-box').overlayScrollbars({
    height: '250px'
  })

  /* Chart.js Charts */
  // Sales chart
  // var salesChartCanvas = document.getElementById('revenue-chart-canvas').getContext('2d');

  // Define las opciones de la gráfica
  var pieChartCanvas = $('#sales-chart-canvas').get(0).getContext('2d')
  
  $.ajax({
    url: 'admin/obtener-datosP', // Reemplaza esto con la URL correcta en tu aplicación
    method: 'GET',
    success: function (response) {
      var pieData = {
        labels: [
          'Finalizados',
          'En Proceso',
          'Pendientes'
        ],
        datasets: [
          {
            data: [response.cantidadFinalizados, response.cantidadEnProceso, response.cantidadPendientes],
            backgroundColor: ['#f56954', '#00a65a', '#f39c12']
          }
        ]
      }
      var pieOptions = {
        legend: {
          display: false
        },
        maintainAspectRatio: false,
        responsive: true
      }
      var pieChart = new Chart(pieChartCanvas, { // lgtm[js/unused-local-variable]
        type: 'doughnut',
        data: pieData,
        options: pieOptions
      })
    },
    error: function (error) {
      console.error('Error al obtener los datos:', error);
    }
  });
  // Donut Chart
  

  // Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  // eslint-disable-next-line no-unused-vars


  // Sales graph chart
  var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d')
  // $('#revenue-chart').get(0).getContext('2d');

  


$.ajax({
  url: 'admin/obtener-datos', // Reemplaza esto con la URL correcta en tu aplicación
  method: 'GET',
  success: function (response) {
    var salesGraphChartData = {
      labels:[],
      datasets: [
        {
          label: 'Digital Goods',
          fill: false,
          borderWidth: 2,
          lineTension: 0,
          spanGaps: true,
          borderColor: '#efefef',
          pointRadius: 3,
          pointHoverRadius: 7,
          pointColor: '#efefef',
          pointBackgroundColor: '#efefef',
          data: []
        }
      ]
    }
    salesGraphChartData.datasets[0].data = response.data;
    salesGraphChartData.labels = response.labels;
    var salesGraphChartOptions = {
      maintainAspectRatio: false,
      responsive: true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          ticks: {
            fontColor: '#efefef'
          },
          gridLines: {
            display: false,
            color: '#efefef',
            drawBorder: false
          }
        }],
        yAxes: [{
          ticks: {
            stepSize: 5000,
            fontColor: '#efefef'
          },
          gridLines: {
            display: true,
            color: '#efefef',
            drawBorder: false
          }
        }]
      }
    }
  
    // This will get the first returned node in the jQuery collection.
    // eslint-disable-next-line no-unused-vars
    salesGraphChart = new Chart(salesGraphChartCanvas, { // lgtm[js/unused-local-variable]
      type: 'line',
      data: salesGraphChartData,
      options: salesGraphChartOptions
    })
    // console.log("response", response);
    salesGraphChart.data.labels = response.labels;
    salesGraphChart.data.datasets[0].data = response.data;
    salesGraphChart.update(); // Actualiza el gráfico
  },
  error: function (error) {
    console.error('Error al obtener los datos:', error);
  }
});

})