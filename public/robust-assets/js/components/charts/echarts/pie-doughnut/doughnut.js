$(window).on("load",function(){require.config({paths:{echarts:"../../../robust-assets/js/plugins/charts/echarts"}}),require(["echarts","echarts/chart/pie","echarts/chart/funnel"],function(a){var b=a.init(document.getElementById("doughnut"));chartOptions={title:{text:"Browser popularity",subtext:"Open source information",x:"center"},legend:{orient:"vertical",x:"left",data:["Internet Explorer","Opera","Safari","Firefox","Chrome"]},color:["#FECEA8","#FF847C","#E84A5F","#2A363B","#99B898"],toolbox:{show:!0,orient:"vertical",feature:{mark:{show:!0,title:{mark:"Markline switch",markUndo:"Undo markline",markClear:"Clear markline"}},dataView:{show:!0,readOnly:!1,title:"View data",lang:["View chart data","Close","Update"]},magicType:{show:!0,title:{pie:"Switch to pies",funnel:"Switch to funnel"},type:["pie","funnel"],option:{funnel:{x:"25%",y:"20%",width:"50%",height:"70%",funnelAlign:"left",max:1548}}},restore:{show:!0,title:"Restore"},saveAsImage:{show:!0,title:"Same as image",lang:["Save"]}}},calculable:!0,series:[{name:"Browsers",type:"pie",radius:["50%","70%"],center:["50%","57.5%"],itemStyle:{normal:{label:{show:!0},labelLine:{show:!0}},emphasis:{label:{show:!0,formatter:"{b}\n\n{c} ({d}%)",position:"center",textStyle:{fontSize:"17",fontWeight:"500"}}}},data:[{value:335,name:"Internet Explorer"},{value:310,name:"Opera"},{value:234,name:"Safari"},{value:135,name:"Firefox"},{value:1548,name:"Chrome"}]}]},b.setOption(chartOptions),$(function(){function a(){setTimeout(function(){b.resize()},200)}$(window).on("resize",a),$(".menu-toggle").on("click",a)})})});