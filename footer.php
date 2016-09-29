<!-- footer start -->
<footer class="color-overlay">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <p>Nairobi, Building X, Street.</p>
            </div>

            <div class="col-md-4 col-sm-12">
                <p>For a Free Consultation Call: <br/> 0704 555 555</p>
            </div>

            <div class="col-md-4 col-sm-12">
                <ul class="zocial">
                    <li><a href="https://www.facebook.com/The-Somali-Institute-for-Development-and-Research-Analysis-SIDRA-124835334520226/"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/SIDRAInstitute"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://www.linkedin.com/company/the-somali-institute-for-development-and-research-analysis---sidra"><i class="fa fa-linkedin-square"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="underline"></div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 text-right">
                    <p> Copyright &copy; <?php echo date('Y', time());?>. <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>  </p>
                </div>
            </div>
        </div>
    </div>
    <!-- /.copyright end -->
    <div id="go-to-top">
        <a href="#header-top"><i class="fa fa-angle-up"></i></a>
    </div>
</footer>
<!-- footer end -->
<?php wp_footer(); ?>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
    $(function() {
        "use strict";
        $("#element").kenburnsy({});

        $('.ajax-loader').next('p').remove();
    });

    // The following example creates complex markers to indicate beaches near
    // Sydney, NSW, Australia. Note that the anchor is set to
    // (0,32) to correspond to the base of the flagpole.
    function initialize()
    {
        // Create an array of styles.
        var styles = [
        {
            stylers: [{ hue: "#f24b6a" }, { saturation: 0 } ]
        },
        {
            featureType: 'water',
            stylers: [ { visibility: "on" }, { color: "#A4C5C2" }, { weight: 2.2 }, { gamma: 2.54 } ]
        },
        {
            featureType: "road",
            elementType: "geometry",
            stylers: [{ lightness: 100 }, { visibility: "simplified" } ]
        },
        {
            featureType: "road",
            elementType: "labels",
            stylers: [{ visibility: "off" } ]
        }];

        // Create a new StyledMapType object, passing it the array of styles,
        // as well as the name to be displayed on the map type control.
        var styledMap = new google.maps.StyledMapType(styles, { name: "Styled Map"} );
        var mapOptions = {
            zoom: 10,
            center: new google.maps.LatLng(2.0469, 45.3182),
            mapTypeControlOptions: {
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
            },
            scrollwheel: false,
            disableDefaultUI: true
        };
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);
            map.mapTypes.set('map_style', styledMap);
            map.setMapTypeId('map_style');
        setMarkers(map, beaches);
    }

    /**
    * Data for the markers consisting of a name, a LatLng and a zIndex for
    * the order in which these markers should display on top of each
    * other.
    */
    var beaches = [
        ['Sidra Institute', 2.0469, 45.3182, 4]
    ];

    function setMarkers(map, locations)
    {
        var image = {
            url: <?php get_template_directory_uri();?>'/images/marker.png',
            // This marker is 20 pixels wide by 32 pixels tall.
            size: new google.maps.Size(43, 63),
            // The origin for this image is 0,0.
            origin: new google.maps.Point(0,0),
            // The anchor for this image is the base of the flagpole at 0,32.
            anchor: new google.maps.Point(0, 32)
        };

        // Shapes define the clickable region of the icon.
        // The type defines an HTML &lt;area&gt; element 'poly' which
        // traces out a polygon as a series of X,Y points. The final
        // coordinate closes the poly by connecting to the first
        // coordinate.
        var shape = {
            coords: [1, 1, 1, 20, 18, 20, 18 , 1],
            type: 'poly'
        };

        for (var i = 0; i < locations.length; i++)
        {
            var beach = locations[i];
            var myLatLng = new google.maps.LatLng(beach[1], beach[2]);
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon: image,
                shape: shape,
                title: beach[0],
                zIndex: beach[3]
            });
        }
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
</body>
</html>
