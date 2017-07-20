$(document).ready(function() {
    $('.tree').treegrid({
        expanderExpandedClass: 'glyphicon glyphicon-minus',
        expanderCollapsedClass: 'glyphicon glyphicon-plus'
    });

    $('.part-category').on('click', function() {
        
        var category = $(this).data('category');
        var req_url = "/getPartsByCat.php";

        $.ajax({
            dataType: "json",
            url: req_url,
            data: {category: category},
            success: function (data) {
                if( data.length == 0 )
                    $("#target-viz").html('<i>There is no model in this category yet.</i>');
                else {
                    $("#target-viz").html("");
                    $("#target-viz").append('<div class="row">');

                    $.each( data, function( i, val ) {
                        $("#target-viz").append('<div class="col-md-2"><a href="#"><img data-name="' + val.name +
                        '" class="thumbnail" src="/dataset/' + val.name + '/screenshot.png"></a></div">');
                    });

                    $("#target-viz").append('</div>');

                    refresh_onclick_event();
                    $('html, body').animate({
                        scrollTop: $("#target-viz").offset().top - 75
                    }, 500);
                }
            }
        });
    });

    function refresh_onclick_event(){
        $(".thumbnail").on( "click", function() {
            $("#3D-visualiser").modal('show');
            var name = $(this).data("name");
            $("#3D-Viz-Body").html("<iframe src='/viewerV2.php?part_name="+name+"' style='width: 100%; height: 100%;'></iframe>")
        });
    }
});
