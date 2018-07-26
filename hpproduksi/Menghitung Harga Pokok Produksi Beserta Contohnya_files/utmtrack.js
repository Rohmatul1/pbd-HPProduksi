function parse_query_string(query) {
  var vars = query.split("&");
  var query_string = {};
  for (var i = 0; i < vars.length; i++) {
    var pair = vars[i].split("=");
    // If first entry with this name
    if (typeof query_string[pair[0]] === "undefined") {
      query_string[pair[0]] = decodeURIComponent(pair[1]);
      // If second entry with this name
    } else if (typeof query_string[pair[0]] === "string") {
      var arr = [query_string[pair[0]], decodeURIComponent(pair[1])];
      query_string[pair[0]] = arr;
      // If third or later entry with this name
    } else {
      query_string[pair[0]].push(decodeURIComponent(pair[1]));
    }
  }
  return query_string;
}

var loc = location.search;
loc = loc.replace(/\?/g, '');
var utms = parse_query_string(loc);

var source = utms.utm_source;
var medium = utms.utm_medium;
var campaign = utms.utm_campaign;
var term = utms.utm_term;
var content = utms.utm_content;

if(source == undefined) {
    source = '';
}
if(medium == undefined) {
    medium = '';
}
if(campaign == undefined) {
    campaign = '';
}
if(term == undefined) {
    term = '';
}
if(content == undefined) {
    content = '';
}

var utm = {
    utm_source: source,
    utm_medium: medium,
    utm_campaign: campaign,
    utm_term: term,
    utm_content: content
};
console.log(content);
if(source != '' || medium != '' || campaign != '' || term != '' || content != '') {
    document.cookie = "UTM" + "=" + JSON.stringify(utm) + ";expires=0" + ";domain=.beecloud.id;path=/";
}
else {
  console.log(source);
}