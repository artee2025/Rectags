$(function() {
  var getdata = d3.json("data.php");
  var w = d3.select(".sandbox").node().getBoundingClientRect().width,
    h =  d3.select(".sandbox").node().getBoundingClientRect().height;
  var svg = d3
    .select(".sandbox")
    .append("svg")
    .attr("width", w)
    .attr("height", h);
  let draw = data => {
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
      .attr("transform", d => "translate(" + [d.x0, d.y0] + ")");

    var rs = ns
      .append("rect")
      .attr("width", d => d.x1 - d.x0)
      .attr("height", d => d.y1 - d.y0)
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
      .attr("dy", "5")
      .text(function(d) {
        return d.data.name;
      });
  };
  let error = err => {
    console.log(err);
  };
  getdata.then(draw, error);
});
