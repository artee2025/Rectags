(function( $ ) {
	'use strict';
	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	$(function() {
		// var getdata = d3.json(d3.pluginsUrl+"data.php");
		var w = d3
			.select(".sandbox")
			.node()
			.getBoundingClientRect().width,
		  h = d3
			.select(".sandbox")
			.node()
			.getBoundingClientRect().height;
		var svg = d3
		  .select(".sandbox")
		  .append("svg")
		  .attr("width", w)
		  .attr("height", h);
		let draw = function(data) {
			console.log('draw:');
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
			.attr("x", d => (d.x1 - d.x0) / 2)
			.attr("y", d => (d.y1 - d.y0) / 2)
			.attr("text-anchor", "middle")
			.attr("dy", "5")
			.text(d => (d.depth < 1 ? "" : d.data.name));
		};
		// let error = err => {
		//   console.log(err);
		// };
		// getdata.then(draw, error);
		draw(JSON.parse(d3.dataJSON));
	  });

})( jQuery );
