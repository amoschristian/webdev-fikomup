<div id="chart">
    <svg height="600"></svg>
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
        {"id": "Sitemap", "group": 1, "link": "#"},
        {"id": "Admission", "group": 1, "link": "#"},
        {"id": "Course", "group": 1, "link": "#"},
        {"id": "Headline", "group": 1, "link": "#headline"},
    //     {"id": "About us", "group": 1, "link": "#about_us"},
    //     {"id": "Publications", "group": 1, "link": "#publications"},
        {"id": "Social Media", "group": 1, "link": "#social_media"},
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

    var images = svg.append("image")
        .data(graph.nodes)
        .attr("xlink:href",  function(d) {
            if (d.hasOwnProperty("image")){
                return d.image;
            } 
        })
        .attr("height", 150)
        .attr("width", 150)
        .call(d3.drag()
            .on("start", dragstarted)
            .on("drag", dragged)
            .on("end", dragended))
        .on('click', scrollTo); 

    simulation
        .nodes(graph.nodes)
        .on("tick", ticked);

    simulation.force("link")
        .links(graph.links)

    function ticked() {
        link
        .attr("x1", function(d) { return d.source.x; })
        .attr("y1", function(d) { return d.source.y; })
        .attr("x2", function(d) { return d.target.x; })
        .attr("y2", function(d) { return d.target.y; });

        node
            .attr("r", function (d) {
                var len = d.id.length;
                return len * 5.2; 
            })
            .style("fill", "#f44f00")
            .style("stroke", "#f44f00")
            .style("stroke-width", "1px")
            .attr("cx", function (d) { return d.x+6; })
            .attr("cy", function(d) { return d.y-3; });
        
        images
            .attr("x", function(d) { 
                var len = d.id.length;
                return d.x + -(len * 10) ; 
            })
            .attr("y", function (d) { 
                return d.y - 70; 
            })
            
        label
            .attr("x", function(d) { 
                var len = d.id.length;
                return d.x + -(len * 3.5) ; 
            })
            .attr("y", function (d) { 
                return d.y + 2; 
            })
            .style("font-size", "16px").style("fill", "white");
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
    width = chartDiv.clientWidth;
    height = chartDiv.clientHeight;
    
    svg.selectAll("*").remove();
    
    // Use the extracted size to set the size of an SVG element.
    svg
    .attr("width", width)
    .attr("height", 650);
    
    run(graph, width, height);
}

function scrollTo(d) {
    var link = d.link;

    $('html, body').animate({
        scrollTop: $(link).offset().top
    }, 800);
}

redraw();

window.addEventListener("resize", redraw);
</script>

<style>

#chart {
    height:auto;
}

.arbor.page_section {
    padding: 0;
    position: absolute;
    top: 6%;
}

@media only screen and (max-width: 768px) {
    .arbor.page_section {
        padding: 0;
        position: absolute;
        top: 3%;
    }
}

</style>