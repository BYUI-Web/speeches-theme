function getXML(xmlFileName){
  var url = "http://byuidahoradio.org/wp-content/themes/Radio%20Template/xml/" + xmlFileName + ".xml";
  console.log(url);
  if (window.XMLHttpRequest){
    xh = new XMLHttpRequest();
  }
  else{
    xh = new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  xh.open("GET", url, false);
  xh.send(null);

  xmlDocument = xh.responseXML;

  populateDOM(xmlDocument);
}

function populateDOM(xmlDocument){
  
  var xmlAudio = xmlDocument.getElementsByTagName('audio');
  var xmlTitle = "Title: " + xmlDocument.getElementsByTagName('title')[0].textContent;
  var xmlComposer = "Composer: " + xmlDocument.getElementsByTagName('composer')[0].textContent;
  var xmlArtist = "Artist: " + xmlDocument.getElementsByTagName('artist')[0].textContent;

  var domManipulation = document.getElementById("xmlfeed-inner");
  domManipulation.innerHTML = "";

  var titleContainer = document.createElement("div");
  titleContainer.className = "xml-title";
  titleContainer.innerHTML = xmlTitle;
  domManipulation.appendChild(titleContainer);

  var composerContainer = document.createElement("div");
  composerContainer.className = "xml-composer";
  composerContainer.innerHTML = xmlComposer;
  domManipulation.appendChild(composerContainer);

  var artistContainer = document.createElement("div");
  artistContainer.className = "xml-artist";
  artistContainer.innerHTML = xmlArtist;
  domManipulation.appendChild(artistContainer);

  console.log(xmlAudio);
  console.log(xmlTitle);
  console.log(xmlComposer);
  console.log(xmlArtist);
}

function updateSongList(composer,artist,title,pageUrl) {
	$.ajax({
        url: "<?php bloginfo('template_url'); ?>/write.php",
        method: "get",
        data: { 'audioId':'123', 'composer':composer, 'artist':artist, 'title':title, 'file':pageUrl }
      });
}

function xmlAudioReturn(xmlFileName){
  var xmlDocument = "<?php bloginfo('template_url'); ?>/xml/" + xmlFileName + ".xml";
  console.log(xmlDocument);
  if (window.XMLHttpRequest){
    xh = new XMLHttpRequest();
  }
  else{
    xh = new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  xh.open("GET", xmlDocument, false);
  xh.send(null);

  xmlDocument = xh.responseXML;
  var xmlAudio = xmlDocument.getElementsByTagName('audio');
  return xmlAudio;
}

function xmlTitleReturn(xmlFileName){
  var xmlDocument = "<?php bloginfo('template_url'); ?>/xml/" + xmlFileName + ".xml";
console.log(xmlDocument);
  if (window.XMLHttpRequest){
    xh = new XMLHttpRequest();
  }
  else{
    xh = new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  xh.open("GET", xmlDocument, false);
  xh.send(null);

  xmlDocument = xh.responseXML;
  var xmlTitle = "Title: " + xmlDocument.getElementsByTagName('title')[0].textContent;
  return xmlTitle;
}

function xmlArtistReturn(xmlFileName){
  var xmlDocument = "<?php bloginfo('template_url'); ?>/xml/" + xmlFileName + ".xml";
console.log(xmlDocument);
  if (window.XMLHttpRequest){
    xh = new XMLHttpRequest();
  }
  else{
    xh = new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  xh.open("GET", xmlDocument, false);
  xh.send(null);

  xmlDocument = xh.responseXML;
  var xmlArtist = "Artist: " + xmlDocument.getElementsByTagName('artist')[0].textContent;
  return xmlArtist;
}

function xmlComposerReturn(xmlFileName){
  var xmlDocument = "<?php bloginfo('template_url'); ?>/xml/" + xmlFileName + ".xml";
console.log(xmlDocument);
  if (window.XMLHttpRequest){
    xh = new XMLHttpRequest();
  }
  else{
    xh = new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  xh.open("GET", xmlDocument, false);
  xh.send(null);

  xmlDocument = xh.responseXML;
  var xmlComposer = "Composer: " + xmlDocument.getElementsByTagName('composer')[0].textContent;
  return xmlComposer;
}