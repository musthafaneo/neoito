/**
 * ---------------------------------------
 * This demo was created using amCharts 5.
 * 
 * For more information visit:
 * https://www.amcharts.com/
 * 
 * Documentation is available at:
 * https://www.amcharts.com/docs/v5/
 * ---------------------------------------
 */

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv");


// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
var myTheme = am5.Theme.new(root);

myTheme.rule("Label").setAll({
  fontSize: "1em"
});

myTheme.rule("MapPolygonSeries").setAll({
  fill: am5.color(0x4E5164),
  fillOpacity: 0.8,
  strokeOpacity: 0
});

root.setThemes([
  am5themes_Animated.new(root),
  myTheme
]);


// Create the map chart
// https://www.amcharts.com/docs/v5/charts/map-chart/
var chart = root.container.children.push(am5map.MapChart.new(root, {
  panX: "rotateX",
  panY: "rotateY",
  projection: am5map.geoOrthographic(),
  minZoomLevel: 1,
  maxZoomLevel: 1,
  wheelX: 'none',
  wheelY: 'none',
  /*draggable: false,
  resizable: false*/
}));


// Create main polygon series for countries
// https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/
var polygonSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {
  geoJSON: am5geodata_worldLow 
}));

/*polygonSeries.mapPolygons.template.setAll({
  tooltipText: "{name}",
  toggleKey: "active",
  interactive: true
});

polygonSeries.mapPolygons.template.states.create("hover", {
  fill: root.interfaceColors.get("primaryButtonHover")
});

polygonSeries.mapPolygons.template.states.create("active", {
  fill: root.interfaceColors.get("primaryButtonHover")
});*/


// Create series for background fill
// https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/#Background_polygon
var backgroundSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {}));
backgroundSeries.mapPolygons.template.setAll({
  fill: am5.color(0x624DE3),
  fillOpacity: 0,
  strokeOpacity: 0
});
backgroundSeries.data.push({
  geometry: am5map.getGeoRectangle(90, 180, -90, -180)
});


// Set up events
var previousPolygon;

polygonSeries.mapPolygons.template.on("active", function (active, target) {
  if (previousPolygon && previousPolygon != target) {
    previousPolygon.set("active", false);
  }
  if (target.get("active")) {
    var centroid = target.geoCentroid();
    if (centroid) {
      chart.animate({ key: "rotationX", to: -centroid.longitude, duration: 1500, easing: am5.ease.inOut(am5.ease.cubic) });
      chart.animate({ key: "rotationY", to: -centroid.latitude, duration: 1500, easing: am5.ease.inOut(am5.ease.cubic) });
    }
  }

  previousPolygon = target;
});


// Create point series
var pointSeries = chart.series.push(am5map.MapPointSeries.new(root, {
  latitudeField: "lat",
  longitudeField: "long"
}));

pointSeries.bullets.push(function() {
  var circle = am5.Circle.new(root, {
    radius: 10,
    fill: am5.color(0xF36D45),
    stroke: am5.color(0xF36D45),
    strokeOpacity: 0.4,
    strokeWidth: 2,
    tooltipText: "{name}"
  });

  /*circle.events.on("click", function(ev) {
    alert("Clicked on " + ev.target.dataItem.dataContext.name)
  });*/

  return am5.Bullet.new(root, {
    sprite: circle
  });
});
chart.seriesContainer.draggable = false;
chart.seriesContainer.resizable = false;

pointSeries.data.setAll([{
  long: -111.89636327370353,
  lat: 40.764675605322985,
  name: "USA"
}, {
  long: 10.741975857016604,
  lat: 59.915228023871386,
  name: "Norway"
}, {
  long: 76.94457753045673,
  lat: 8.518074173525653,
  name: "India"
}, {
  long: -0.2266580309368997,
  lat: 51.505696857657824,
  name: "UK"
}]);


// Rotate animation
chart.animate({
  key: "rotationX",
  from: 0,
  to: 360,
  duration: 60000,
  loops: Infinity
});


// Make stuff animate on load
chart.appear(1000, 100);
