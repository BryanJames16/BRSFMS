$(document).ready(function(){var a=$("#users-contacts").DataTable();$("#search-contacts").on("keyup",function(){a.search(this.value).draw()}),$(".icheck input").iCheck({checkboxClass:"icheckbox_square-blue",radioClass:"iradio_square-blue"}),$("#search-contacts").on("draw.dt",function(){$(".icheck input").iCheck({checkboxClass:"icheckbox_square-blue",radioClass:"iradio_square-blue"})})});