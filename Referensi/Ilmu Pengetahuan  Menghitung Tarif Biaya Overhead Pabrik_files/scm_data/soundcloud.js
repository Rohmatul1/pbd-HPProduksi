define(['scm','playback/soundmanager!','jquery'],function(SCM,sm,$){
		
	return {
		load:function(name, req, callback, config){
			var consumer_key = "4d954562013ec4a8f5287da82ebbc74f", 
				current;
			callback({
				on:function(url,finishCallback){
					var resolveURL = 'https://api.soundcloud.com/resolve?url=' + url + '&format=json&consumer_key=' 
						+ consumer_key + '&callback=?';
					current = $.getJSON(resolveURL, function(track){
						var url = track.stream_url;
						url = (url.indexOf("secret_token") == -1) ? url + '?' : url + '&';
						url += 'consumer_key=' + consumer_key;
						sm.on(url,finishCallback);
					});
				},
				off:function(){
					current.abort();
					sm.off();
				}
			});
		}
	};
});

