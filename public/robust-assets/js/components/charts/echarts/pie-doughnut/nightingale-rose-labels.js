$(window).on("load",function(){require.config({paths:{echarts:"../../../robust-assets/js/plugins/charts/echarts"}}),require(["echarts","echarts/chart/pie","echarts/chart/funnel"],function(a){var b=a.init(document.getElementById("nightingale-rose-labels"));chartOptions={title:{text:"Employee's salary review",subtext:"Senior front end developer",x:"center"},tooltip:{trigger:"item",formatter:"{a} <br/>{b}: +{c}$ ({d}%)"},legend:{x:"left",y:"top",orient:"vertical",data:["January","February","March","April","May","June","July","August","September","October","November","December"]},color:["#FECEA8","#FF847C","#E84A5F","#2A363B","#99B898","#F8B195","#F67280","#C06C84","#6C5B7B","#355C7D","#A6306A","#2F9395"],toolbox:{show:!0,orient:"vertical",feature:{mark:{show:!0,title:{mark:"Markline switch",markUndo:"Undo markline",markClear:"Clear markline"}},dataView:{show:!0,readOnly:!1,title:"View data",lang:["View chart data","Close","Update"]},magicType:{show:!0,title:{pie:"Switch to pies",funnel:"Switch to funnel"},type:["pie","funnel"]},restore:{show:!0,title:"Restore"},saveAsImage:{show:!0,title:"Same as image",lang:["Save"]}}},calculable:!0,series:[{name:"Increase (brutto)",type:"pie",radius:["15%","73%"],center:["50%","57%"],roseType:"area",width:"40%",height:"78%",x:"30%",y:"17.5%",max:450,sort:"ascending",data:[{value:440,name:"January"},{value:260,name:"February"},{value:350,name:"March"},{value:250,name:"April"},{value:210,name:"May"},{value:350,name:"June"},{value:300,name:"July"},{value:430,name:"August"},{value:400,name:"September"},{value:450,name:"October"},{value:330,name:"November"},{value:200,name:"December"}]}]},b.setOption(chartOptions),$(function(){function a(){setTimeout(function(){b.resize()},200)}$(window).on("resize",a),$(".menu-toggle").on("click",a)})})});