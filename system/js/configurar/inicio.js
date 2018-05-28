jQuery(function () {
    jQuery.ajax({
        url: urlAdmin + "datosOrden",
        type:'GET',
        dataType:"json",
        success: function (rep) {
            console.log(rep);
            Morris.Bar({
                element: 'chart3',
                axes: true,
                data: rep,
                xkey: 'x',
                ykeys: ['y'],
                labels: ['Cantidad'],
                barColors: ['#41B4CC', '#455064', '#242d3c']
            });

            Morris.Bar({
                element: 'chart4',
                axes: true,
                data: rep,
                xkey: 'x',
                ykeys: ['z'],
                labels: ['Montos'],
                barColors: ['#57B4E0', '#455064', '#242d3c']
            });
        }
    });


    //ultima seccion
    jQuery('.inlinebar').sparkline('html', {type: 'bar', barColor: '#ff6264'} );
    jQuery('.inlinebar-2').sparkline('html', {type: 'bar', barColor: '#445982'} );
    jQuery('.inlinebar-3').sparkline('html', {type: 'bar', barColor: '#00b19d'} );
    jQuery('.bar-2').sparkline([ [1,4], [2, 3], [3, 2], [4, 1] ], { type: 'bar' });
    jQuery('.pie-2').sparkline('html', {type: 'pie',borderWidth: 0, sliceColors: ['#3d4554', '#ee4749','#00b19d']});
    jQuery('.linechart').sparkline();


    jQuery(".pie-large").sparkline([3,2,5], {
        type: 'pie',
        width: '150px ',
        height: '150px',
        sliceColors: ['#ee4749', '#c13638','#fe9193']

    });

    jQuery(".line-large").sparkline([5,6,7,9,10,5,3,4,5,4,6,7, ], {
        type: 'line',
        width: '320px ',
        height: '150px',
        lineColor: '#ff4e50',
        highlightLineColor: '#ff8889',
        highlightSpotColor: '#b22425',
        minSpotColor: '#ff4e50',
        maxSpotColor: '#ff4e50',
        fillColor: '#f79696',
        lineWidth: 2,
        spotRadius: 4.5,
        normalRangeColor: '#ed4949'
    });

    jQuery(".bar-large").sparkline([5,6,7,2,1,0,4,3,5,7,2,4], {
        type: 'bar',
        barColor: '#ff6264',
        height: '150px',
        barWidth: 10,
        barSpacing: 2
    });
});

function getRandomInt(min, max)
{
    return Math.floor(Math.random() * (max - min + 1)) + min;
}