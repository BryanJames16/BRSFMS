$(document).ready(function(){i18next.init({resources:{en:{translation:{key:"At ourselves direction believing do he departure. Celebrated her had sentiments understood are projection set. Possession ye no mr unaffected remarkably at. Wrote house in never fruit up. Pasture imagine my garrets an he. However distant she request behaved see nothing. Talking settled at pleased an of me brother weather."}},es:{translation:{key:"A nosotros mismos la direcciÃ³n de creer que Ã©l partida. Celebraba sus sentimientos entendidos que estaban proyectados. PosesiÃ³n no hay ningÃºn seÃ±or notablemente afectado. EscribÃ­ la casa en nunca fructificar. Pasto imaginar mis garrets y Ã©l. Por muy distante que se lo pidiera, no veÃ­a nada. Hablar se estableciÃ³ en un tiempo contento de mi hermano."}},pt:{translation:{key:"Em nÃ³s mesmos, acreditando que ele partiria. Celebrava seus sentimentos compreendidos eram projeÃ§Ã£o ajustada. PossessÃ£o ye nÃ£o mr afetado notavelmente em. Escreveu casa em nunca frutificar. Pasture imagine meus garrets um ele. Por mais distante que ela se comportasse, nÃ£o via nada. Falando resolvido em um prazer de meu tempo irmÃ£o."}},fr:{translation:{key:"Ã€ nous-mÃªmes la direction croyant qu'il part. CÃ©lÃ©brÃ©e ses sentiments avaient compris sont ensemble de projection. Possession ye no mr unffected remarquablement Ã . Ã‰crit la maison dans jamais les fruits vers le haut. PÃ¢turage imaginez mes guÃªtres et lui. Quelle que soit sa distance, elle se demande de ne rien voir. Parler rÃ©glÃ© au plaisir d'un de mes frÃ¨res temps."}}},debug:!0},function(a,b){jqueryI18next.init(i18next,$)}),$("#lng-resources").on("click",".lng-nav li a",function(){var a=$(this),b=a.data("lng");i18next.changeLanguage(b,function(a,b){$(".translate-text").localize()}),a.parent("li").siblings("li").children("a").removeClass("active"),a.addClass("active"),$("#lng-resources").find(".lng-dropdown .dropdown-menu a").removeClass("active");var c=$("#lng-resources").find('.lng-dropdown .dropdown-menu a[data-lng="'+b+'"]').addClass("active");$("#lng-resources #dropdown-active-item").html(c.html())}),$("#lng-resources").on("click",".lng-dropdown .dropdown-menu a",function(){var a=$(this),b=a.data("lng");i18next.changeLanguage(b,function(a,b){$(".translate-text").localize()}),$("#lng-resources .lng-nav li a").removeClass("active"),$('#lng-resources .lng-nav li a[data-lng="'+b+'"]').addClass("active"),$("#lng-resources").find(".lng-dropdown .dropdown-menu a").removeClass("active"),a.addClass("active"),$("#lng-resources #dropdown-active-item").html(a.html())})});