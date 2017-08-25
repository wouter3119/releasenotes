<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Release Notes</title>
	<meta name="author" content="Wouter Dijkstra | www.wouterdijkstra.xyz">
	<meta name="description" content="Release notes.">
	<meta name="theme-color" content="#fff">
	<script type="text/javascript" src="https://unpkg.com/vue@2.4.2/dist/vue.js"></script>
	<script type="text/javascript" src="https://unpkg.com/vue-router@2.0.0/dist/vue-router.js"></script>
	<script type="text/javascript" src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script type="text/javascript" src="https://unpkg.com/marked@0.3.6"></script>
	<script type="text/javascript" src="https://unpkg.com/lodash@4.17.4"></script>

	<meta name="HandheldFriendly" content="true">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>#content,body,html{margin:0;font-family:'Helvetica Neue',Arial,sans-serif;color:#333;font-size:108%}.header{margin:50px 0}#content{max-width:700px;margin:0 auto;vertical-align:top;box-sizing:border-box;padding:0 20px}hr{margin-bottom:40px}.notes{font-family:monospace;line-height:20px;margin-bottom:50px}.notes h1{line-height:40px}code{color:#f66}.footer{margin-bottom:40px}</style>

</head>
<body>
	<div id="content">
		<div class="header">
			<h1>{{ name }} - release notes</h1>
			<p>{{ desc }}</p>
		</div>
		<div class="notes" v-html="notes"></div>
		<hr>
		<div class="footer"><p>A <a href="https://www.wouterdijkstra.xyz" style="color: black">Wouter Dijkstra</a> project.</p></div>
	</div>

	<script>
	const router = new VueRouter({
		routes: [{ path: '/note/:id' }],
		mode: 'history',
		base: '/releases',
	});
	new Vue({
		router,
		el: '#content',
		props: {},
		data() {
			return {
				data: 'Please wait a second so we can load the release notes.',
				name: 'colloquitree.com',
				desc: 'These are the (development) release notes of colloquitree.com',
				go_back_text: 'Click here to go back',
				api_error: 'Sorry, data could not be retrieved at this moment in time.',
				api_url: "/releases/data/notes.json"
			}
		},
		computed: {
			notes: function () {return marked(this.data, { sanitize: true })}
		},
		methods: {
			getData: function() {var t=this;axios.get(t.api_url).then(function(a){t.data=t.formatData(a.data)}).catch(function(a){t.data=t.api_error})},
			formatData: function(e) {var t="",r=0;if(e.reverse(),void 0!==this.$route.params.id){r=this.$route.params.id;var i=_.find(e,_.matchesProperty("id",parseInt(r)));void 0!==i?(e.length=0,e.push(i),t="["+this.go_back_text+"](../)\n\n"):window.location="../"}for(var o in e){n=e[o],t+="---\n\n# [Release Notes - "+n.date+"]["+o+"]\n\n";var a=n.content;for(var s in a)if("string"==typeof a[s]&&a[s].length>0)"introduction"!=s&&(t+="**"+s.charAt(0).toUpperCase()+s.slice(1)+"**: "),t+=a[s]+"\n\n";else if("object"==typeof a[s]){t+="## "+s.charAt(0).toUpperCase()+s.slice(1)+":\n\n";for(var c=0;c<a[s].length;c++)t+="- "+a[s][c]+"\n\n"}t+="["+o+"]: "+(n.id!=r?"./note/":"")+n.id+"\n\n"}return t}
		},
		created: function() {
			document.title = "release notes | " + this.name;
			this.getData();
		},
	})
	</script>
</body>
</html>
