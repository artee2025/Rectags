$(function() {
  var promise = d3.json("http://localhost:3000/data.php");

  promise.then(
    data => {
      var svg = d3
        .select("body")
        .append("svg")
        .attr("width", 1200)
        .attr("height", 1200);
      var w = 500,
        h = 500;
      var tm = d3
        .treemap()
        .size([w, h])
        .padding(1);

      var nodes = d3.hierarchy(data).sum(function(d) {
        return d.size;
      });

      tm(nodes);
      var colors = d3.scaleOrdinal(d3.schemePastel1);

      var ns = svg
        .selectAll("g")
        .data(nodes.descendants())
        .enter()
        .append("g")
        .attr("class", d => (d.depth < 1 ? "" : "recttag"))
        .attr("transform", function(d) {
          return "translate(" + [d.x0, d.y0] + ")";
        });

      var rs = ns
        .append("rect")
        .attr("width", function(d) {
          return d.x1 - d.x0;
        })
        .attr("height", function(d) {
          return d.y1 - d.y0;
        })
        
        .attr("fill", (d, i) => (d.depth < 1 ? "white" : colors(i)));

      var ts = ns
        .append("text")
        .attr("x", function(d) {
          return (d.x1 - d.x0) / 2;
        })
        .attr("y", function(d) {
          return (d.y1 - d.y0) / 2;
        })
        .attr("text-anchor", "middle")
        .text(function(d) {
          return d.data.name;
        });
    },
    error => {
      console.log(error);
    }
  );
});
