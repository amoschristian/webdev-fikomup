<div id="chart">
    <svg height=500></svg>
</div>
<script src="https://d3js.org/d3.v5.min.js"></script>
<script>

var chartDiv = document.getElementById("chart");
var svg = d3.select("svg");
width = chartDiv.clientWidth;
height = chartDiv.clientHeight;

const graph = {
    "nodes": [
        {"id": "FIKomUP", "group": 1, "image": "/media/source/fikomup_logo_white.png", "link": "#home"},
        {"id": "Social Media", "group": 1, "link": "#social_media"},
        {"id": "Admission", "group": 1, "link": "#"},
        {"id": "Sitemap", "group": 1, "link": "#"},
        {"id": "Course", "group": 1, "link": "#"},
        {"id": "Headline", "group": 1, "link": "#headline"},
    //     {"id": "About us", "group": 1, "link": "#about_us"},
    //     {"id": "Publications", "group": 1, "link": "#publications"},
    //     {"id": "Event", "group": 1, "link": "#event"},
    ],
    "links": [
        {"source": "Sitemap", "target": "FIKomUP", "value": 1},
        {"source": "Admission", "target": "FIKomUP", "value": 1},
        {"source": "Course", "target": "Admission", "value": 1},
        {"source": "Headline", "target": "FIKomUP", "value": 1},
        // {"source": "Publications", "target": "Headline", "value": 1},
        // {"source": "Event", "target": "FIKomUP", "value": 1},
        // {"source": "About us", "target": "FIKomUP", "value": 1},
        {"source": "Social Media", "target": "Headline", "value": 1},
    ]
}

var simulation = d3.forceSimulation()
    .force("link", d3.forceLink().id(function(d) { return d.id; }))
    .force('charge', d3.forceManyBody()
      .strength(-7000)
      .theta(0.8)
      .distanceMax(400)
    )
    .force("center", d3.forceCenter(width / 2, height / 2));
 
function run(graph, width, height) {
    width = width;
    height = height;

    var link = svg.append("g")
        .style("stroke", "#f44f00")
        .style("stroke-width", "0.5px")
        .selectAll("line")
        .data(graph.links)
        .enter().append("line");

    var node = svg.append("g")
        .attr("class", "nodes")
        .selectAll("circle")
        .data(graph.nodes)
        .enter()
        .append('circle')
        .call(d3.drag()
            .on("start", dragstarted)
            .on("drag", dragged)
            .on("end", dragended))
        .on('click', scrollTo);        

    var label = svg.append("g")
        .attr("class", "labels")
        .selectAll("text")
        .data(graph.nodes)
        .enter().append("text")
        .attr("class", "label")
        .text(function(d) { return d.id; })
        .on('click', scrollTo);

    var standardWidth = 768;
    var currentWidth = width;
    var currentHeight = height;

    var ratio = (width / standardWidth);

    if (ratio >= 1) {
        ratio = 1;
    }

    var images = svg.append("image")
        .data(graph.nodes)
        .attr("xlink:href",  function(d) {
            if (d.hasOwnProperty("image")){
                return d.image;
            } 
        })
        .attr("height", 150 * ratio)
        .attr("width", 150 * ratio)
        .call(d3.drag()
            .on("start", dragstarted)
            .on("drag", dragged)
            .on("end", dragended))
        .on('click', scrollTo); 

    var strength = -7000;
    var distance = 400;

    if (ratio < 0.60) {
        var strength = -1300;
        var distance = 300;
    }
    var simulation = d3.forceSimulation()
        .force("link", d3.forceLink().id(function(d) { return d.id; }))
        .force('charge', d3.forceManyBody()
          .strength(strength)
          .theta(0)
          .distanceMax(distance)
        )
        .force("center", d3.forceCenter(width / 2, height / 2));

    simulation
        .nodes(graph.nodes)
        .on("tick", ticked);

    simulation.force("link")
        .links(graph.links)

    function ticked() {
        var standardWidth = 768;
        var currentWidth = width;
        var currentHeight = height;

        var ratio = (width / standardWidth);

        if (ratio >= 1) {
            ratio = 1;
        }

        link
            .attr("x1", function(d) { return d.source.x; })
            .attr("y1", function(d) { return d.source.y; })
            .attr("x2", function(d) { return d.target.x; })
            .attr("y2", function(d) { return d.target.y; });

        node
            .attr("r", function (d) {
                var len = d.id.length;
                return len * 5.2 * ratio; 
            })
            .style("fill", "#f44f00")
            .style("stroke", "#f44f00")
            .style("stroke-width", "1px")
            .attr("cx", function (d) { return d.x+6; })
            .attr("cy", function(d) { return d.y-3; });
        
        images
            .attr("x", function(d) { 
                var len = d.id.length;
                return d.x + -(len * (10 * ratio)) ; 
            })
            .attr("y", function (d) { 
                return d.y - (70 * ratio); 
            })

        var fontsize = 16 * ratio;
            
        label
            .attr("x", function(d) { 
                var len = d.id.length;
                return d.x + -(len * (3.1 * ratio)) ; 
            })
            .attr("y", function (d) { 
                return d.y + (2 * ratio); 
            })
            .style("font-size", fontsize+"px").style("fill", "white");
    }
}

function dragstarted(d) {
    if (!d3.event.active) simulation.alphaTarget(0.3).restart()
    d.fx = d.x
    d.fy = d.y
    //  simulation.fix(d);
}

function dragged(d) {
    d.fx = d3.event.x
    d.fy = d3.event.y
    //  simulation.fix(d, d3.event.x, d3.event.y);
}

function dragended(d) {
    d.fx = d3.event.x
    d.fy = d3.event.y
    if (!d3.event.active) simulation.alphaTarget(0);
    //simulation.unfix(d);
}

function redraw() {
    // Extract the width and height that was computed by CSS.
    var currentChartDiv = document.getElementById("chart");
    var svg = d3.select("svg");
    var width = screen.width;
    var height = screen.height / 1.7;

    // Use the extracted size to set the size of an SVG element.
    svg
        .attr("width", width)
        .attr("height", height);

    svg.selectAll("*").remove();

    run(graph, width, height);
}

function scrollTo(d) {
    var link = d.link;

    if (link == "#") {
        window.location.hash = link;
    } else {
        $('html, body').animate({
            scrollTop: $(link).offset().top
        }, 800);
    }
    
}

redraw();
window.addEventListener("resize", redraw);
</script>

<style>

#chart {
    position: absolute;
    top: 45%;
    height: 500px;
}

</style>