$(window).on("load",function(){function a(a){return a.frequency=+a.frequency,a}function b(){e=c.node().getBoundingClientRect().width-d.left-d.right,m.attr("width",e+d.left+d.right),n.attr("width",e+d.left+d.right),h.rangeRoundBands([0,e],.1),n.selectAll(".d3-xaxis").call(j),n.selectAll(".d3-bar").attr("x",function(a){return h(a.letter)}).attr("width",h.rangeBand())}var c=d3.select("#bar-chart"),d={top:20,right:20,bottom:30,left:50},e=c.node().getBoundingClientRect().width-d.left-d.right,f=500-d.top-d.bottom,g=d3.format(".0%"),h=d3.scale.ordinal().rangeRoundBands([0,e],.1),i=d3.scale.linear().range([f,0]),j=d3.svg.axis().scale(h).orient("bottom"),k=d3.svg.axis().scale(i).orient("left").tickFormat(g),l=d3.tip().attr("class","d3-tip").offset([-10,0]).html(function(a){return"<strong>Frequency:</strong> <span style='color:#FF847C'>"+a.frequency+"</span>"}),m=c.append("svg"),n=m.attr("width",e+d.left+d.right).attr("height",f+d.top+d.bottom).append("g").attr("transform","translate("+d.left+","+d.top+")");n.call(l),d3.tsv("../../../robust-assets/demo-data/d3/bar/bar.tsv",a,function(a,b){if(a)throw a;h.domain(b.map(function(a){return a.letter})),i.domain([0,d3.max(b,function(a){return a.frequency})]),n.append("g").attr("class","d3-axis d3-xaxis").attr("transform","translate(0,"+f+")").call(j),n.append("g").attr("class","d3-axis d3-yaxis").call(k).append("text").attr("transform","rotate(-90)").attr("y",6).attr("dy",".71em").style("text-anchor","end").style("fill","#1DE9B6").style("font-size",12).text("Frequency"),n.selectAll(".d3-bar").data(b).enter().append("rect").attr("class","d3-bar").attr("x",function(a){return h(a.letter)}).attr("width",h.rangeBand()).attr("y",function(a){return i(a.frequency)}).attr("height",function(a){return f-i(a.frequency)}).on("mouseover",l.show).on("mouseout",l.hide).style("fill","#1DE9B6")}),$(window).on("resize",b),$(".menu-toggle").on("click",b)});