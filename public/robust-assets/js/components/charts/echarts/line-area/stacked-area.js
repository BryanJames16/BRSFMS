$(window).on("load",function(){require.config({paths:{echarts:"../../../robust-assets/js/plugins/charts/echarts"}}),require(["echarts","echarts/chart/bar","echarts/chart/line"],function(a){var b=a.init(document.getElementById("stacked-area"));chartOptions={grid:{x:40,x2:20,y:35,y2:25},tooltip:{trigger:"axis"},legend:{data:["Email marketing","Advertising alliance","Video ads","Direct access","Search engine"]},color:["#FF847C","#FECEA8","#99B898","#E84A5F","#2A363B"],calculable:!0,xAxis:[{type:"category",boundaryGap:!1,data:["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"]}],yAxis:[{type:"value"}],series:[{name:"Email marketing",type:"line",stack:"Total",itemStyle:{normal:{areaStyle:{type:"default"}}},data:[120,132,101,134,90,230,210]},{name:"Advertising alliance",type:"line",stack:"Total",itemStyle:{normal:{areaStyle:{type:"default"}}},data:[220,182,191,234,290,330,310]},{name:"Video ads",type:"line",stack:"Total",itemStyle:{normal:{areaStyle:{type:"default"}}},data:[150,232,201,154,190,330,410]},{name:"Direct access",type:"line",stack:"Total",itemStyle:{normal:{areaStyle:{type:"default"}}},data:[320,332,301,334,390,330,320]},{name:"Search engine",type:"line",stack:"Total",itemStyle:{normal:{areaStyle:{type:"default"}}},data:[820,932,901,934,1290,1330,1320]}]},b.setOption(chartOptions),$(function(){function a(){setTimeout(function(){b.resize()},200)}$(window).on("resize",a),$(".menu-toggle").on("click",a)})})});