<script type="text/javascript">

	/* 
	** jVector Maps
   	** Create a world map with markers
   	**/

   	$('#world-map-markers').vectorMap({
   		map              : 'world_mill_en',
	    normalizeFunction: 'polynomial',
	    hoverOpacity     : 0.7,
	    hoverColor       : true,
	    backgroundColor  : 'transparent',
	    regionStyle      : {
	    	initial      : {
	    		fill            : 'rgba(210, 214, 222, 1)', 'fill-opacity'  : 1,
	    		stroke          : 'none', 'stroke-width'  : 0, 'stroke-opacity': 1
	    	},
	    	hover        : {
	    		'fill-opacity': 0.7,
	    		cursor        : 'pointer'
	    	},
	    	selected     : {
	    		fill: 'yellow'
	    	},
	    	selectedHover: {}
	    },
	    markerStyle      : {
	    	initial: {
	    		fill  : '#00a65a',
	    		stroke: '#111'
	    	}
	    },
	    markers          : [
	    	@foreach($maps as $map)
	    		{ latLng: [{{ $map->bu_latitude }}, {{ $map->bu_langtude }}], name: '{{ $map->bu_name }}' },
    		@endforeach
    	]
  	});
</script>