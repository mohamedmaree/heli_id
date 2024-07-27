
// pie function for drow digram
// pass 3 arrays 
// first array lables contains names of lables like ['active', 'not active']
// secound array series contains numbers of lables like [200, 300]
// third array colors contains colors of lables  like ['#7367F0', '#FF9F43']
function pieChartFunction(lables , series , colors){
    var customerChartoptions = {
        chart: {
        type: 'pie',
        height: 330,
        dropShadow: {
            enabled: false,
            blur: 5,
            left: 1,
            top: 1,
            opacity: 0.2
        },
        toolbar: {
            show: false
        }
        },
        labels: lables,
        series: series,
        dataLabels: {
        enabled: false
        },
        legend: { show: false },
        stroke: {
        width: 5
        },
        colors: colors,
        fill: {
        type: 'gradient',
        gradient: {
            gradientToColors: ['#A9A2F6', '#ffc085'] ,
        }
        }
    }
    return customerChartoptions ;
}


// pie function for drow radial Bar digram
// pass 4 arrays 
// first array colors contains colors of lables  like ['#7367F0', '#FF9F43']
// secound array colors contains colors of lables  like ['#7367F0', '#FF9F43']
// third array lables contains names of lables like ['active', 'not active']
// fourth array series contains numbers of lables like [200, 300]

function radialBarFunction(colors , colors2 , lables ,series){
    var supportChartoptions = {
    chart: {
        height: 270,
        type: 'radialBar',
        sparkline:{
            enabled: false,
        }
    },
    plotOptions: {
        radialBar: {
            size: 150,
            offsetY: 20,
            startAngle: -150,
            endAngle: 150,
            hollow: {
                size: '65%',
            },
            track: {
                background: '#fff',
                strokeWidth: '100%',

            },
            dataLabels: {
                value: {
                    offsetY: 30,
                    color: '#99a2ac',
                    fontSize: '2rem'
                }
            }
        },
    },
    colors: colors,
    fill: {
        type: 'gradient',
        gradient: {
            // enabled: true,
            shade: 'dark',
            type: 'horizontal',
            shadeIntensity: 0.5,
            gradientToColors: colors2,
            inverseColors: true,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 100]
        },
    },
    stroke: {
        dashArray: 8
    },
    series: series,
    labels: lables,
    }

    return supportChartoptions ;
}

function radialBarFunction2(colors , gradientToColors , series , labels){
var productChartoptions = {
    chart: {
      height: 325,
      type: 'radialBar',
    },
    colors: colors,
    fill: {
      type: 'gradient',
      gradient: {
        // enabled: true,
        shade: 'dark',
        type: 'vertical',
        shadeIntensity: 0.5,
        gradientToColors: gradientToColors,
        inverseColors: false,
        opacityFrom: 1,
        opacityTo: 1,
        stops: [0, 100]
      },
    },
    stroke: {
      lineCap: 'round'
    },
    plotOptions: {
      radialBar: {
        size: 165,
        hollow: {
          size: '20%'
        },
        track: {
          strokeWidth: '100%',
          margin: 15,
        },
        dataLabels: {
          name: {
            fontSize: '18px',
          },
          value: {
            fontSize: '16px',
          },
          total: {
            show: true,
            label: 'Total',

            formatter: function (w) {
              // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
            //   return 4
            }
          }
        }
      }
    },
    series: series,
    labels: labels,

  }
  return productChartoptions ;
}


function donutFunction(series , labels , colors ,colors2){
   var sessionChartoptions = {
    chart: {
      type: 'donut',
      height: 325,
      toolbar: {
        show: false
      }
    },
    dataLabels: {
      enabled: false
    },
    series: series,
    legend: { show: false },
    comparedResult: [2, -3, 8],
    labels: labels,
    stroke: { width: 0 },
    colors: colors,
    fill: {
      type: 'gradient',
      gradient: {
        gradientToColors: colors2
      }
    }
  }

  return sessionChartoptions
}

function radialBarFunction3(series){
    var goalChartoptions = {
      chart: {
      height: 250,
      type: 'radialBar',
      sparkline: {
          enabled: true,
      },
      dropShadow: {
          enabled: true,
          blur: 3,
          left: 1,
          top: 1,
          opacity: 0.1
      },
      },
      colors: ['#28C76F'],
      plotOptions: {
      radialBar: {
          size: 110,
          startAngle: -150,
          endAngle: 150,
          hollow: {
          size: '77%',
          },
          track: {
          background: '#b9c3cd',
          strokeWidth: '50%',
          },
          dataLabels: {
          name: {
              show: false
          },
          value: {
              offsetY: 18,
              color: '#99a2ac',
              fontSize: '4rem'
          }
          }
      }
      },
      fill: {
      type: 'gradient',
      gradient: {
          shade: 'dark',
          type: 'horizontal',
          shadeIntensity: 0.5,
          gradientToColors: ['#00b5b5'],
          inverseColors: true,
          opacityFrom: 1,
          opacityTo: 1,
          stops: [0, 100]
      },
      },
      series: series,
      stroke: {
      lineCap: 'round'
      },

  }
  return goalChartoptions ;
}
