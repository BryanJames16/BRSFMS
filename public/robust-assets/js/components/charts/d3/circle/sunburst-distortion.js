$(window).on("load",function(){function a(a){if(c=a.parent){var c,e=c.x,f=.8;c.children.forEach(function(d){e+=b(d,e,d===a?c.dx*f/a.value:c.dx*(1-f)/(c.value-a.value))})}else b(a,0,a.dx/a.value);path.transition().duration(750).attrTween("d",d)}function b(a,c,d){if(a.x=c,a.children&&(e=a.children.length))for(var e,f=-1;++f<e;)c+=b(a.children[f],c,d);return a.dx=a.value*d}function c(a){a.x0=a.x,a.dx0=a.dx}function d(a){var b=d3.interpolate({x:a.x0,dx:a.dx0},a);return function(c){var d=b(c);return a.x0=d.x,a.dx0=d.dx,j(d)}}var e=d3.select("#sunburst-distortion"),f=e.node().getBoundingClientRect().width,g=400;radius=190;var h=d3.scale.ordinal().range(["#99B898","#FECEA8","#FF847C","#E84A5F","#C06C84","#6C5B7B","#355C7D"]),i=d3.layout.partition().size([2*Math.PI,radius]).value(function(a){return a.size}),j=d3.svg.arc().startAngle(function(a){return a.x}).endAngle(function(a){return a.x+a.dx}).innerRadius(function(a){return a.y}).outerRadius(function(a){return a.y+a.dy}),k=e.append("svg").attr("width",f).attr("height",g).append("g").attr("transform","translate("+f/2+","+g/2+")");d3.json("../../../robust-assets/demo-data/d3/circle/flare.json",function(b,d){if(b)throw b;path=k.data([d]).selectAll("path").data(i.nodes).enter().append("path").attr("d",j).style("fill",function(a){return h((a.children?a:a.parent).name)}).on("click",a).each(c)})});