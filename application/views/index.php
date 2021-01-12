<center>
<div id="loading-screen" style="padding-top: 100px;">
    <img src="assets/load.gif ">
</div>
</center>

<div id="cont" class="container" style="display: none;">
<div class="row justify-content-between">
<div class="col-lg-5 ">

<canvas id="myChart"></canvas>

</div>



<div class="col-lg-5">

<canvas id="myChart1" height="200"></canvas>
</div>

</div>

<div class="row justify-content-center">
<div class="col-lg-5 ">
<canvas id="chartVentas" height="200"></canvas>

</div>

</div>

</div>
<script type="text/javascript">

var paramCuit = [];
var paramTotal = [];
	$.post("index/getGrafico",
							
 function(data){

				 var pe = JSON.parse(data);
				 $.each(pe, function(i, item){
						 
			
							paramCuit.push(item.proveedor);
							paramTotal.push(parseFloat(item.total).toFixed(2));                    
				
				
				
				 });


				
	var ctx = document.getElementById('myChart').getContext('2d');
	
var chart = new Chart(ctx, {
	// The type of chart we want to create
	type: 'bar',

	// The data for our dataset
	data: {
		labels: paramCuit,
		datasets: [{
			label: 'Compras',
			backgroundColor: 'rgb(6, 171, 18, 0.5)',
			borderColor: 'rgb(6, 171, 18)',
			data: paramTotal,
			datalabels: {
                labels: {
                    title: null
                }
            }
		}]
	},

// data: {
// 		labels: paramCuit,
// 		datasets: [{
// 			label: 'Total de compras',
// 			backgroundColor: 'rgb(255, 99, 132, 0.5)',
// 			borderColor: 'rgb(255, 99, 132)',
// 			data: paramTotal
// 		}]
// 	},
	// Configuration options go here
	options: {
		scales: {
            yAxes: [{
                ticks:{
                	beginAtZero: true
                },

            }]
        },
         title:{
        	display: true,
        	text: 'Compras por proveedores',
        	fontSize: 15,
        	padding: 10,
        	fontColor: '#12619c',

	},
	legend:{
           
           position: 'bottom',
           labels:{
           	   padding: 15,
           	   boxWidth: 20,
           	   fontFamily: 'system-ui',
           	   fontColor: 'black',
           }
	}
	}
});



});

	var paramCompra = [];
var paramPrecio = [];
let mes;
	$.post("index/getGraficoCompra",
							
 function(data){

				 var pe = JSON.parse(data);
				 $.each(pe, function(i, item){
						 
			                
							paramCompra.push(item.fecha + ' ' +item.year);
							paramPrecio.push(parseFloat(item.total).toFixed(2));                    
				
				
				
				 });


				
	
	var ctx1 = document.getElementById('myChart1').getContext('2d');

var chart1 = new Chart(ctx1, {
	// The type of chart we want to create
	type: 'line',

	// The data for our dataset
	data: {
		labels: paramCompra,
		datasets: [{
			label: 'Compras',
			backgroundColor: 'rgb(51, 85, 255, 0.5)',
			borderColor: 'rgb(51, 85, 255)',
			data: paramPrecio,
			lineTension: 0,
    fill: false,
    pointHoverBorderWidth: 3,
    datalabels: {
                labels: {
                    title: null
                }
            }
		}]
	},

// data: {
// 		labels: paramCompra,
// 		datasets: [{
// 			label: 'Total de compras',
// 			backgroundColor: 'rgb(255, 99, 132, 0.5)',
// 			borderColor: 'rgb(255, 99, 132)',
// 			data: paramPrecio
// 		}]
// 	},
	// Configuration options go here
	options: {
		scales: {
            yAxes: [{
                ticks:{
                	beginAtZero: true
                }
            }]
        },
        title:{
        	display: true,
        	text: 'Compras por mes',
        	fontSize: 15,
        	padding: 10,
        	fontColor: '#12619c'
        },
        tooltips: {
        enabled: true,
        mode: 'single',
        callbacks: {
            
            label: function(tooltipItems, data) {
                return  'Compras' + ' ' + '$' + tooltipItems.yLabel ;
            
        }
	 }
	},
	legend:{
           
           position: 'bottom',
           labels:{
           	   padding: 15,
           	   boxWidth: 20,
           	   fontFamily: 'system-ui',
           	   fontColor: 'black',
           }
	}
	}
});

});


var paramProd = [];
var paramTotalVentas = [];
	$.post("index/getGraficoVentas",
							
 function(data){

				 var pe = JSON.parse(data);
				 $.each(pe, function(i, item){
						 
			
							paramProd.push(item.nombre);
							paramTotalVentas.push(item.total);                    
				
				
				
				 });


				
	var ctx = document.getElementById('chartVentas').getContext('2d');
	
var chart = new Chart(ctx, {
	// The type of chart we want to create
	type: 'horizontalBar',

	// The data for our dataset
	data: {
		labels: paramProd,
		datasets: [{
			label: 'Productos',
			backgroundColor: 'rgb(35, 126, 250, 0.4)',
			borderColor: 'rgb(35, 126, 250)',
			data: paramTotalVentas,

			datalabels: {
               
                labels: {

                    title: {
                        color: 'white'
                    }
                }
            }
		}]

	},

	// Configuration options go here
	options: {
		scales: {
            xAxes: [{
            	display: false,
                ticks:{
                	stepSize: 1,
                	beginAtZero: true

                }
            }],
             yAxes: [{
             	ticks: {
             	   fontColor: '#00050A',
             	   fontFamily: 'system-ui',
             	   fontSize: 14,
             	   mirror: true
             }



         }]
        },
         title:{
        	display: true,
        	text: 'Productos mas vendidos',
        	fontSize: 15,
        	padding: 10,
        	fontColor: '#12619c',

	},
	legend:{
           
           position: 'bottom',
           labels:{
           	   padding: 15,
           	   boxWidth: 20,
           	   fontFamily: 'system-ui',
           	   fontColor: 'black',
           }
	},
	  plugins: {
        datalabels: {
        	
            //The first 2 colors as dark and the third one as white
            color: ['#171d28', '#171d28', '#fff'],
            anchor: 'end',
            align: 'end',
            clamp: true,
             offset: -15

        }
   }
	
}
});



});
</script>



	
	<script type="text/javascript" src="js/index.js"></script>
<!-- <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script> -->